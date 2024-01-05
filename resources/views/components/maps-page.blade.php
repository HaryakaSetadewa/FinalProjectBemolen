<!DOCTYPE html>
<html lang="en">

<head>
  <base target="_top">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Peta</title>

  <link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet-search@2.9.9/dist/leaflet-search.min.css" />
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
  <script src="https://unpkg.com/leaflet-search@2.9.9/dist/leaflet-search.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <link rel="stylesheet" href="{{ asset('css/maps.css') }}">

  <style>
  
    html,
    body {
      height: 100%;
      margin: 0;
    }
    
    body {
      display: flex;
    }
    
    #map {
      flex: 1;
    }
    
    #sidebar {
      width: 350px;
      position: relative;
      z-index: 1000;
      display: none;
    }
    
    #sidebar-background {
      box-sizing: border-box;
      width: 94%;
      height: 230px;
      background-size: cover;
      background-repeat: no-repeat;
      position: absolute;
      top: 10px;
      right: 30px;
      left: 10px;
      z-index: -1;
    }
    
    #sidebar-text {
      text-align: left;
      padding-left: 20px;
      margin-top: 250px;
      font-family: sans-serif;
    }
    
    .leaflet-container {
      width: 100%;
      max-width: 100%;
      max-height: 100%;
    }
    
    #close-button {
      position: absolute;
      top: 10px;
      left: 10px;  /* Update this line to move the close button to the left */
      cursor: pointer;
      color: white;
      font-size: 18px;
      z-index: 1001;
    }
    
    .back-button {
      position: absolute;
      top: 21px;
      right: 20px;
      z-index: 1002;
    }
    
    </style>
    
</head>

<body>

  <div id='sidebar'>
    <div id="close-button" onclick="closeSidebar()">&#10006;</div>
    <div id="sidebar-background"></div>
    <div id="sidebar-text">
      <div class="flex items-center mt-2" id="phone-icon">
        <box-icon type='solid' name='phone' color="blue" size="22px" class="pl-3"></box-icon>
        <h3 class="pl-2">${no_telp}</h3>
      </div>
    </div>
  </div>

  <div id='map'></div>

  <div class="back-button">
    <a href="{{ route ('bemolen') }}" id="backButton" class="bg-gray-700 hover:bg-red-700 text-white font-bold py-2 px-4 mr-12 rounded">
      Back
    </a>
  </div>

  <script>
    function closeSidebar() {
      document.getElementById('sidebar').style.display = 'none';
    }

    function showSidebar(foto, nama_bengkel, kategori, lokasi, jam_buka, jam_tutup, email_perusahaan, no_telp) {
      document.getElementById('sidebar-background').style.backgroundImage = "url('" + foto + "')";
      document.getElementById('sidebar-text').innerHTML = `
        <h2 class="pl-5 text-xl"> ${nama_bengkel} </h2>
        <div class="pl-5 text-sm mt-1">
        <h5>
            <span class="mr-1 font-light">4.3 </span>
            <span style="color: gold; font-size:20px;">&#9733;&#9733;&#9733;&#9733;&#9734;</span>
            (227)
        </h5> 
        </div>
        <div>
        <h4 class="font-normal border-b border-gray-300 pb-2 mb-2 w-full text-sm pl-5">Bengkel ${kategori}</h4>
        </div>
        <div class="flex items-center">
        <box-icon name='map' size="22px" color="blue" class="pl-3"></box-icon>
        <h3 class="pl-2 text-sm"> ${lokasi} </h3>
        </div>
        <div class="flex items-center mt-2">
        <box-icon type='solid' name='time' color="blue" size="20px" class="pl-3"></box-icon>
        <h3 class=" pl-2 text-sm"> ${jam_buka} - ${jam_tutup} </h3>
        </div>
        <div class="flex items-center mt-2">
        <box-icon name='world' size="20px" color="blue" class="pl-3"></box-icon>
        <h3 class="pl-2 text-base">${email_perusahaan}</h3>
        </div>
        <div class="flex items-center mt-2" id="phone-icon">
        <box-icon type='solid' name='phone' color="blue" size="22px" class="pl-3"></box-icon>
        <h3 class="pl-2">${no_telp}</h3>
        </div>
    `;

      document.getElementById('sidebar').style.display = 'block';
    }

    const cities = L.layerGroup();
    let marker;

@foreach ($data as $data)
    @foreach ($maps as $map)
        @if ($data->id == $map->id_bengkel)
            // Create a marker and bind a popup
            marker = L.marker([{{ $map->koordinatX }}, {{ $map->koordinatY }}]).addTo(cities)
                .on('click', function () {
                    showSidebar(
                        '{{ asset("images/" .$data->foto) }}',
                        '{{ $data->nama_bengkel }}',
                        '{{ $data->kategori}}',
                        '{{ $data->lokasi }}',
                        '{{ date('H:i', strtotime($data->jam_buka)) }}',
                        '{{ date('H:i', strtotime($data->jam_tutup)) }}',
                        '{{ $data->perusahaan->email_perusahaan }}',
                        '{{ $data->perusahaan->no_telp }}'
                    );
                })
                .on('mouseover', function () {
                    this.bindPopup(`
                        <b>{{ $data->nama_bengkel }}</b><br />
                        <img src="{{ asset("images/" .$data->foto) }}" style="max-width: 150px; max-height: 150px;" />
                    `).openPopup();
                })
                .on('mouseout', function () {
                    this.closePopup();
                });
        @endif
    @endforeach
@endforeach

    

    const osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    });

    const osmHOT = L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Tiles style by <a href="https://www.hotosm.org/" target="_blank">Humanitarian OpenStreetMap Team</a> hosted by <a href="https://openstreetmap.fr/" target="_blank">OpenStreetMap France</a>'
    });

    const map = L.map('map', {
      center: [-8.12140, 115.07772],
      zoom: 10,
      layers: [osm, cities]
    });

    const baseLayers = {
      'OpenStreetMap': osm,
      'OpenStreetMap.HOT': osmHOT
    };

    function goBack() {
      var sidebar = document.getElementById('sidebar');
      var backButton = document.getElementById('backButton');

      if (sidebar.style.display === 'none') {
        sidebar.style.display = 'block';
        backButton.style.visibility = 'visible';
      } else {
        sidebar.style.display = 'none';
        backButton.style.visibility = 'hidden';
      }
    }

    const overlays = {
      'Cities': cities
    };

    const layerControl = L.control.layers(baseLayers, overlays).addTo(map);

    const openTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: 'Data peta: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, <a href="http://viewfinderpanoramas.org">SRTM</a> | Gaya peta: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
    });
    layerControl.addBaseLayer(openTopoMap, 'OpenTopoMap');

    const searchControl = new L.Control.Search({
      layer: cities,
      propertyName: 'popupContent',
      marker: false,
      moveToLocation: function (latlng, title, map) {
        map.setView(latlng, 14);
      }
    });
    searchControl.addTo(map);

    const popup = L.popup()
		.setLatLng([-8.409146200913318, 115.1758866456897])
		
    map.on('click', onMapClick);

function onMapClick(e) {
  popup
    .setLatLng(e.latlng)
    .setContent(`${e.latlng.toString()}`)
    .openOn(map);
}



  </script>

</body>

</html>
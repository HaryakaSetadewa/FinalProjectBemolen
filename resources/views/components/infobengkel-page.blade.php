<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BEMOLEN | Bengkel</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="images/shopping-cart.png" type="image/x-icon">
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-700">

    <div id="app">
        <header class="fixed top-0 left-0 w-full h-20 px-9 bg-gray-800 border-bg-color flex justify-between items-center z-50">
            <a href="#" class="text-2xl font-semibold cursor-default text-white">BEMO<span class="text-main-color text-red-600">LEN</span></a>
            <i class='bx bx-menu text-3.6rem text-text-color hidden' id="menu-icon"></i>
            <nav>
                <a href="{{ route ('bemolen')}}" class="text-1.7rem text-white ml-4 px-3 font-semibold cursor-pointer">Home</a>
                <a href="{{ route ('maps-page')}}" target="_blank" class="text-1.7rem text-white ml-4 px-3 font-semibold">Maps</a>
            </nav>
        </header>

        <div class="container mx-auto p-4 mt-20">
            <div class="max-w-screen-xl mr-4 mb-5">
                <div class="flex items-center ml-8">
                    <i class='bx bx-search mr-2 text-white'></i>
                    <input oninput="filterProducts()" id="searchInput" class="w-full p-2 border rounded mt-2" placeholder="Cari Bengkel">
                </div>
            </div>

            <div class="container mx-auto p-4 mt-5">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4" id="productsContainer">
                    @foreach ($data as $data)
                    <div class="p-4 border rounded-lg shadow-md flex flex-col">
                        <h2 class="text-lg font-semibold text-white ">{{$data->nama_bengkel}}</h2>
                        <img src="{{asset('images/' .$data->foto)}}" alt="{{$data->nama_bengkel  }}" class="w-full h-44">
                        <p class="text-white text-justify flex-grow">
                            <span class="inline-flex mt-3">
                                <i class="bx bxs-map text-2xl  mr-1"></i>
                                <span class="ml-2">{{$data->lokasi}}</span>
                            </span>
                        </p>
                        <p class="text-white overflow-ellipsis">
                            <span class="text-right inline-flex items-center">
                                <i class="bx bxs-time text-2xl  mr-1"></i>
                                <span class="ml-2">{{ date('H:i', strtotime($data->jam_buka)) }} - {{ date('H:i', strtotime($data->jam_tutup)) }}</span>
                            </span>
                        </p>
                        <p class="text-white overflow-ellipsis">
                            <span class="text-right inline-flex items-center">
                                <i class="bx bxs-phone text-2xl  mr-1"></i>
                                <span class="ml-2">{{$data->perusahaan->no_telp}}</span>
                            </span>
                        </p>
                        <div class="flex items-center mt-2">
                            <a href="{{ route('detailbengkel', $data->id) }}" class="bg-red-600 text-white px-4 py-2 ml-16 rounded-lg">Detail Bengkel</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/infobengkel.js') }}"></script>

</body>

</html>
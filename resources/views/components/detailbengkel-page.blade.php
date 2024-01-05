<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BEMOLEN | TekWeb - Bengkel Honda</title>

    <!-- box icons and iconify -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <!-- custom css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="{{ asset('css/detailbengkel.css') }}">
</head>

<body class="bg-gray-900 text-white font-sans mt-3">
    <!-- New Container with Gray Background -->
    <div class="bg-gray-800 py-8 flex container mx-auto px-4 rounded-lg">
        <!-- Bagian Header dengan Gambar -->
        <header class="text-center py-8">
            <img src="{{ asset('images/' .$data->foto) }}" class="ml-8 mr-3 rounded-lg" alt="Bengkel Honda">
            <div class="description">
                <div class="description">
                    <h2 class="text-xl font-bold mb-4">Deskripsi :</h2>
                    <?php
                        $deskripsiWithoutTags = str_replace(['<p>', '</p>'], '', $data->deskripsi);
                    ?>
                    <p class="text-gray-300 text-base">{!! $deskripsiWithoutTags !!}</p>
                </div>
            </div>
        </header>

        <!-- Informasi dari Gambar di Atas -->
        <section class="border-gray-500 mt-6 mb-64 flex-1 flex flex-col p-8 border-2 rounded-xl shadow-2xl">
            <div class="mb-1">
                <h2 class="text-4xl font-bold mb-2 text-center mt-14 ">{{$data->perusahaan->nama_perusahaan}}</h2>
            </div>
            <!-- Lokasi -->
            <div class="mb-2">
                <h2 class="text-sm font-bold mb-2 text-blue-500">
                    <i class='bx bxs-map'>{{$data->lokasi}}</i>
                </h2>
            </div>

            <div class="mb-2">
                <h2 class="text-xl font-bold mb-2">{{$data->nama_bengkel}}</h2>
            </div>

            <div class="mb-4">
                <h2 class="text-xl font-bold mb-2">Waktu :<span class="text-red-500 text-xl"> {{ date('H:i', strtotime($data->jam_buka)) }} - {{ date('H:i', strtotime($data->jam_tutup)) }}</span></h2>
            </div>

            <!-- Komentar dari Pengguna -->
            <div class="mb-8">
                <h2 class="text-xl font-bold mb-2">Sedia Layanan Perbaikan : {{$data->kategori}}</h2>
            </div>

            <button id="pesanButton" class="bg-green-500 hover:bg-green-700 text-white px-6 py-2 rounded-lg mb-8" onclick="pesanSekarang()">Pesan Sekarang</button>

        </section>

    </div>

    <section class="bg-gray-800 mx-8 mt-6 p-6 rounded-lg">
        

        <!-- Form ulasan pengguna -->
        <form class="mt-4" action="{{ route('reviews.store') }}" method="post" onsubmit="submitComment(event)">
            @csrf
            <input type="hidden" name="id_bengkel" value=" {{ $data->id }}">
            <div class="mb-4">
                @auth
                <span class="text-2xl">{{ auth()->user()->name }}</span>
                <input type="hidden" name="nama_user" value="{{ auth()->user()->name }}">
            @endauth
                {{-- <input type="text" id="nama_user" name="nama_user" class="block w-full px-4 py-2 rounded-lg text-black border focus:border-indigo-500 focus:outline-none" required> --}}
            </div>

            <div class="mb-4">
                <label for="review" class="block text-white font-bold mb-2">Komentar Anda :</label>
                <textarea class="block w-full px-4 py-2 rounded-lg text-gray-700 border focus:border-indigo-500 focus:outline-none" id="review" name="review" rows="4" required></textarea>
            </div>

            {{-- <div class="mb-3">
                <h2 class="text-sm font-bold mb-2">Rating Anda :</h2>
                <div class="flex items-center">
                    <span onclick="setUserRating(event, 1)" class="mr-2 cursor-pointer">
                        <span id="star1" class="text-gray-300 text-2xl" style="cursor: pointer;">☆</span>
                    </span>
                    <span onclick="setUserRating(event, 2)" class="mr-2 cursor-pointer">
                        <span id="star2" class="text-gray-300 text-2xl" style="cursor: pointer;">☆</span>
                    </span>
                    <span onclick="setUserRating(event, 3)" class="mr-2 cursor-pointer">
                        <span id="star3" class="text-gray-300 text-2xl" style="cursor: pointer;">☆</span>
                    </span>
                    <span onclick="setUserRating(event, 4)" class="mr-2 cursor-pointer">
                        <span id="star4" class="text-gray-300 text-2xl" style="cursor: pointer;">☆</span>
                    </span>
                    <span onclick="setUserRating(event, 5)" class="mr-2 cursor-pointer">
                        <span id="star5" class="text-gray-300 text-2xl" style="cursor: pointer;">☆</span>
                    </span>
                </div>
            </div> --}}

            <button type="submit" class="bg-blue-700 hover:bg-blue-500 px-6 py-2 rounded-lg text-white">Kirim Ulasan</button>
        </form>
    </section>

    <!-- Bagian penilaian pengguna -->
    <div id="reviewsContainer" class="bg-gray-800 mx-8 mt-6 p-6 mb-3 rounded-lg">
        <h2 class="text-xl font-bold mb-4 text-white">Penilaian Pengguna</h2>
    
        <!-- Contoh Review Dummy Data -->
        @foreach($reviews as $review)
        <div class="border-b mb-4 pb-4">
            <div class="flex items-center mb-2">
                {{-- <span class="text-yellow-500 text-2xl mr-2">★</span> --}}
                <span class="text-white font-bold">{{$review->nama_user}}:</span>
            </div>
            <p class="text-gray-300">{{$review->review}}</p>
        </div>
        @endforeach
    </div>



    <!-- Modal -->
    <div id="myModal" class="modal fixed  flex-col items-center justify-center w-full h-full top-0 left-0 hidden">
        <div class="modal-overlay absolute w-full h-full  opacity-50"></div>
        <div class="modal-content bg-white p-8 rounded-lg max-w-md text-center">
            <span class="close text-white absolute top-0 right-0 p-4 cursor-pointer"
                onclick="closeModal()">&times;</span>
            <p class="text-gray-800 text-2xl font-bold mb-4 mt-3">Pesanan Berhasil !</p>
            <p class="text-gray-800 mb-3">Kami sedang menuju lokasi Anda. Terima kasih atas kesabaran Anda.</p>
            <div class="flex items-center px-11 py-2 font-bold text-blue-600 mb-4">
                <p class="mr-2 text-red-500">Bengkel Sedang Dalam Perjalanan</p>
                <img src="{{ asset('img/imgs/bike.png') }}" class="w-7 h-7">
            </div>
        </div>
    </div>

    <script src="{{ asset('js/detailbengkel.js') }}"></script>
    
</body>

</html>
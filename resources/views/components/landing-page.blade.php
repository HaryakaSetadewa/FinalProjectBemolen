<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BEMOLEN | TekWeb</title>

    <!-- box icons and iconify -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <!-- custom css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href={{ asset ('css/Tailwind.css') }} />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset ('css/login.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/vue-scrollto@2.20.0"></script>
</head>

<body class="font-poppins bg-bg-color text-text-color">
    <!-- header -->
    <div id="app">
        <header :class="{ 'bg-opacity-60 bg-black': isScrolled, 'bg-transparent': !isScrolled }" class="fixed top-0 left-0 w-full h-20 px-9 border-bg-color flex justify-between items-center z-50">
            <a href="#" class="text-2xl font-semibold cursor-default text-white">BEMO<span class="text-main-color text-red-600">LEN</span></a>
            <i class='bx bx-menu text-3.6rem text-text-color hidden' id="menu-icon"></i>
            <nav>
                <a v-scroll-to="{ el: '#home', offset: -50 }" class="text-1.7rem text-white ml-4 px-3 font-semibold cursor-pointer">Home</a>
                <a v-scroll-to="{ el: '#services', offset: -50 }" class="text-1.7rem text-white ml-4 px-3 font-semibold cursor-pointer">Services</a>
                <a v-scroll-to="{ el: '#about', offset: -50 }" class="text-1.7rem text-white ml-4 px-3 font-semibold cursor-pointer">About</a>
                <a v-scroll-to="{ el: '#contact', offset: -50 }" class="text-1.7rem text-white ml-4 px-3 font-semibold cursor-pointer">Contact</a>
                <a href="{{ route ('maps-page')}}" target="_blank" class="text-1.7rem text-white ml-4 px-3"><i class='bx bx-map-pin'></i></a>
                <a href="{{ route ('infobengkel')}}" class="text-1.7rem text-white ml-4 px-3 m-6">
                    <iconify-icon icon="fluent:person-wrench-20-filled" style="font-size: 20px; px-3"></iconify-icon>
                </a>
                
                @auth
                    <!-- Tampilkan username dan tombol logout -->
                    <span class="text-white text-sm font-semibold" v-scroll-to="{ el: '#logout', offset: -50 }">{{ auth()->user()->name }}</span>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="text-1.7rem text-white ml-4 px-3 font-semibold cursor-pointer">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <!-- Tombol Sign In dan Sign Up jika belum login -->
                    <span>
                        <a href="{{ route('login') }}" class="inline-block px-2.8 py-1 bg-main-color text-second-bg-color rounded-full font-semibold text-sm transition duration-500 ease-in-out hover:bg-transparent hover:text-main-color text-white px-3 border-2 border-red-700 border-main-color bg-gray-700">Sign In</a>
                        <a href="{{ route('register') }}" class="inline-block px-2.8 py-1 bg-main-color text-second-bg-color rounded-full font-semibold text-sm transition duration-500 ease-in-out hover:bg-transparent hover:text-main-color text-white px-3 border-2 border-red-700 border-main-color bg-gray-700">Sign Up</a>
                    </span>
                @endauth
            </nav>
        </header>
    </div>
    
    <!-- home -->
    <section class="min-h-screen flex items-center justify-center bg-cover bg-center relative" id="home"
        style="background-image: linear-gradient(to left, rgba(0,0,0, 0.3), rgba(0,0,0, 0.6)),
        url('{{ asset('img/imgs/home.png') }}');">
        <div class="text-center">
            <h1 class="text-3.2rem font-bold mb-2 text-white text-7xl">Welcome To</h1>
            <h1 class="text-5.6rem font-bold mb-4 text-white text-5xl">Selling Motorcycles and Cars Online</h1>
            <p class="text-1.6rem text-white text-2xl mx-auto">
                Workshop is where creativity meets skill. Here, we create, repair, 
            </p>             
            <p class="mb-10 text-1.6rem text-white text-2xl mx-auto"> and shape the world. Every tool and machine has the potential to change the world.
            </p>

            <div class="flex justify-center space-x-3 mt-6">
                <a href="#" class="border-red-700 text-red-700 inline-flex items-center justify-center w-16 h-16 border-2 border-main-color rounded-full text-main-color hover:bg-main-color hover:text-second-bg-color transition duration-500 ease-in-out">
                    <i class="bx bxl-facebook text-2rem"></i>
                </a>
                <a href="#" class="border-red-700 text-red-700 inline-flex items-center justify-center w-16 h-16 border-2 border-main-color rounded-full text-main-color hover:bg-main-color hover:text-second-bg-color transition duration-500 ease-in-out">
                    <i class="bx bxl-tiktok text-2rem"></i>
                </a>
                <a href="#" class="border-red-700 text-red-700 inline-flex items-center justify-center w-16 h-16 border-2 border-main-color rounded-full text-main-color hover:bg-main-color hover:text-second-bg-color transition duration-500 ease-in-out">
                    <i class="bx bxl-instagram-alt text-2rem"></i>
                </a>
                <a href="#" class="border-red-700 text-red-700 inline-flex items-center justify-center w-16 h-16 border-2 border-main-color rounded-full text-main-color hover:bg-main-color hover:text-second-bg-color transition duration-500 ease-in-out">
                    <i class="bx bxl-youtube text-2rem"></i>
                </a>
            </div>             

            <a href="#" class="border-2 bg-red-700 text-white inline-block px-4 py-1 bg-main-color text-second-bg-color rounded-full font-semibold text-2xl mt-6 transition duration-500 ease-in-out hover:bg-transparent hover:text-main-color">Lihat Detail</a>


        </div>
    </section>

    <!-- about -->
    <section class="min-h-screen flex items-center justify-center relative" id="about">
        <div class="text-center text-white mx-auto lg:text-left" style="position: relative; z-index: 1;">
            <h2 class="text-4.5rem mb-5 text-7xl font-semibold lg:mx-12">About <span class="text-red-700">Us</span></h2>
            <h3 class="text-2.6rem mb-4 font-semibold text-4xl lg:mx-12">BEMOLEN</h3>
            <p class="text-1.6rem mb-3 font-medium lg:mx-12 text-2xl text-justify">BEMOLEN is a transformation of existing street workshops, designed to facilitate
                assistance when encountering issues on the road. It focuses on providing on-call workshops and services
                related to tires, oil, and general maintenance for all types of motorcycles and cars. Bemolen will
                continue to evolve and grow within the automotive industry and is currently in the development phase.
                With numerous workshops registered on our website, we trust you to use this platform responsibly. We are
                ready to provide comprehensive and thorough services with various new advantages for each customer.</p>
            <a href="#"
                class="lg:mx-12 inline-block px-2.8 bg-main-color text-second-bg-color rounded-full font-semibold text-3xl mt-6 py-3 border-2 px-5 border-main-color border-solid transition duration-500 ease-in-out hover:bg-transparent hover:text-main-color bg-red-700">Read
                More</a>
            
        </div>
        <div class="absolute top-0 left-0 w-full h-full" style="background-image: linear-gradient(to left, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.6)),
            url('{{ asset('img/imgs/About.jpg') }}'); background-size: cover; background-position: center;"></div>
    </section>
    
    <!-- services -->
    <section class="min-h-screen bg-cover bg-center relative" id="services"
        style="background-image: linear-gradient(to left, rgba(0,0,0, 0.3), rgba(0,0,0, 0.8)),
        url('img/imgs/Service.png');">
        <div class="text-center text-white"> 
            <h2 class="text-4.5rem mb-10 pt-10 text-5xl font-semibold">Our <span class="text-main-color text-red-700">Services</span></h2>
            <div class="flex justify-center items-center space-x-8 px-12">
                <div class="flex-1 p-8 bg-second-bg-color rounded-lg text-center border border-bg-color hover:border-main-color
                    transform hover:scale-105 transition duration-500 ease-in-out bg-gray-800">
                    <i class='bx bxs-vector text-red-600 text-5xl'></i>
                    <h3 class="text-2.6rem mb-4 text-4xl font-semibold">Motorcycles</h3>
                    <p class="text-1.6rem">As one of the motorcycle maintenance workshops in Singaraja, we have many types
                        of motorcycle maintenance that you can choose from. The prices we offer match the quality of the
                        results provided.</p>
                  
                </div>
                <div class="flex-1 p-8 bg-second-bg-color rounded-lg text-center border border-bg-color hover:border-main-color
                    transform hover:scale-105 transition duration-500 ease-in-out bg-gray-800">
                    <i class='bx bxs-car-mechanic text-red-600 text-5xl'></i>
                    <h3 class="text-2.6rem mb-4 text-4xl font-semibold">Car Mechanic</h3>
                    <p class="text-1.6rem">From the start, we at Bemolen have been committed to providing good and
                        affordable car service or maintenance for the people of Singaraja and its surroundings.</p>
                  
                </div>
                <div class="flex-1 p-4 bg-second-bg-color rounded-lg text-center border border-bg-color hover:border-main-color
                transform hover:scale-105 transition duration-500 ease-in-out bg-gray-800">
                <i class='bx bxs-map text-red-600 text-5xl mt-4'></i>
                    <h3 class="text-2.6rem mb-4 text-4xl font-semibold">Maps</h3>
                    <p class="text-1.6rem">Bemolen is an online map that provides up-to-date information about important locations around you. With a user-friendly interface, Bemolen makes it easy for users to discover places such as restaurants, shops, post offices, and more. </p>
                    
                </div>
            </div>
        </div>
    </section>

   <!-- contact -->
<section class="min-h-screen flex items-center justify-center bg-gray-800" id="contact">
    <div class="text-center">
        <h2 class="text-4.5rem mb-12 text-6xl font-bold text-white mt-9">Contact <span
                class="text-main-color text-red-700">Us!</span></h2>
        <form action="#" class="max-w-2xl mx-auto text-left mb-12">
            <div class="flex flex-wrap -mx-4 mb-6">
                <div class="w-full md:w-1/2 px-4 mb-6">
                    <input type="text" placeholder="Full Name"
                        class="bg-gray-700 w-full p-3 text-lg bg-second-bg-color text-white font-bold rounded-lg">
                </div>
                <div class="w-full md:w-1/2 px-4 mb-6">
                    <input type="email" placeholder="Email Address"
                        class="bg-gray-700 w-full p-3 text-lg bg-second-bg-color text-white font-bold rounded-lg">
                </div>
                <div class="w-full md:w-1/2 px-4 mb-6">
                    <input type="number" placeholder="Mobile Number"
                        class="bg-gray-700 w-full p-3 text-lg bg-second-bg-color text-white font-bold rounded-lg">
                </div>
                <div class="w-full md:w-1/2 px-4 mb-6">
                    <input type="text" placeholder="Your Address"
                        class="bg-gray-700 w-full p-3 text-lg bg-second-bg-color text-white font-bold rounded-lg">
                </div>
            </div>
            <textarea name="" id="" cols="30" rows="10" placeholder="Your Message"
                class="bg-gray-700 w-full p-3 text-lg bg-second-bg-color text-white font-bold rounded-lg mb-6"></textarea>
                <input type="submit" value="Send Message"
                class=" mx-auto bg-red-600 text-white border-2 inline-block px-4 py-2 bg-main-color text-second-bg-color rounded-full font-semibold text-lg
                transition duration-500 ease-in-out hover:bg-transparent hover:text-main-color">
        </form>
    </div>
</section>


    <!-- footer -->
    <footer class="flex items-center justify-between flex-wrap p-8 bg-second-bg-color bg-gray-700">
        <div class="text">
            <p class="text-1.6rem">&copy; 2023 by BEMOLEN | All Rights Reserved.</p>
        </div>
        <div class="iconTop">
            <a href="#home" class="inline-flex items-center justify-center p-2 bg-main-color rounded-full
                transition duration-500 ease-in-out hover:shadow-lg">
                <i class="bx bx-up-arrow-alt text-2.4rem text-second-bg-color"></i>
            </a>
        </div>
    </footer>

    
    <script src="{{ asset('js/landingpage.js') }}"></script>
   

</body>

</html>
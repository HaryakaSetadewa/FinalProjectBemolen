<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#0ed3cf">
    <meta name="msapplication-TileColor" content="#0ed3cf">
    <meta name="theme-color" content="#0ed3cf">

    <title>Bemolen | Sign Up</title>

    <!-- Include Tailwind CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-800">

    <div class="min-w-screen min-h-screen flex items-center justify-center px-5 py-5">
        <div class="bg-gray-100 text-gray-500 rounded-3xl shadow-xl w-3/4 overflow-hidden max-w-screen-xl">
            <div class="md:flex w-full">
                <div class="hidden md:block w-full md:w-3/4 bg-indigo-500 p-15 relative flex-shrink-1">
                    <!-- Adjusted image style for full width and auto height -->
                    <div class="relative overflow-hidden h-full">
                        <img src="{{ asset('img/imgs/Service.png') }}" alt="Description of the image" class="w-full h-full object-cover">
                        <!-- Dark overlay -->
                        <div class="absolute top-0 left-0 w-full h-full bg-black opacity-50"></div>
                    </div>
                    <div class="absolute top-0 left-0 w-full h-full p-10 flex flex-col justify-center">
                        <h1 class="font-bold text-3xl text-white">BEMO<span class="text-red-700">LEN</span></h1>
                        <p class="text-white underline">Welcome to our registration page</p>
                    </div>
                </div>
                <div class="md:w-1/2 py-5 md:px-5">
                    <div class="text-center mb-1">
                        <h1 class="font-bold text-3xl text-gray-900">REGISTER</h1>
                        <p>Enter your information to register</p>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                    <div>
                        
                        <div class="flex -mx-3">
                            <div class="w-full px-3 mb-1">
                                <label for="name" class="text-xs font-semibold px-1">Name</label>
                                <div class="flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-email-outline text-gray-400 text-lg"></i></div>
                                    <input type="text" name="name" class="w-full -ml-10 pl-4 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" >
                                </div>
                            </div>
                        </div>
                        <div class="flex -mx-3">
                            <div class="w-full px-3 mb-1">
                                <label for="email" class="text-xs font-semibold px-1">Email</label>
                                <div class="flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-lock-outline text-gray-400 text-lg"></i></div>
                                    <input type="email" name="email" class="w-full -ml-10 pl-4 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500">
                                </div>
                            </div>
                        </div>

                        <div class="flex -mx-3">
                            <div class="w-full px-3 mb-1">
                                <label for="password" class="text-xs font-semibold px-1">Password</label>
                                <div class="flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-lock-outline text-gray-400 text-lg"></i></div>
                                    <input type="password" name="password" class="w-full -ml-10 pl-4 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500">
                                </div>
                            </div>
                        </div>

                        <div class="flex -mx-3">
                            <div class="w-full px-3 mb-5">
                                <label for="password_confirmation" class="text-xs font-semibold px-1">Confirm Password</label>
                                <div class="flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-lock-outline text-gray-400 text-lg"></i></div>
                                    <input type="password" name="password_confirmation" class="w-full -ml-10 pl-4 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500">
                                </div>
                            </div>
                        </div>

                        <div class="flex -mx-3">
                            <div class="w-full px-3 mb-5">
                                <!-- Menambahkan href pada tombol REGISTER NOW -->
                                <button href="{{ url('/bemolen') }}" class="block w-full max-w-xs mx-auto bg-red-600  focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold text-center">REGISTER NOW</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
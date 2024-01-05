
<script src="https://cdn.tailwindcss.com"></script>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>BEMOLEN | Sign In</title>
</head>
<body class="min-h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;">
    <header class="header absolute top-0 left-0 w-full">
        <nav class="nav p-4">
            <a href="index.html" class="text-white font-bold p-2">HOME</a>
        </nav>
    </header>
    <div class="bg-white dark:bg-gray-900 w-full">
        <div class="flex justify-center w-full h-screen">
            <div class="hidden bg-cover lg:block lg:w-2/3" style="background-image: linear-gradient(to left, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.6)),
            url('{{ asset('img/imgs/mobil.jpg') }}'); background-size: cover; background-position: center;">
                <div class="flex items-center h-full px-20 bg-gray-900 bg-opacity-40">
                    <div class="p-4">
                        <h2 class="text-5xl font-bold text-white mb-4">BEMO<span class="text-red-500">LEN</span></h2>
                        <h2 class="mb-4 text-white font-bold text-2xl font-poppins">Welcome</h2>
    <h3 class="mb-4 text-white font-bold text-lg font-poppins">To Our New Website</h3>
    <pre class="text-white"><u>Silahkan Login Untuk Melanjutkan !</u></pre>

                    </div>
                    
                    
                </div>
            </div>
            
            <div class="flex items-center w-full max-w-md px-6 mx-auto lg:w-2/6">
                <div class="flex-1">
                    <div class="text-center">
                        <h2 class="text-4xl font-bold text-center text-gray-700 dark:text-white">LOGIN</h2>
                        
                        <p class="mt-3 text-gray-500 dark:text-gray-300">Sign in to access your account</p>
                    </div>

                    <div class="mt-8">
                        <form>
                            <div>
                                <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Email Address</label>
                                <input type="email" name="email" id="email" placeholder="example@example.com" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                            </div>

                            <div class="mt-6">
                                <div class="flex justify-between mb-2">
                                    <label for="password" class="text-sm text-gray-600 dark:text-gray-200">Password</label>
                                    <a href="#" class="text-sm text-gray-400 focus:text-blue-500 hover:text-blue-500 hover:underline">Forgot password?</a>
                                </div>

                                <input type="password" name="password" id="password" placeholder="Your Password" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                            </div>

                            <div class="mt-6">
                                <button
                                    class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-blue-500 rounded-md hover:bg-blue-400 focus:outline-none focus:bg-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                                    <a href="landing-page" target="_blank">Sign in</a>
                                </button>
                            </div>

                        </form>

                        <p class="mt-6 text-sm text-center text-gray-400">Don&#x27;t have an account yet? <a href="#" class="text-blue-500 focus:outline-none focus:underline hover:underline">Sign up</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

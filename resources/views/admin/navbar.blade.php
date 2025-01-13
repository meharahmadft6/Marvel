<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marvel- by Ahmad</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss-jit-cdn"></script>
</head>

<body class="bg-gray-100 text-gray-900">
    <nav class="bg-white dark:bg-black fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-black">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTaVE7nSkWScd-bzKgvQjQ1Cl6c0Bfr2hGfTA&s" class="h-8" alt="Flowbite Logo">
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Marvel</span>
            </a>
            <div class="flex md:order-2 space-x-5 md:space-x-5 rtl:space-x-reverse">


                <!-- Check if user is logged in -->
                @auth
                <!-- If logged in, show user's profile icon and name below it -->
                <div class="flex flex-col items-center">
                    <span class="text-white text-xl mt-3 ml-12 font-bold">{{ Auth::user()->name }}</span>
                </div>
                @else
                <!-- If not logged in, show login text with bold font -->
                <div class="flex items-center justify-center space-x-2">
                    <a href="/profile" class="text-white bg-black w-12 h-12 hover:bg-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-full text-sm flex items-center justify-center">
                        <img src="{{asset('assets/user-icon.png')}}" alt="Profile Icon" class="w-6 h-6">
                    </a>
                    <!-- <a href="/login" class="text-white font-bold text-xs">Login</a> -->
                </div>
                @endauth
                <!-- Logout button -->
                <a class="bg-white mt-1 ml-10 w-10 h-10  focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-full text-sm flex items-center justify-center" href="/logout">
                    <img src="{{asset('assets/switch.png')}}" alt="Switch Icon" class="w-6 h-6 ">
                </a>

            </div>


            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-black md:dark:bg-black dark:border-black">
                    <li>
                        <a href="/" class="block py-2 px-3 text-white bg-red-700 rounded md:bg-transparent md:text-red-700 md:p-0 md:dark:text-red-500">Home</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-red-700 md:p-0 md:dark:hover:text-red-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-red-700 md:p-0 md:dark:hover:text-red-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-red-700 md:p-0 md:dark:hover:text-red-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                    </li>
                    <li>
                        <a href="/blogAdmin" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-red-700 md:p-0 md:dark:hover:text-red-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Blog</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Body content -->
</body>

</html>
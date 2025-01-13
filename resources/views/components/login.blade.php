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

<body class="bg-black">
    @include("components.navbar")
    <div class="flex h-screen bg-red-700">
        <div class="flex flex-col w-full max-w-xl m-auto bg-black rounded p-5">

            <div id="loginForm" class="w-full p-5">
                <header>
                    <img class="w-22 h-20 mx-auto mb-5" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTaVE7nSkWScd-bzKgvQjQ1Cl6c0Bfr2hGfTA&s" alt="Logo" />
                </header>

                @if ($errors->any())
                <div class="bg-red-500 text-white text-sm rounded p-3 mb-6">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if (session('success'))
                <div class="bg-green-500 text-white text-sm rounded p-3 mb-6">
                    {{ session('success') }}
                </div>
                @endif

                <form action="{{ route('loginSuccess') }}" method="POST">
                    @csrf
                    <div>
                        <label class="block mb-2 text-red-500" for="email">Email</label>
                        <input class="w-full p-2 mb-6 text-red-700 border-b-2 border-red-500 outline-none focus:bg-red-100"
                            type="email" name="email" value="{{ old('email') }}" placeholder="Enter your email">
                    </div>
                    <div>
                        <label class="block mb-2 text-red-500" for="password">Password</label>
                        <input class="w-full p-2 mb-6 text-red-700 border-b-2 border-red-500 outline-none focus:bg-red-100"
                            type="password" name="password" placeholder="Enter your password">
                    </div>
                    <div>
                        <input class="w-full bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-4 mb-6 rounded"
                            type="submit" value="Login">
                    </div>
                </form>
                <footer>
                    <a class="text-red-500 hover:text-red-700 text-sm float-left" href="#">Forgot Password?</a>
                    <a class="text-red-500 hover:text-red-700 text-sm float-right cursor-pointer" href="/signup">Create Account</a>
                </footer>
            </div>
        </div>
    </div>
</body>

</html>
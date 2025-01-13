<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marvel- by Ahmad</title>
    <link rel="shortcut icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTaVE7nSkWScd-bzKgvQjQ1Cl6c0Bfr2hGfTA&s" type="image/x-icon">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss-jit-cdn"></script>
</head>

<body class="bg-black">
    @include("components.navbar")

    <div class="flex h-screen bg-red-700">
        <div class="flex flex-col w-full max-w-xl m-auto bg-black rounded p-5">

            <div id="signupForm" class="w-full p-5">
                <form action="{{ route('storeUser') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Full Name Field -->
                    <div>
                        <label class="block mb-2 text-red-500" for="name">Full Name</label>
                        <input class="w-full p-2 mb-2 text-red-700 border-b-2 border-red-500 outline-none focus:bg-red-100"
                            type="text" name="name" value="{{ old('name') }}" placeholder="Enter your full name">
                        @error('name')
                        <p class="text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email Field -->
                    <div>
                        <label class="block mb-2 text-red-500" for="email">Email</label>
                        <input class="w-full p-2 mb-2 text-red-700 border-b-2 border-red-500 outline-none focus:bg-red-100"
                            type="email" name="email" value="{{ old('email') }}" placeholder="Enter your email">
                        @error('email')
                        <p class="text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label class="block mb-2 text-red-500" for="password">Password</label>
                        <input class="w-full p-2 mb-2 text-red-700 border-b-2 border-red-500 outline-none focus:bg-red-100"
                            type="password" name="password" placeholder="Enter your password">
                        @error('password')
                        <p class="text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password Field -->
                    <div>
                        <label class="block mb-2 text-red-500" for="password_confirmation">Confirm Password</label>
                        <input class="w-full p-2 mb-2 text-red-700 border-b-2 border-red-500 outline-none focus:bg-red-100"
                            type="password" name="password_confirmation" placeholder="Re-enter your password">
                        @error('password_confirmation')
                        <p class="text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <input class="w-full bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-4 mb-6 rounded"
                            type="submit" value="Signup">
                    </div>
                </form>

                <!-- Footer -->
                <footer>
                    <p class="text-red-500 text-sm text-center">Already have an account?
                        <a class="hover:text-red-700 font-bold cursor-pointer" href="/login">Login</a>
                    </p>
                </footer>
            </div>
        </div>
    </div>
</body>

</html>
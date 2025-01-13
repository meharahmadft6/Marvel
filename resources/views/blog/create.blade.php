<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body class="bg-black text-white">
    @include('components.navbar')

    <div class="container mx-auto px-4 mt-10">
        <div class="text-center pt-16">
            <h1 class="text-4xl font-bold">Add New Post</h1>
            <p class="text-gray-400 mt-4">Create and publish your blog post with ease.</p>
        </div>
        @if ($errors->any())
        <div class="bg-red-300 border border-red-600 text-red-700 px-4 py-3 rounded mb-6 max-w-3xl mx-auto text-center">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="max-w-3xl mx-auto mt-1 rounded-lg shadow-lg p-8">
            <form action="{{ route('blog.storeBlog') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex items-center mb-6">
                    <label for="is_published" class="text-xl mr-4">Is Published:</label>
                    <input type="checkbox" name="is_published" class="w-6 h-6 text-red-600 focus:ring-red-500 focus:ring-2">
                </div>

                <!-- Title -->
                <div class="mb-6">
                    <label for="title" class="block text-lg font-semibold mb-2">Title</label>
                    <input type="text" name="title" placeholder="Enter title..."
                        class="w-full p-3 rounded-lg bg-gray-700 text-white focus:ring-2 focus:ring-red-500 focus:outline-none">
                </div>

                <!-- Excerpt -->
                <div class="mb-6">
                    <label for="excerpt" class="block text-lg font-semibold mb-2">Excerpt</label>
                    <input type="text" name="excerpt" placeholder="Enter excerpt..."
                        class="w-full p-3 rounded-lg bg-gray-700 text-white focus:ring-2 focus:ring-red-500 focus:outline-none">
                </div>

                <!-- Minutes to Read -->
                <div class="mb-6">
                    <label for="min_to_read" class="block text-lg font-semibold mb-2">Minutes to Read</label>
                    <input type="number" name="min_to_read" placeholder="Enter minutes to read..."
                        class="w-full p-3 rounded-lg bg-gray-700 text-white focus:ring-2 focus:ring-red-500 focus:outline-none">
                </div>

                <!-- Body -->
                <div class="mb-6">
                    <label for="body" class="block text-lg font-semibold mb-2">Body</label>
                    <textarea name="body" placeholder="Write your content here..."
                        class="w-full p-3 rounded-lg bg-gray-700 text-white h-40 focus:ring-2 focus:ring-red-500 focus:outline-none"></textarea>
                </div>

                <!-- File Upload -->
                <div class="mb-6">
                    <label class="block text-lg font-semibold mb-2">Upload Image</label>
                    <input type="file" name="image"
                        class="block w-full text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:bg-red-700 file:text-white hover:file:bg-red-800 focus:ring-2 focus:ring-red-500 focus:outline-none">
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit"
                        class="bg-red-700 hover:bg-red-800 text-white font-bold py-3 px-8 rounded-full text-lg transition-transform duration-300 hover:scale-105 focus:ring-4 focus:ring-red-500 focus:outline-none">
                        Submit Post
                    </button>
                </div>
            </form>
        </div>
    </div>
    @include('components.footer')
</body>

</html>
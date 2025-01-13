<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marvel - by Ahmad</title>
    <link rel="shortcut icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTaVE7nSkWScd-bzKgvQjQ1Cl6c0Bfr2hGfTA&s" type="image/x-icon">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body>
    @include('components.navbar')

    <div class="container mt-20 mb-4">
        <div class="flex justify-end">
            <a class="text-white mt-2 bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-6 py-3 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 transform transition-transform duration-300 hover:scale-110 mr-4"
                href="/blogAdmin/create">
                Create
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 ms-4 me-4 mt-3">
            @foreach($posts as $post)
            <div
                class="bg-white border border-gray-200 rounded-lg shadow dark:bg-black dark:border-red-700 transform transition-transform duration-300 hover:scale-105 hover:shadow-xl hover:bg-gray-100 dark:hover:bg-black">
                <div class="p-5">
                    <div class="flex justify-end items-center space-x-4">
                        <!-- Edit Button -->
                        <a href="/blogAdmin/{{$post->id}}/edit">
                            <img src="{{ asset('assets/pen.png') }}" alt="Edit Icon" class="w-10 h-10">
                        </a>

                        <!-- Delete Button -->
                        <form action="{{ route('deleteBlog', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">
                                <img src="{{ asset('assets/del.png') }}" alt="Delete Icon" class="w-10 h-10 mt-2">
                            </button>
                        </form>
                    </div>

                    <a href="/blog/blogDetails/{{$post->id}}">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{$post->title}}
                        </h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$post->excerpt}}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        {{ \Illuminate\Support\Str::limit(strip_tags($post->body), 150, '...') }}
                    </p>

                    <h5 class="mb-2 font-bold tracking-tight text-gray-900 dark:text-red-700">
                        Published: {{ $post->is_published == 1 ? 'true' : 'false' }}
                    </h5>

                    <!-- Show number of comments -->
                    <p class="text-gray-600 dark:text-gray-400 mt-2">
                        Comments: {{ \App\Models\Comment::where('post_id', $post->id)->count() }}
                    </p>
                </div>
            </div>
            @endforeach

        </div>
    </div>
    <div class="mx-auto pb-10 w-4/5">
        {{ $posts->links('pagination::tailwind') }}
    </div>


</body>

</html>
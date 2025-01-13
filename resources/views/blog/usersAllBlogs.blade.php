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

        <!-- Search Bar -->
        <div class="flex justify-end mb-6 ">
            <input type="text" id="searchInput"
                class="w-full mt-3 mr-3 max-w-md text-red-700 p-3 border border-red-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-700 "
                placeholder="Search posts by title...">
        </div>

        <!-- Posts Grid -->
        <div id="postsGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 ms-4 me-4 mt-8">

            @foreach($posts as $post)
            <div data-title="{{ strtolower($post->title) }}"
                class="post-card bg-white border border-gray-200 rounded-lg shadow dark:bg-black dark:border-red-700 transform transition-transform duration-300 hover:scale-105 hover:shadow-xl hover:bg-gray-100 dark:hover:bg-black mt-2">
                <div class="p-5">
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
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script>
        // JavaScript for Search Functionality
        const searchInput = document.getElementById('searchInput');
        const postsGrid = document.getElementById('postsGrid');
        const postCards = document.querySelectorAll('.post-card');

        searchInput.addEventListener('input', function() {
            const query = searchInput.value.toLowerCase();
            postCards.forEach(card => {
                const title = card.getAttribute('data-title');
                if (title.includes(query)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>
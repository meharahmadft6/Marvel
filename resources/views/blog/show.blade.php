<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marvel- by Ahmad</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')

    <!-- Toast Styling -->
    <style>
        .toast {
            position: fixed;
            top: 4rem;
            right: 2rem;
            z-index: 50;
            background-color: rgba(255, 56, 56, 0.9);
            color: white;
            padding: 1rem 1.5rem;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            font-weight: bold;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: none;
            opacity: 0;
            transform: translateY(-100%);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .toast.show {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>

<body class="bg-black">
    @include('components.navbar')

    <!-- Toast for error message -->
    <div id="toast" class="toast"></div>

    <!-- Hidden div to store the error message for JavaScript use -->
    <div id="error-message" style="display: none;">{{ $errors->first('comment') }}</div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-20 mb-3 grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Left Side: Blog Details -->
        <div class="lg:col-span-2">
            <div class="max-w-3xl mx-auto">
                <!-- Blog post header -->
                <div class="py-8 text-white">
                    <h1 class="text-3xl font-bold mb-2">{{$post->title}}</h1>
                    <p class="text-sm">Published on <time>{{$post->created_at}}</time></p>
                </div>

                <img src="{{asset($post->image_url)}}" alt="Featured image" class="w-full h-auto mb-8 rounded-lg shadow-lg">

                <!-- Blog post content -->
                <div class="prose prose-sm sm:prose lg:prose-lg xl:prose-xl mx-auto text-white">
                    {!! nl2br(e($post->body)) !!}
                </div>
            </div>
        </div>

        <!-- Right Side: Comments & Ratings -->
        <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold text-white mb-4">Leave a Comment</h2>

            <!-- Comments Form -->
            <form action="{{ route('blog.comment', $post->id) }}" method="POST">
                @csrf
                <!-- Rating -->
                <div class="mb-4">
                    <label for="rating" class="block text-lg font-medium text-white">Rating (1-5)</label>
                    <select name="rating" id="rating" required
                        class="w-full mt-2 p-2 border border-gray-600 rounded-lg bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-red-500">
                        <option value="" disabled selected>Choose your rating</option>
                        <option value="1">🥱 - Poor</option>
                        <option value="2">🤔 - Fair</option>
                        <option value="3">😊 - Good</option>
                        <option value="4">🥰 - Very Good</option>
                        <option value="5">😍 - Excellent</option>
                    </select>
                </div>

                <!-- Comment -->
                <div class="mb-4">
                    <label for="comment" class="block text-lg font-medium text-white">Your Comment</label>
                    <textarea name="comment" id="comment" rows="5" required
                        class="w-full mt-2 p-2 border border-gray-600 rounded-lg bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-red-500"
                        placeholder="Write your comment here..."></textarea>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-6 rounded-lg transition-transform duration-300 hover:scale-105 focus:ring-4 focus:ring-red-500">
                    Submit
                </button>
            </form>

            <!-- Display Comments -->
            <div class="mt-6">
                <h3 class="text-xl font-bold text-white mb-4">Recent Comments</h3>
                @if($comments->isEmpty())
                <p class="text-gray-400">No comments yet. Be the first to leave one!</p>
                @else
                @foreach($comments as $comment)
                <div class="mb-4 p-4 border border-gray-700 rounded-lg bg-gray-900">
                    <div class="flex items-center justify-between mb-2">
                        <h4 class="text-lg font-semibold text-red-500">{{ $comment->user->name }}</h4>
                        <span class="text-sm text-gray-400">{{ $comment->created_at->diffForHumans() }}</span>
                    </div>
                    <p class="text-white mb-2">{{ $comment->content }}</p>
                    <div class="text-yellow-400">
                        @for ($i = 1; $i <= 5; $i++)
                            <span class="inline-block">{{ $i <= $comment->rating ? '★' : '☆' }}</span>
                            @endfor
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>

    @include('components.footer')

    <!-- JavaScript for Toast -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const errorMessage = document.getElementById('error-message').textContent.trim();

            // If there is an error message
            if (errorMessage) {
                const toast = document.getElementById('toast');
                toast.textContent = errorMessage; // Display the error message
                toast.classList.add('show'); // Show the toast

                // Hide the toast after 5 seconds
                setTimeout(() => {
                    toast.classList.remove('show'); // Hide the toast
                }, 2000);
            }
        });
    </script>
</body>

</html>
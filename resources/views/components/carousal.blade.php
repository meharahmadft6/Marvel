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

    <div class="container mx-auto mt-10">
        <!-- Carousel -->
        <div class="relative w-full overflow-hidden">
            <div id="carousel" class="flex transition-transform" style="transition-duration: 2000ms;">
                <img src="{{asset('assets/2.jpg')}}" alt="Slide 1" class="w-full flex-shrink-0">
                <img src="{{asset('assets/1.jpg')}}" alt="Slide 2" class="w-full flex-shrink-0">
                <img src="{{asset('assets/3.jpg')}}" alt="Slide 3" class="w-full flex-shrink-0">
                <img src="{{asset('assets/4.jpg')}}" alt="Slide 4" class="w-full flex-shrink-0">
                <img src="{{asset('assets/5.jpg')}}" alt="Slide 5" class="w-full flex-shrink-0">
            </div>

            <!-- Controls with SVG Icons -->
            <button id="prev" class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-gray-800 p-2 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button id="next" class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-gray-800 p-2 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </div>

    <script>
        const carousel = document.getElementById('carousel');
        const slides = carousel.children.length;
        const prev = document.getElementById('prev');
        const next = document.getElementById('next');
        let index = 0;

        const updateCarousel = () => {
            const offset = -index * 100; // Moves the carousel to the current slide
            carousel.style.transform = `translateX(${offset}%)`;
        };

        prev.addEventListener('click', () => {
            index = (index - 1 + slides) % slides; // Decrement index, wrapping around
            updateCarousel();
        });

        next.addEventListener('click', () => {
            index = (index + 1) % slides; // Increment index, wrapping around
            updateCarousel();
        });
    </script>

</body>

</html>
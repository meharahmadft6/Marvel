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

<body>
    <section class="py-24 relative">
        <div class="w-full max-w-7xl px-4 md:px-5 lg:px-5 mx-auto">
            <div class="w-full justify-start items-center gap-12 grid lg:grid-cols-2 grid-cols-1">
                <div
                    class="w-full justify-center items-start gap-6 grid sm:grid-cols-2 grid-cols-1 lg:order-first order-last">
                    <div class="pt-24 lg:justify-center sm:justify-end justify-start items-start gap-2.5 flex">
                        <img class=" rounded-xl object-cover" src="{{asset('assets/2.jpg')}}" alt="about Us image" />
                    </div>
                    <img class="sm:ml-0 ml-auto rounded-xl object-cover" src="{{asset('assets/5.jpg')}}"
                        alt="about Us image" />
                </div>
                <div class="w-full flex-col justify-center lg:items-start items-center gap-10 inline-flex">
                    <div class="w-full flex-col justify-center items-start gap-8 flex">
                        <div class="w-full flex-col justify-start lg:items-start items-center gap-3 flex">
                            <h2
                                class="text-white text-4xl font-bold font-manrope leading-normal lg:text-start text-center">
                                Empowering Each Other to Succeed</h2>
                            <p class="text-white text-base font-normal leading-relaxed lg:text-start text-center">
                                Every project we've undertaken has been a collaborative effort, where every person
                                involved has left their mark. Together, we've not only constructed buildings but also
                                built enduring connections that define our success story.</p>
                        </div>
                        <div class="w-full lg:justify-start justify-center items-center sm:gap-10 gap-5 inline-flex">
                            <div class="flex-col justify-start items-start inline-flex">
                                <h3 id="experience-counter" class="text-white text-4xl font-bold font-manrope leading-normal">0</h3>
                                <h6 class="text-white text-base font-normal leading-relaxed">Years of Experience</h6>
                            </div>
                            <div class="flex-col justify-start items-start inline-flex">
                                <h4 id="successfull-projects" class="text-white text-4xl font-bold font-manrope leading-normal">0</h4>
                                <h6 class="text-white text-base font-normal leading-relaxed">Successful Projects</h6>
                            </div>
                            <div class="flex-col justify-start items-start inline-flex">
                                <h4 id="happy-clients" class="text-white text-4xl font-bold font-manrope leading-normal">0</h4>
                                <h6 class="text-white text-base font-normal leading-relaxed">Happy Clients</h6>
                            </div>
                        </div>

                        <script>
                            // Function to animate the counter
                            function animateCounter(id, start, end, duration) {
                                const counterElement = document.getElementById(id);
                                const range = end - start;
                                const increment = range / (duration / 100);
                                let current = start;
                                const timer = setInterval(() => {
                                    current += increment;
                                    if (current >= end) {
                                        current = end; // Stop at the end value
                                        clearInterval(timer);
                                    }
                                    counterElement.textContent = Math.floor(current); // Update the text content
                                }, 50);
                            }

                            animateCounter('happy-clients', 1, 52, 800);
                            animateCounter('experience-counter', 1, 33, 1000);
                            animateCounter('successfull-projects', 20, 152, 500);
                        </script>
                    </div>
                    <button
                        class="sm:w-fit w-full px-3.5 py-2 bg-red-600 hover:bg-red-800 transition-all duration-700 ease-in-out rounded-lg shadow-[0px_1px_2px_0px_rgba(16,_24,_40,_0.05)] justify-center items-center flex">
                        <span class="px-1.5 text-white text-sm font-medium leading-6">Read More</span>
                    </button>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
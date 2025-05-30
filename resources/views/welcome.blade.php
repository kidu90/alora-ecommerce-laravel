<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])



</head>

<body class="font-noto">
    @include('partials.navbar')

    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
        <!-- Hero Section -->
        <section class="bg-gray-100 rounded-3xl mx-4 sm:mx-6 my-8 sm:my-12 overflow-hidden">
            <div class="container max-w-screen-xl mx-auto px-6 sm:px-8 lg:px-12 py-12 sm:py-16 lg:py-20 flex flex-col md:flex-row items-center gap-6 md:gap-8">
                <div class="w-full md:w-1/2 mb-8 md:mb-0 text-center md:text-left">
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold mb-3 sm:mb-6">Let Your</h2>
                    <h1 class="text-5xl sm:text-6xl lg:text-7xl font-bold mb-3 sm:mb-6">SKIN GLOW</h1>
                    <p class="text-xl sm:text-2xl mb-6 sm:mb-10">With Alora</p>
                </div>
                <div class="w-full md:w-1/2">
                    <img src="{{ asset('images/new.avif') }}" alt="Woman in white dress" class="w-full h-auto rounded-lg" loading="lazy">
                </div>
            </div>
        </section>
    </div>

    <!-- About Section -->

    <section class="container mx-auto px-4 py-8 sm:py-12 lg:py-16">
        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold mb-6 sm:mb-8 text-center md:text-left">About Us</h2>
        <div class="flex flex-col md:flex-row gap-4 md:gap-8">
            <div class="w-full md:w-1/2 mb-6 md:mb-0">
                <p class="mb-4 text-sm sm:text-base">Welcome to Alora, where beauty meets brilliance. Our passion is to empower you with the confidence to show your best self—with innovative cosmetics that celebrate your unique beauty. At Alora, we believe that makeup is more than just a product—it's an experience, an art form, and a means of self-expression.</p>
                <p class="text-sm sm:text-base">Founded with a vision to revolutionize the cosmetic industry, Alora was born from a desire to offer luxurious, wearable beauty solutions. We are committed to using the finest ingredients and the latest technology to develop cosmetics that not only enhance your natural beauty but also care for your skin.</p>
            </div>
            <div class="w-full md:w-1/2 grid grid-cols-2 gap-2 sm:gap-4 md:grid-cols-2">
                <img src="{{ asset('images/about.png') }}" alt="Makeup product" class="w-full h-32 sm:h-40 md:h-48 object-cover rounded-lg">
                <img src="{{ asset('images/about2.png') }}" alt="Makeup application" class="w-full h-32 sm:h-40 md:h-48 object-cover rounded-lg">
            </div>
        </div>
    </section>


    <!-- Categories Section -->
    <section class="bg-gray-100 py-8 sm:py-12 lg:py-20">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold mb-6 sm:mb-8 text-center sm:text-left">SHOP BY CATEGORY</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                <a href="" class="block bg-white rounded-lg overflow-hidden shadow hover:shadow-lg transition">
                    <img src="{{ asset('images/lip_cat.avif') }}" alt="Lips Category" class="w-full h-48 sm:h-64 lg:h-80 object-cover">
                    <div class="p-4 text-center">
                        <h3 class="text-lg sm:text-xl font-semibold">Lips</h3>
                    </div>
                </a>
                <a href="" class="block bg-white rounded-lg overflow-hidden shadow hover:shadow-lg transition">
                    <img src="{{ asset('images/eye_cat.avif') }}" alt="Eyes Category" class="w-full h-48 sm:h-64 lg:h-80 object-cover">
                    <div class="p-4 text-center">
                        <h3 class="text-lg sm:text-xl font-semibold">Eyes</h3>
                    </div>
                </a>
                <a href="" class="block bg-white rounded-lg overflow-hidden shadow hover:shadow-lg transition">
                    <img src="{{ asset('images/skin_cat.avif') }}" alt="Face Category" class="w-full h-48 sm:h-64 lg:h-80 object-cover">
                    <div class="p-4 text-center">
                        <h3 class="text-lg sm:text-xl font-semibold">Face</h3>
                    </div>
                </a>
            </div>
        </div>
    </section>


    <!-- Featured Product Section -->
    <section class="py-8 sm:py-12 lg:py-16 my-6 sm:my-12 lg:my-16">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center gap-4 md:gap-8">
            <div class="w-full  md:w-1/3 mb-6 md:mb-0">
                <img src="{{ asset('images/image 30.png') }}" alt="Nude Lipstick" class="w-full h-auto rounded-lg">
            </div>
            <div class="w-full md:w-2/3 text-center md:text-left">
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold mb-4">Enhance Your Beauty with Alora's New "Nude" Lipstick</h2>
                <p class="mb-4 text-sm sm:text-base">Introducing "Nude" by Alora – the latest addition to your makeup collection that promises to redefine elegance. This new lipstick shade is designed to complement and enhance your natural lip color, creating a timeless look that's perfect for any occasion.</p>
                <p class="mb-4 sm:mb-8 text-sm sm:text-base">"Nude" offers a smooth, creamy texture that ensures long-lasting wear without drying your lips. Infused with nourishing ingredients, it keeps your lips soft and supple throughout the day. Elevate your everyday look or add a touch of subtle beauty with Alora's "Nude" lipstick.</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                    <a href="{{ route('welcome') }}">
                        <button class="bg-gray-200 text-black px-4 sm:px-6 py-2 rounded-lg hover:bg-gray-100 w-full sm:w-auto">Shop Now</button>
                    </a>
                    <a href="{{ route('welcome') }}">
                        <button class="border border-gray-300 px-4 sm:px-6 py-2 rounded-lg hover:bg-gray-100 w-full sm:w-auto">Explore</button>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest arrivals  -->
    <section class="container mx-auto px-4 py-16">
        <h2 class="text-4xl font-bold mb-8">Latest Arrivals</h2>
        <div class="grid sm:grid-col-2 md:grid-cols-4  gap-8">

            <!-- <div class="bg-white rounded-lg shadow hover:shadow-lg transition p-4">
                <img src="{{ asset('images/eye1.avif') }}" alt="Eye Product 1" class="w-full h-48 object-cover rounded-lg mb-4">
                <h3 class="text-lg font-semibold mb-2">Eye Product 1</h3>
                <p class="text-gray-600 mb-2">$19.99</p>
                <a href="#" class="text-blue-500 hover:underline">View Details</a>
            </div> -->

        </div>
    </section>




    </div>
    @include('partials.footer')
</body>

</html>
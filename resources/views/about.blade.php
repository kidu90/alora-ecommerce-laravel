<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
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

    <section class="relative">
        <div class="relative">
            <!-- Image -->
            <img src="" alt="About Us" class="w-full h-64 sm:h-80 lg:h-[400px] object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>

            <div class="absolute inset-0 flex flex-col justify-center items-center text-center text-white px-4 sm:px-6 lg:px-8">
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold mb-2 sm:mb-3 lg:mb-4">Our Story</h2>
                <p class="mb-3 sm:mb-4 max-w-lg sm:max-w-xl lg:max-w-3xl text-sm sm:text-base lg:text-lg">
                    Welcome to Alora, where beauty meets brilliance. Our passion is to empower you with the confidence to show your best self—with innovative cosmetics that celebrate your unique beauty.
                </p>
                <p class="max-w-lg sm:max-w-xl lg:max-w-3xl text-sm sm:text-base lg:text-lg">
                    Founded with a vision to revolutionize the cosmetic industry, Alora was born from a desire to offer luxurious, wearable beauty solutions. We are committed to using the finest ingredients and the latest technology to develop cosmetics that not only enhance your natural beauty but also care for your skin.
                </p>
            </div>
        </div>
    </section>


    <!-- Beauty Categories  -->
    <section class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12 lg:py-16">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6 lg:gap-8">
            <div class="relative rounded-lg overflow-hidden h-64 sm:h-80 lg:h-[500px]">
                <img src="https://images.unsplash.com/photo-1552693673-1bf958298935" alt="Glow Naturally" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black/20 flex items-end p-4 sm:p-6 lg:p-8">
                    <h3 class="playfair text-white text-xl sm:text-2xl lg:text-3xl font-semibold">Glow Naturally</h3>
                </div>
            </div>
            <div class="relative rounded-lg overflow-hidden h-64 sm:h-80 lg:h-[500px]">
                <img src="https://images.unsplash.com/photo-1487412947147-5cebf100ffc2" alt="Express Your Beauty" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black/20 flex items-end p-4 sm:p-6 lg:p-8">
                    <h3 class="playfair text-white text-xl sm:text-2xl lg:text-3xl font-semibold">Express Your Beauty</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Team Section  -->
    <section class="bg-white py-20">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-24 items-center max-w-6xl mx-auto">
                <div class="rounded-lg overflow-hidden">
                    <img src="{{ asset('images/team.avif') }}" alt="Our Team" class="w-full h-[300px] object-cover">
                </div>
                <div class="space-y-6 px-6">
                    <h2 class="playfair text-3xl font-semibold">Our Team</h2>
                    <div class="space-y-4 text-gray-700">
                        <p>At Alora, we are more than just a team—we're a family of passionate individuals dedicated to redefining beauty and wellness. Each member of our team brings unique expertise, ensuring that every product and service we offer meets the highest standards.</p>
                        <p>From our dedicated specialists to our creative brand strategists and select premium items from designers who craft a seamless and user-friendly platform, every detail at Alora is shaped by the hands and minds of people who genuinely care about your journey to self-care and beauty.</p>
                    </div>
                    <a href="index.php?route=contact" class="inline-block">
                        <button class="bg-gray-200 text-black px-8 py-3 rounded-lg hover:bg-gray-100 transition-colors mt-16">
                            Contact Us
                        </button>
                    </a>
                </div>


            </div>
        </div>
        </div>
    </section>

    @include('partials.footer')

</body>

</html>
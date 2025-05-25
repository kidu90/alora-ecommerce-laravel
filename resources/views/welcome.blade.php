<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>

<body class="font-sans">
    @include('partials.navbar')

    <section class="bg-gray-100 rounded-3xl mx-4 my-8 overflow-hidden">
        <div class="container mx-auto px-4 py-16 flex items-center md:flex-row flex-col">
            <div class="w-1/2">
                <h2 class="text-4xl md:text-3xl font-bold mb-4 ">Let Your</h2>
                <h1 class="text-6xl font-bold mb-4 ">SKIN GLOW</h1>
                <p class="text-xl mb-8">With Alora</p>
            </div>
            <div class="w-1/2">
                <img src="assets/images/new.avif" alt="Woman in white dress" class="w-full h-auto rounded-lg">
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="container mx-auto px-4 py-16 ">
        <h2 class="text-4xl font-bold mb-8 md:items-center">About Us</h2>
        <div class="flex space-x-8 md:flex-row flex-col ">
            <div class="w-1/2 md:w-full">
                <p class="mb-4">Welcome to Aurora, where beauty meets brilliance. Our passion is to empower you with the confidence to show your best self—with innovative cosmetics that celebrate your unique beauty. At Aurora, we believe that makeup is more than just a product—it's an experience, an art form, and a means of self-expression.</p>
                <p>Founded with a vision to revolutionize the cosmetic industry, Aurora was born from a desire to offer luxurious, wearable beauty solutions. We are committed to using the finest ingredients and the latest technology to develop cosmetics that not only enhance your natural beauty but also care for your skin.</p>
            </div>
            <div class="w-1/2 grid grid-cols-2 gap-4 md:grid-cols-1 gap-2">
                <img src="assets/images/about.png" alt="Makeup product" class="w-full h-48 object-cover rounded-lg">
                <img src="assets/images/about2.png" alt="Makeup application" class="w-full h-48 object-cover rounded-lg">
            </div>
        </div>
    </section>




    <section class=" py-16 my-16">
        <div class="container mx-auto px-4 flex md:flex-row flex-col items-center">
            <div class="md:w-1/3">
                <img src="assets/images/image 30.png" alt="Nude Lipstick" class="w-full h-auto rounded-3xl">
            </div>
            <div class="md:w-2/3 md:pl-8 md:mt-0 mt-8">
                <h2 class="text-4xl font-bold mb-4">Enhance Your Beauty with Aurora's New "Nude" Lipstick</h2>
                <p class="mb-4">Introducing "Nude" by Aurora – the latest addition to your makeup collection that promises to redefine elegance. This new lipstick shade is designed to complement and enhance your natural lip color, creating a timeless look that's perfect for any occasion.</p>
                <p class="mb-8">"Nude" offers a smooth, creamy texture that ensures long-lasting wear without drying your lips. Infused with nourishing ingredients, it keeps your lips soft and supple throughout the day. Elevate your everyday look or add a touch of subtle beauty with Aurora's "Nude" lipstick.</p>
                <div class="flex space-x-4">
                    <a href="index.php?route=shop">
                        <button class="bg-gray-200 text-black px-6 py-2 rounded-lg hover:bg-gray-100">Shop Now</button>
                    </a>
                    <a href="index.php?route=about">
                        <button class="border border-gray-300 px-6 py-2 rounded-lg hover:bg-gray-100">Explore</button>
                    </a>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
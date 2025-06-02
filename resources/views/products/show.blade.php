<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} - Alora</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-noto">
    @include('partials.navbar')

    <main class="container mx-auto px-6 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Product Image -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/500x500' }}" 
                     alt="{{ $product->name }}" 
                     class="w-full h-96 object-cover rounded-lg">
            </div>

            <!-- Product Details -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="mb-4">
                    <span class="text-sm text-gray-600 bg-gray-100 px-2 py-1 rounded">{{ $product->category->name }}</span>
                </div>
                
                <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $product->name }}</h1>
                
                <div class="flex items-center mb-4">
                    <div class="flex space-x-1">
                        @for($i = 1; $i <= 5; $i++)
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        @endfor
                    </div>
                    <span class="ml-2 text-gray-600">(4.8)</span>
                </div>

                <div class="mb-6">
                    <span class="text-3xl font-bold text-gray-900">${{ number_format($product->price, 2) }}</span>
                </div>

                @if($product->description)
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold mb-2">Description</h3>
                        <p class="text-gray-700">{{ $product->description }}</p>
                    </div>
                @endif

                @if($product->ingredients)
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold mb-2">Ingredients</h3>
                        <p class="text-gray-700">{{ $product->ingredients }}</p>
                    </div>
                @endif

                @if($product->usage_tips)
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold mb-2">Usage Tips</h3>
                        <p class="text-gray-700">{{ $product->usage_tips }}</p>
                    </div>
                @endif

                <!-- Stock Status -->
                <div class="mb-6">
                    @if($product->stock > 0)
                        <p class="text-green-600 font-medium">✓ In Stock ({{ $product->stock }} available)</p>
                    @else
                        <p class="text-red-600 font-medium">✗ Out of Stock</p>
                    @endif
                </div>

                <!-- Add to Cart Form -->
                @if($product->stock > 0)
                    <form id="add-to-cart-form" class="space-y-4">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        
                        <div class="flex items-center space-x-4">
                            <label for="quantity" class="text-sm font-medium text-gray-700">Quantity:</label>
                            <div class="flex items-center border border-gray-300 rounded">
                                <button type="button" onclick="decreaseQuantity()" class="px-3 py-2 hover:bg-gray-100">-</button>
                                <input type="number" id="quantity" name="quantity" value="1" min="1" max="{{ $product->stock }}" 
                                       class="w-16 text-center border-0 focus:ring-0" readonly>
                                <button type="button" onclick="increaseQuantity()" class="px-3 py-2 hover:bg-gray-100">+</button>
                            </div>
                        </div>

                        <button type="submit" 
                                class="w-full bg-gray-200 text-black font-bold py-3 px-6 rounded-lg hover:bg-gray-100 transition duration-300">
                            Add to Cart
                        </button>
                    </form>
                @else
                    <button disabled 
                            class="w-full bg-gray-300 text-gray-500 font-bold py-3 px-6 rounded-lg cursor-not-allowed">
                        Out of Stock
                    </button>
                @endif

                <!-- Success/Error Messages -->
                <div id="message" class="hidden mt-4 p-4 rounded-lg"></div>
            </div>
        </div>

        <!-- Related Products -->
        <div class="mt-12">
            <h2 class="text-2xl font-bold mb-6">You might also like</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- This would typically show related products from the same category -->
                <!-- For now, we'll leave this as a placeholder -->
                <div class="text-center text-gray-500 col-span-full py-8">
                    Related products coming soon...
                </div>
            </div>
        </div>
        
        @livewire('product_review', ['productId' => $product->id])
    </main>

    @include('partials.footer')

    <script>
        const maxStock = {{ $product->stock }};
        let currentQuantity = 1;

        function increaseQuantity() {
            if (currentQuantity < maxStock) {
                currentQuantity++;
                document.getElementById('quantity').value = currentQuantity;
            }
        }

        function decreaseQuantity() {
            if (currentQuantity > 1) {
                currentQuantity--;
                document.getElementById('quantity').value = currentQuantity;
            }
        }

        document.getElementById('add-to-cart-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const messageDiv = document.getElementById('message');
            
            fetch('/cart/add', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                messageDiv.classList.remove('hidden', 'bg-red-100', 'bg-green-100', 'text-red-700', 'text-green-700');
                
                if (data.success) {
                    messageDiv.classList.add('bg-green-100', 'text-green-700');
                    messageDiv.textContent = data.success;
                } else {
                    messageDiv.classList.add('bg-red-100', 'text-red-700');
                    messageDiv.textContent = data.error || 'Failed to add item to cart';
                }
                
                messageDiv.classList.remove('hidden');
                
                // Hide message after 3 seconds
                setTimeout(() => {
                    messageDiv.classList.add('hidden');
                }, 3000);
            })
            .catch(error => {
                console.error('Error:', error);
                messageDiv.classList.remove('hidden', 'bg-green-100', 'text-green-700');
                messageDiv.classList.add('bg-red-100', 'text-red-700');
                messageDiv.textContent = 'Failed to add item to cart';
            });
        });
    </script>
</body>

</html>
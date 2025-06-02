<main class="container mx-auto px-6 py-8">
    <h1 class="text-4xl font-bold text-center mb-8">Products</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($products as $product)
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/300x200' }}" 
                 alt="{{ $product->name }}" 
                 class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="font-bold mb-2">{{ $product->name }}</h3>
                <p class="text-sm text-gray-600 mb-2">{{ $product->category->name }}</p>
                <div class="flex items-center mb-2">
                    @for($i = 1; $i <= 5; $i++)
                        <svg class="h-4 w-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                    @endfor
                </div>
                <p class="text-gray-600 mb-4 font-semibold">${{ number_format($product->price, 2) }}</p>
                
                @if($product->stock > 0)
                    <p class="text-sm text-green-600 mb-4">{{ $product->stock }} in stock</p>
                @else
                    <p class="text-sm text-red-600 mb-4">Out of stock</p>
                @endif

                <div class="flex space-x-2">
                    <a href="{{ route('products.show', $product->id) }}"
                       class="flex-1 bg-gray-200 text-black text-center px-4 py-2 rounded-lg hover:bg-gray-100 transition duration-300">
                        View Details
                    </a>
                    
                    @if($product->stock > 0)
                        <button onclick="quickAddToCart({{ $product->id }})"
                                class="bg-black text-white px-4 py-2 rounded-lg hover:bg-gray-800 transition duration-300">
                            Add to Cart
                        </button>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @if($products->isEmpty())
        <div class="text-center py-16">
            <h3 class="text-xl text-gray-600">No products available at the moment.</h3>
            <p class="text-gray-500 mt-2">Please check back later.</p>
        </div>
    @endif
</main>

<script>
    function quickAddToCart(productId) {
        fetch('/cart/add', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                product_id: productId,
                quantity: 1
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Update cart count if navbar script is available
                if (typeof updateCartCount === 'function') {
                    updateCartCount();
                }
                
                // Show success message
                alert('Product added to cart!');
            } else {
                alert(data.error || 'Failed to add product to cart');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Failed to add product to cart');
        });
    }
</script>

<main class="container mx-auto px-6 py-8">
    <h1 class="text-4xl font-bold text-center mb-8">Products</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @php use Illuminate\Support\Str; @endphp

        @forelse ($products as $product)
        <div class="bg-white rounded-lg shadow hover:shadow-lg transition p-4">
            <img src="{{ Str::startsWith($product->image, ['http://', 'https://']) 
                            ? $product->image 
                            : asset('storage/' . $product->image) }}" 
                 alt="{{ $product->name }}" 
                 class="w-full h-48 object-cover rounded-lg mb-4">

            <h3 class="text-lg font-semibold mb-1">{{ $product->name }}</h3>
            <p class="text-sm text-gray-500 mb-1">{{ $product->category->name }}</p>
            <p class="text-gray-700 font-semibold mb-2">${{ number_format($product->price, 2) }}</p>

            @if($product->stock > 0)
                <p class="text-sm text-green-600 mb-4">{{ $product->stock }} in stock</p>
            @else
                <p class="text-sm text-red-600 mb-4">Out of stock</p>
            @endif

            <div class="flex items-center justify-between">
                <a href="{{ route('products.show', $product->id) }}" 
                   class="text-blue-500 hover:underline">View Details</a>
            </div>
        </div>
        @empty
        <div class="col-span-full text-center py-16">
            <h3 class="text-xl text-gray-600">No products available at the moment.</h3>
            <p class="text-gray-500 mt-2">Please check back later.</p>
        </div>
        @endforelse
    </div>
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
                if (typeof updateCartCount === 'function') {
                    updateCartCount();
                }
                alert('Product added to cart!');
            } else {
                alert(data.error || 'Failed to add product to cart');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Something went wrong');
        });
    }
</script>

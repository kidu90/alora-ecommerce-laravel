<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - Alora</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-noto">
    @include('partials.navbar')

    <main class="container mx-auto px-6 py-8">
        <h1 class="text-4xl font-bold text-center mb-8">Shopping Cart</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        @if($cartItems->count() > 0)
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Cart Items -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-lg shadow-md p-6">
                        @foreach($cartItems as $item)
                            <div class="flex items-center justify-between border-b border-gray-200 py-4">
                                <div class="flex items-center space-x-4">
                                    <img src="{{ $item->product->image ? asset('storage/' . $item->product->image) : 'https://via.placeholder.com/80x80' }}" 
                                         alt="{{ $item->product->name }}" 
                                         class="w-20 h-20 object-cover rounded">
                                    <div>
                                        <h3 class="font-semibold">{{ $item->product->name }}</h3>
                                        <p class="text-gray-600">${{ number_format($item->price, 2) }}</p>
                                        <p class="text-sm text-gray-500">{{ $item->product->category->name }}</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-center space-x-3">
                                    <div class="flex items-center border border-gray-300 rounded">
                                        <button onclick="updateQuantity({{ $item->id }}, {{ $item->quantity - 1 }})" 
                                                class="px-2 py-1 hover:bg-gray-100" 
                                                {{ $item->quantity <= 1 ? 'disabled' : '' }}>-</button>
                                        <span class="px-3 py-1">{{ $item->quantity }}</span>
                                        <button onclick="updateQuantity({{ $item->id }}, {{ $item->quantity + 1 }})" 
                                                class="px-2 py-1 hover:bg-gray-100">+</button>
                                    </div>
                                    
                                    <div class="text-right">
                                        <p class="font-semibold">${{ number_format($item->quantity * $item->price, 2) }}</p>
                                    </div>
                                    
                                    <form action="{{ route('cart.remove', $item->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Cart Summary -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-xl font-semibold mb-4">Order Summary</h3>
                        
                        <div class="space-y-2 mb-4">
                            <div class="flex justify-between">
                                <span>Subtotal</span>
                                <span>${{ number_format($total, 2) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Shipping</span>
                                <span>$5.00</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Tax (10%)</span>
                                <span>${{ number_format($total * 0.1, 2) }}</span>
                            </div>
                            <div class="border-t border-gray-200 pt-2">
                                <div class="flex justify-between font-semibold text-lg">
                                    <span>Total</span>
                                    <span>${{ number_format($total + 5 + ($total * 0.1), 2) }}</span>
                                </div>
                            </div>
                        </div>

                        @auth
                            <a href="{{ route('orders.checkout') }}" 
                               class="w-full bg-gray-200 text-black text-center px-6 py-3 rounded-lg hover:bg-gray-100 transition duration-300 block">
                                Proceed to Checkout
                            </a>
                        @else
                            <a href="{{ route('login') }}" 
                               class="w-full bg-gray-200 text-black text-center px-6 py-3 rounded-lg hover:bg-gray-100 transition duration-300 block">
                                Login to Checkout
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        @else
            <div class="text-center py-16">
                <svg class="mx-auto h-24 w-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l-1 12H6L5 9z"></path>
                </svg>
                <h3 class="mt-4 text-lg font-medium text-gray-900">Your cart is empty</h3>
                <p class="mt-2 text-gray-500">Start shopping to add items to your cart.</p>
                <a href="{{ route('products') }}" 
                   class="mt-6 inline-block bg-gray-200 text-black px-6 py-3 rounded-lg hover:bg-gray-100 transition duration-300">
                    Continue Shopping
                </a>
            </div>
        @endif
    </main>

    @include('partials.footer')

    <script>
        function updateQuantity(cartId, quantity) {
            if (quantity < 1) return;
            
            fetch(`/cart/${cartId}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ quantity: quantity })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert(data.error || 'Failed to update quantity');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Failed to update quantity');
            });
        }
    </script>
</body>

</html>
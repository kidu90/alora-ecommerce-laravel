<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Alora</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-noto">
    @include('partials.navbar')

    <main class="container mx-auto px-6 py-8">
        <h1 class="text-4xl font-bold text-center mb-8">Checkout</h1>

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Shipping Form -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-semibold mb-6">Shipping Information</h2>
                
                <form action="{{ route('orders.store') }}" method="POST">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="shipping_name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                            <input type="text" id="shipping_name" name="shipping_name" 
                                   value="{{ old('shipping_name', auth()->user()->name) }}" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                                   required>
                            @error('shipping_name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="shipping_email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input type="email" id="shipping_email" name="shipping_email" 
                                   value="{{ old('shipping_email', auth()->user()->email) }}" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                                   required>
                            @error('shipping_email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="shipping_phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                        <input type="tel" id="shipping_phone" name="shipping_phone" 
                               value="{{ old('shipping_phone') }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                               required>
                        @error('shipping_phone')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="shipping_address" class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                        <textarea id="shipping_address" name="shipping_address" rows="3" 
                                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                                  required>{{ old('shipping_address') }}</textarea>
                        @error('shipping_address')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <div>
                            <label for="shipping_city" class="block text-sm font-medium text-gray-700 mb-2">City</label>
                            <input type="text" id="shipping_city" name="shipping_city" 
                                   value="{{ old('shipping_city') }}" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                                   required>
                            @error('shipping_city')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="shipping_state" class="block text-sm font-medium text-gray-700 mb-2">State/Province</label>
                            <input type="text" id="shipping_state" name="shipping_state" 
                                   value="{{ old('shipping_state') }}" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                                   required>
                            @error('shipping_state')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="shipping_postal_code" class="block text-sm font-medium text-gray-700 mb-2">Postal Code</label>
                            <input type="text" id="shipping_postal_code" name="shipping_postal_code" 
                                   value="{{ old('shipping_postal_code') }}" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                                   required>
                            @error('shipping_postal_code')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">Order Notes (Optional)</label>
                        <textarea id="notes" name="notes" rows="3" 
                                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                                  placeholder="Any special instructions for your order...">{{ old('notes') }}</textarea>
                        @error('notes')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <h3 class="text-lg font-semibold mb-2">Payment Method</h3>
                        <div class="bg-gray-50 p-4 rounded-md">
                            <div class="flex items-center">
                                <input type="radio" id="cod" name="payment_method" value="cash_on_delivery" checked class="mr-2">
                                <label for="cod" class="text-sm font-medium">Cash on Delivery</label>
                            </div>
                            <p class="text-sm text-gray-600 mt-1">Pay when your order is delivered to your doorstep.</p>
                        </div>
                    </div>

                    <button type="submit" 
                            class="w-full bg-gray-200 text-black font-bold py-3 px-6 rounded-lg hover:bg-gray-100 transition duration-300">
                        Place Order
                    </button>
                </form>
            </div>

            <!-- Order Summary -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-semibold mb-6">Order Summary</h2>
                
                <div class="space-y-4 mb-6">
                    @foreach($cartItems as $item)
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <img src="{{ $item->product->image ? asset('storage/' . $item->product->image) : 'https://via.placeholder.com/50x50' }}" 
                                     alt="{{ $item->product->name }}" 
                                     class="w-12 h-12 object-cover rounded">
                                <div>
                                    <h4 class="font-medium">{{ $item->product->name }}</h4>
                                    <p class="text-sm text-gray-600">Qty: {{ $item->quantity }}</p>
                                </div>
                            </div>
                            <span class="font-medium">${{ number_format($item->quantity * $item->price, 2) }}</span>
                        </div>
                    @endforeach
                </div>

                <div class="border-t border-gray-200 pt-4">
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span>Subtotal</span>
                            <span>${{ number_format($subtotal, 2) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Shipping</span>
                            <span>${{ number_format($shipping, 2) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Tax (10%)</span>
                            <span>${{ number_format($tax, 2) }}</span>
                        </div>
                        <div class="border-t border-gray-200 pt-2">
                            <div class="flex justify-between font-semibold text-lg">
                                <span>Total</span>
                                <span>${{ number_format($total, 2) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('partials.footer')
</body>

</html>
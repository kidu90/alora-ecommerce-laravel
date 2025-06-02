<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Successful - Alora</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-noto">
    @include('partials.navbar')

    <main class="container mx-auto px-6 py-8">
        <div class="max-w-2xl mx-auto text-center">
            <!-- Success Icon -->
            <div class="mx-auto flex items-center justify-center h-24 w-24 rounded-full bg-green-100 mb-6">
                <svg class="h-12 w-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>

            <h1 class="text-4xl font-bold text-gray-900 mb-4">Order Placed Successfully!</h1>
            <p class="text-lg text-gray-600 mb-8">Thank you for your order. We'll process it shortly and send you a confirmation email.</p>

            <!-- Order Details -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-8 text-left">
                <h2 class="text-2xl font-semibold mb-4">Order Details</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <div>
                        <h3 class="font-medium text-gray-700">Order Number</h3>
                        <p class="text-lg font-semibold">{{ $order->order_number }}</p>
                    </div>
                    <div>
                        <h3 class="font-medium text-gray-700">Order Date</h3>
                        <p>{{ $order->created_at->format('M d, Y \a\t H:i') }}</p>
                    </div>
                    <div>
                        <h3 class="font-medium text-gray-700">Total Amount</h3>
                        <p class="text-lg font-semibold">${{ number_format($order->total_amount, 2) }}</p>
                    </div>
                    <div>
                        <h3 class="font-medium text-gray-700">Payment Method</h3>
                        <p>{{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}</p>
                    </div>
                </div>

                <!-- Order Items -->
                <h3 class="font-medium text-gray-700 mb-3">Items Ordered</h3>
                <div class="space-y-3 mb-6">
                    @foreach($order->orderItems as $item)
                        <div class="flex items-center justify-between border-b border-gray-200 pb-3">
                            <div class="flex items-center space-x-3">
                                <img src="{{ $item->product->image ? asset('storage/' . $item->product->image) : 'https://via.placeholder.com/50x50' }}" 
                                     alt="{{ $item->product_name }}" 
                                     class="w-12 h-12 object-cover rounded">
                                <div>
                                    <p class="font-medium">{{ $item->product_name }}</p>
                                    <p class="text-sm text-gray-600">Qty: {{ $item->quantity }} × ${{ number_format($item->product_price, 2) }}</p>
                                </div>
                            </div>
                            <span class="font-medium">${{ number_format($item->total_price, 2) }}</span>
                        </div>
                    @endforeach
                </div>

                <!-- Shipping Address -->
                <h3 class="font-medium text-gray-700 mb-3">Shipping Address</h3>
                <div class="bg-gray-50 p-4 rounded-md">
                    <p class="font-medium">{{ $order->shipping_name }}</p>
                    <p>{{ $order->shipping_address }}</p>
                    <p>{{ $order->shipping_city }}, {{ $order->shipping_state }} {{ $order->shipping_postal_code }}</p>
                    <p>{{ $order->shipping_country }}</p>
                    <p class="mt-2 text-sm text-gray-600">Phone: {{ $order->shipping_phone }}</p>
                    <p class="text-sm text-gray-600">Email: {{ $order->shipping_email }}</p>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('orders.index') }}" 
                   class="bg-gray-200 text-black px-6 py-3 rounded-lg hover:bg-gray-100 transition duration-300">
                    View All Orders
                </a>
                <a href="{{ route('products') }}" 
                   class="border border-gray-300 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-50 transition duration-300">
                    Continue Shopping
                </a>
            </div>

            <!-- What's Next -->
            <div class="mt-12 text-left bg-blue-50 p-6 rounded-lg">
                <h3 class="text-lg font-semibold text-blue-900 mb-3">What happens next?</h3>
                <ul class="space-y-2 text-blue-800">
                    <li class="flex items-start">
                        <span class="inline-block w-2 h-2 bg-blue-600 rounded-full mt-2 mr-3 flex-shrink-0"></span>
                        You'll receive an order confirmation email shortly
                    </li>
                    <li class="flex items-start">
                        <span class="inline-block w-2 h-2 bg-blue-600 rounded-full mt-2 mr-3 flex-shrink-0"></span>
                        We'll process and pack your order within 1-2 business days
                    </li>
                    <li class="flex items-start">
                        <span class="inline-block w-2 h-2 bg-blue-600 rounded-full mt-2 mr-3 flex-shrink-0"></span>
                        You'll receive tracking information once your order ships
                    </li>
                    <li class="flex items-start">
                        <span class="inline-block w-2 h-2 bg-blue-600 rounded-full mt-2 mr-3 flex-shrink-0"></span>
                        Expected delivery: 3-5 business days
                    </li>
                </ul>
            </div>
        </div>
    </main>

    @include('partials.footer')
</body>

</html>
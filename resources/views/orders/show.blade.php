<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details - Alora</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-noto">
    @include('partials.navbar')

    <main class="container mx-auto px-6 py-8">
        <div class="max-w-4xl mx-auto">
            <!-- Header -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
                <div>
                    <h1 class="text-4xl font-bold text-gray-900">Order #{{ $order->order_number }}</h1>
                    <p class="text-gray-600 mt-2">Placed on {{ $order->created_at->format('M d, Y \a\t H:i') }}</p>
                </div>
                <div class="mt-4 md:mt-0">
                    <span class="px-4 py-2 rounded-full text-sm font-medium
                        @if($order->status === 'pending') bg-yellow-100 text-yellow-800
                        @elseif($order->status === 'processing') bg-blue-100 text-blue-800
                        @elseif($order->status === 'shipped') bg-purple-100 text-purple-800
                        @elseif($order->status === 'delivered') bg-green-100 text-green-800
                        @else bg-red-100 text-red-800
                        @endif">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Order Items -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h2 class="text-2xl font-semibold mb-6">Order Items</h2>
                        
                        <div class="space-y-4">
                            @foreach($order->orderItems as $item)
                                <div class="flex items-center justify-between border-b border-gray-200 pb-4">
                                    <div class="flex items-center space-x-4">
                                        <img src="{{ $item->product->image ? asset('storage/' . $item->product->image) : 'https://via.placeholder.com/80x80' }}" 
                                             alt="{{ $item->product_name }}" 
                                             class="w-20 h-20 object-cover rounded">
                                        <div>
                                            <h3 class="font-semibold">{{ $item->product_name }}</h3>
                                            <p class="text-gray-600">${{ number_format($item->product_price, 2) }} each</p>
                                            <p class="text-sm text-gray-500">Quantity: {{ $item->quantity }}</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-semibold">${{ number_format($item->total_price, 2) }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Order Summary -->
                        <div class="mt-6 pt-6 border-t border-gray-200">
                            <div class="space-y-2">
                                <div class="flex justify-between">
                                    <span>Subtotal</span>
                                    <span>${{ number_format($order->total_amount - $order->tax_amount - $order->shipping_amount, 2) }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span>Shipping</span>
                                    <span>${{ number_format($order->shipping_amount, 2) }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span>Tax</span>
                                    <span>${{ number_format($order->tax_amount, 2) }}</span>
                                </div>
                                <div class="border-t border-gray-200 pt-2">
                                    <div class="flex justify-between font-semibold text-lg">
                                        <span>Total</span>
                                        <span>${{ number_format($order->total_amount, 2) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Info Sidebar -->
                <div class="space-y-6">
                    <!-- Shipping Information -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-lg font-semibold mb-4">Shipping Information</h3>
                        <div class="space-y-2 text-sm">
                            <p class="font-medium">{{ $order->shipping_name }}</p>
                            <p>{{ $order->shipping_address }}</p>
                            <p>{{ $order->shipping_city }}, {{ $order->shipping_state }}</p>
                            <p>{{ $order->shipping_postal_code }}</p>
                            <p>{{ $order->shipping_country }}</p>
                            <div class="mt-3 pt-3 border-t border-gray-200">
                                <p><span class="font-medium">Phone:</span> {{ $order->shipping_phone }}</p>
                                <p><span class="font-medium">Email:</span> {{ $order->shipping_email }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Information -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-lg font-semibold mb-4">Payment Information</h3>
                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600">Method:</span>
                                <span class="text-sm font-medium">{{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600">Status:</span>
                                <span class="text-sm font-medium
                                    @if($order->payment_status === 'pending') text-yellow-600
                                    @elseif($order->payment_status === 'paid') text-green-600
                                    @else text-red-600
                                    @endif">
                                    {{ ucfirst($order->payment_status) }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Order Timeline -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-lg font-semibold mb-4">Order Timeline</h3>
                        <div class="space-y-3">
                            <div class="flex items-center space-x-3">
                                <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                <div>
                                    <p class="text-sm font-medium">Order Placed</p>
                                    <p class="text-xs text-gray-600">{{ $order->created_at->format('M d, Y H:i') }}</p>
                                </div>
                            </div>
                            
                            @if($order->status !== 'pending')
                                <div class="flex items-center space-x-3">
                                    <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
                                    <div>
                                        <p class="text-sm font-medium">Processing</p>
                                        <p class="text-xs text-gray-600">{{ $order->updated_at->format('M d, Y H:i') }}</p>
                                    </div>
                                </div>
                            @endif

                            @if($order->shipped_at)
                                <div class="flex items-center space-x-3">
                                    <div class="w-3 h-3 bg-purple-500 rounded-full"></div>
                                    <div>
                                        <p class="text-sm font-medium">Shipped</p>
                                        <p class="text-xs text-gray-600">{{ $order->shipped_at->format('M d, Y H:i') }}</p>
                                    </div>
                                </div>
                            @endif

                            @if($order->delivered_at)
                                <div class="flex items-center space-x-3">
                                    <div class="w-3 h-3 bg-green-600 rounded-full"></div>
                                    <div>
                                        <p class="text-sm font-medium">Delivered</p>
                                        <p class="text-xs text-gray-600">{{ $order->delivered_at->format('M d, Y H:i') }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    @if($order->notes)
                        <!-- Order Notes -->
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <h3 class="text-lg font-semibold mb-4">Order Notes</h3>
                            <p class="text-sm text-gray-700">{{ $order->notes }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Back Button -->
            <div class="mt-8">
                <a href="{{ route('orders.index') }}" 
                   class="inline-flex items-center text-gray-600 hover:text-gray-800">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Orders
                </a>
            </div>
        </div>
    </main>

    @include('partials.footer')
</body>

</html>
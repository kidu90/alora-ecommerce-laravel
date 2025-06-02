<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders - Alora</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-noto">
    @include('partials.navbar')

    <main class="container mx-auto px-6 py-8">
        <h1 class="text-4xl font-bold text-center mb-8">My Orders</h1>

        @if($orders->count() > 0)
            <div class="space-y-6">
                @foreach($orders as $order)
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
                            <div>
                                <h3 class="text-xl font-semibold">Order #{{ $order->order_number }}</h3>
                                <p class="text-gray-600">Placed on {{ $order->created_at->format('M d, Y') }}</p>
                            </div>
                            <div class="flex items-center space-x-4 mt-2 md:mt-0">
                                <span class="px-3 py-1 rounded-full text-sm font-medium
                                    @if($order->status === 'pending') bg-yellow-100 text-yellow-800
                                    @elseif($order->status === 'processing') bg-blue-100 text-blue-800
                                    @elseif($order->status === 'shipped') bg-purple-100 text-purple-800
                                    @elseif($order->status === 'delivered') bg-green-100 text-green-800
                                    @else bg-red-100 text-red-800
                                    @endif">
                                    {{ ucfirst($order->status) }}
                                </span>
                                <span class="text-lg font-semibold">${{ number_format($order->total_amount, 2) }}</span>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <h4 class="font-medium mb-2">Items Ordered:</h4>
                                <div class="space-y-2">
                                    @foreach($order->orderItems->take(3) as $item)
                                        <div class="flex items-center space-x-3">
                                            <img src="{{ $item->product->image ? asset('storage/' . $item->product->image) : 'https://via.placeholder.com/40x40' }}" 
                                                 alt="{{ $item->product_name }}" 
                                                 class="w-10 h-10 object-cover rounded">
                                            <div class="flex-1">
                                                <p class="text-sm font-medium">{{ $item->product_name }}</p>
                                                <p class="text-xs text-gray-600">Qty: {{ $item->quantity }} × ${{ number_format($item->product_price, 2) }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                    @if($order->orderItems->count() > 3)
                                        <p class="text-sm text-gray-600">+{{ $order->orderItems->count() - 3 }} more items</p>
                                    @endif
                                </div>
                            </div>

                            <div>
                                <h4 class="font-medium mb-2">Shipping Address:</h4>
                                <div class="text-sm text-gray-600">
                                    <p>{{ $order->shipping_name }}</p>
                                    <p>{{ $order->shipping_address }}</p>
                                    <p>{{ $order->shipping_city }}, {{ $order->shipping_state }} {{ $order->shipping_postal_code }}</p>
                                    <p>{{ $order->shipping_country }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <a href="{{ route('orders.show', $order->id) }}" 
                               class="bg-gray-200 text-black px-4 py-2 rounded-lg hover:bg-gray-100 transition duration-300">
                                View Details
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $orders->links() }}
            </div>
        @else
            <div class="text-center py-16">
                <svg class="mx-auto h-24 w-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                </svg>
                <h3 class="mt-4 text-lg font-medium text-gray-900">No orders yet</h3>
                <p class="mt-2 text-gray-500">Start shopping to see your orders here.</p>
                <a href="{{ route('products') }}" 
                   class="mt-6 inline-block bg-gray-200 text-black px-6 py-3 rounded-lg hover:bg-gray-100 transition duration-300">
                    Start Shopping
                </a>
            </div>
        @endif
    </main>

    @include('partials.footer')
</body>

</html>
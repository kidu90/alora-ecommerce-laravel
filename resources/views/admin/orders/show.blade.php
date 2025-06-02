<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details - Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
    <div class="flex h-screen overflow-hidden">
        @include('admin.partials.sidebar')

        <div class="flex-1 flex flex-col overflow-hidden">
            @include('admin.partials.header')

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
                <div class="container mx-auto px-6 py-8">
                    <!-- Header -->
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-gray-800">Order #{{ $order->order_number }}</h2>
                        <a href="{{ route('admin.orders.index') }}" 
                           class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Back to Orders
                        </a>
                    </div>

                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <!-- Order Details -->
                        <div class="lg:col-span-2 space-y-6">
                            <!-- Order Items -->
                            <div class="bg-white rounded-lg shadow-md p-6">
                                <h3 class="text-lg font-semibold mb-4">Order Items</h3>
                                <div class="space-y-4">
                                    @foreach($order->orderItems as $item)
                                        <div class="flex items-center justify-between border-b border-gray-200 pb-4">
                                            <div class="flex items-center space-x-4">
                                                <img src="{{ $item->product->image ? asset('storage/' . $item->product->image) : 'https://via.placeholder.com/60x60' }}" 
                                                     alt="{{ $item->product_name }}" 
                                                     class="w-15 h-15 object-cover rounded">
                                                <div>
                                                    <h4 class="font-medium">{{ $item->product_name }}</h4>
                                                    <p class="text-sm text-gray-600">${{ number_format($item->product_price, 2) }} × {{ $item->quantity }}</p>
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

                            <!-- Customer Information -->
                            <div class="bg-white rounded-lg shadow-md p-6">
                                <h3 class="text-lg font-semibold mb-4">Customer Information</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <h4 class="font-medium text-gray-700">Customer Details</h4>
                                        <p class="mt-1">{{ $order->user->name }}</p>
                                        <p>{{ $order->user->email }}</p>
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-gray-700">Shipping Address</h4>
                                        <div class="mt-1 text-sm">
                                            <p>{{ $order->shipping_name }}</p>
                                            <p>{{ $order->shipping_address }}</p>
                                            <p>{{ $order->shipping_city }}, {{ $order->shipping_state }}</p>
                                            <p>{{ $order->shipping_postal_code }}</p>
                                            <p>{{ $order->shipping_country }}</p>
                                            <p class="mt-2">Phone: {{ $order->shipping_phone }}</p>
                                        </div>
                                    </div>
                                </div>
                                @if($order->notes)
                                    <div class="mt-4">
                                        <h4 class="font-medium text-gray-700">Order Notes</h4>
                                        <p class="mt-1 text-sm text-gray-600">{{ $order->notes }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Order Status & Actions -->
                        <div class="space-y-6">
                            <!-- Status Update -->
                            <div class="bg-white rounded-lg shadow-md p-6">
                                <h3 class="text-lg font-semibold mb-4">Update Status</h3>
                                <form action="{{ route('admin.orders.update-status', $order) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    
                                    <div class="mb-4">
                                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Order Status</label>
                                        <select name="status" id="status" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                            <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>Processing</option>
                                            <option value="shipped" {{ $order->status === 'shipped' ? 'selected' : '' }}>Shipped</option>
                                            <option value="delivered" {{ $order->status === 'delivered' ? 'selected' : '' }}>Delivered</option>
                                            <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                        </select>
                                    </div>
                                    
                                    <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Update Status
                                    </button>
                                </form>
                            </div>

                            <!-- Order Information -->
                            <div class="bg-white rounded-lg shadow-md p-6">
                                <h3 class="text-lg font-semibold mb-4">Order Information</h3>
                                <div class="space-y-3">
                                    <div>
                                        <span class="text-sm text-gray-600">Order Date:</span>
                                        <p class="font-medium">{{ $order->created_at->format('M d, Y H:i') }}</p>
                                    </div>
                                    <div>
                                        <span class="text-sm text-gray-600">Payment Method:</span>
                                        <p class="font-medium">{{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}</p>
                                    </div>
                                    <div>
                                        <span class="text-sm text-gray-600">Payment Status:</span>
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full
                                            @if($order->payment_status === 'pending') bg-yellow-100 text-yellow-800
                                            @elseif($order->payment_status === 'paid') bg-green-100 text-green-800
                                            @else bg-red-100 text-red-800
                                            @endif">
                                            {{ ucfirst($order->payment_status) }}
                                        </span>
                                    </div>
                                    @if($order->shipped_at)
                                        <div>
                                            <span class="text-sm text-gray-600">Shipped At:</span>
                                            <p class="font-medium">{{ $order->shipped_at->format('M d, Y H:i') }}</p>
                                        </div>
                                    @endif
                                    @if($order->delivered_at)
                                        <div>
                                            <span class="text-sm text-gray-600">Delivered At:</span>
                                            <p class="font-medium">{{ $order->delivered_at->format('M d, Y H:i') }}</p>
                                        </div>
                                    @endif
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
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
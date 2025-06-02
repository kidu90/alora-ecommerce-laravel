<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders - Admin</title>
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
                        <h2 class="text-2xl font-bold text-gray-800">Order Management</h2>
                    </div>

                    <!-- Filters -->
                    <div class="bg-white p-4 rounded-lg shadow-md mb-6">
                        <form method="GET" action="{{ route('admin.orders.index') }}" class="flex flex-wrap gap-4 items-center">
                            <!-- Status Filter -->
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                                <select name="status" id="status" class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="">All Status</option>
                                    <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="processing" {{ request('status') === 'processing' ? 'selected' : '' }}>Processing</option>
                                    <option value="shipped" {{ request('status') === 'shipped' ? 'selected' : '' }}>Shipped</option>
                                    <option value="delivered" {{ request('status') === 'delivered' ? 'selected' : '' }}>Delivered</option>
                                    <option value="cancelled" {{ request('status') === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </div>

                            <!-- Search -->
                            <div>
                                <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                                <input type="text" 
                                       name="search" 
                                       id="search" 
                                       value="{{ request('search') }}"
                                       placeholder="Order number or customer name..."
                                       class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div class="flex space-x-2 mt-6">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Filter
                                </button>
                                <a href="{{ route('admin.orders.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                    Clear
                                </a>
                            </div>
                        </form>
                    </div>

                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Orders Table -->
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order Details</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($orders as $order)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">{{ $order->order_number }}</div>
                                                <div class="text-sm text-gray-500">{{ $order->orderItems->count() }} item(s)</div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">{{ $order->user->name }}</div>
                                                <div class="text-sm text-gray-500">{{ $order->user->email }}</div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            ${{ number_format($order->total_amount, 2) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                @if($order->status === 'pending') bg-yellow-100 text-yellow-800
                                                @elseif($order->status === 'processing') bg-blue-100 text-blue-800
                                                @elseif($order->status === 'shipped') bg-purple-100 text-purple-800
                                                @elseif($order->status === 'delivered') bg-green-100 text-green-800
                                                @else bg-red-100 text-red-800
                                                @endif">
                                                {{ ucfirst($order->status) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $order->created_at->format('M d, Y') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                            <a href="{{ route('admin.orders.show', $order) }}" 
                                               class="text-blue-600 hover:text-blue-900">View</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                            No orders found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-6">
                        {{ $orders->appends(request()->query())->links() }}
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
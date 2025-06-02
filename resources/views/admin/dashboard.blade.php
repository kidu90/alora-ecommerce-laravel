<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Alora</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
    <div class="flex h-screen overflow-hidden">
        @include('admin.partials.sidebar')

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            @include('admin.partials.header')

            <!-- Dashboard Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
                <div class="container mx-auto px-6 py-8">
                    <h2 class="text-3xl font-bold text-gray-800 mb-8">Dashboard Overview</h2>

                    <!-- Stats Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-blue-500 text-white">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-semibold text-gray-700">Total Revenue</h3>
                                    <p class="text-2xl font-bold text-gray-900">${{ number_format($totalRevenue, 2) }}</p>
                                    <p class="text-sm text-gray-500">This month: ${{ number_format($monthlyRevenue, 2) }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-lg shadow-md p-6">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-green-500 text-white">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-semibold text-gray-700">Total Orders</h3>
                                    <p class="text-2xl font-bold text-gray-900">{{ $totalOrders }}</p>
                                    <p class="text-sm text-gray-500">{{ $pendingOrders }} pending</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-lg shadow-md p-6">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-purple-500 text-white">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-semibold text-gray-700">Products</h3>
                                    <p class="text-2xl font-bold text-gray-900">{{ $totalProducts }}</p>
                                    <p class="text-sm text-gray-500">{{ $lowStockProducts }} low stock</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-lg shadow-md p-6">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-orange-500 text-white">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-semibold text-gray-700">Customers</h3>
                                    <p class="text-2xl font-bold text-gray-900">{{ $totalCustomers }}</p>
                                    <p class="text-sm text-gray-500">Registered users</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Quick Actions</h3>
                            <div class="space-y-3">
                                <a href="{{ route('admin.products.create') }}" class="block w-full bg-blue-500 text-white text-center py-2 rounded hover:bg-blue-600 transition">
                                    Add New Product
                                </a>
                                <a href="{{ route('admin.categories.create') }}" class="block w-full bg-green-500 text-white text-center py-2 rounded hover:bg-green-600 transition">
                                    Add New Category
                                </a>
                                <a href="{{ route('admin.orders.index', ['status' => 'pending']) }}" class="block w-full bg-orange-500 text-white text-center py-2 rounded hover:bg-orange-600 transition">
                                    View Pending Orders
                                </a>
                            </div>
                        </div>

                        <div class="lg:col-span-2 bg-white rounded-lg shadow-md p-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Recent Orders</h3>
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Order</th>
                                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Customer</th>
                                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Amount</th>
                                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @forelse($recentOrders as $order)
                                            <tr>
                                                <td class="px-4 py-2 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    {{ $order->order_number }}
                                                </td>
                                                <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-600">
                                                    {{ $order->user->name }}
                                                </td>
                                                <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900">
                                                    ${{ number_format($order->total_amount, 2) }}
                                                </td>
                                                <td class="px-4 py-2 whitespace-nowrap">
                                                    <span class="px-2 py-1 text-xs font-semibold rounded-full
                                                        @if($order->status === 'pending') bg-yellow-100 text-yellow-800
                                                        @elseif($order->status === 'processing') bg-blue-100 text-blue-800
                                                        @elseif($order->status === 'shipped') bg-purple-100 text-purple-800
                                                        @elseif($order->status === 'delivered') bg-green-100 text-green-800
                                                        @else bg-red-100 text-red-800
                                                        @endif">
                                                        {{ ucfirst($order->status) }}
                                                    </span>
                                                </td>
                                                <td class="px-4 py-2 whitespace-nowrap text-sm font-medium">
                                                    <a href="{{ route('admin.orders.show', $order) }}" class="text-blue-600 hover:text-blue-800">View</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="px-4 py-4 text-center text-gray-500">No orders yet</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Alerts -->
                    @if($lowStockProducts > 0)
                        <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-6">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-red-800">Low Stock Alert</h3>
                                    <p class="text-sm text-red-700 mt-1">{{ $lowStockProducts }} product(s) are running low on stock.</p>
                                    <a href="{{ route('admin.products.index') }}" class="text-sm text-red-700 underline hover:text-red-800">View Products</a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </main>
        </div>
    </div>
</body>

</html>
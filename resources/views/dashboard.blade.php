<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100 text-gray-900">
    @include('partials.navbar')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <div class="py-6 bg-gray-50 min-h-screen">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Welcome Section -->
                <div class="mb-8">
                    <h1 class="text-2xl font-semibold text-gray-900">Welcome back, {{ auth()->user()->name }}!</h1>
                    <p class="text-gray-600">Here's what's happening with your account today.</p>
                </div>

                <!-- Statistics Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-blue-500 rounded-lg p-3">
                                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">
                                            Total Spent
                                        </dt>
                                        <dd class="text-xl font-semibold text-gray-900">
                                            ${{ number_format(auth()->user()->orders()->sum('total_amount'), 2) }}
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-emerald-500 rounded-lg p-3">
                                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                                    </svg>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">
                                            Total Orders
                                        </dt>
                                        <dd class="text-xl font-semibold text-gray-900">
                                            {{ auth()->user()->orders()->count() }}
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-purple-500 rounded-lg p-3">
                                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                                    </svg>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">
                                            Cart Items
                                        </dt>
                                        <dd class="text-xl font-semibold text-gray-900">
                                            {{ auth()->user()->carts()->sum('quantity') }}
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-amber-500 rounded-lg p-3">
                                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">
                                            Pending Orders
                                        </dt>
                                        <dd class="text-xl font-semibold text-gray-900">
                                            {{ auth()->user()->orders()->whereIn('status', ['pending', 'processing'])->count() }}
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Order History -->
                <div class="bg-white shadow-sm rounded-lg border border-gray-200 mb-8">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900">Recent Order History</h3>
                    </div>
                    <div class="overflow-x-auto">
                        @php
                            $recentOrders = auth()->user()->orders()->latest()->take(5)->get();
                        @endphp
                        
                        @if($recentOrders->count() > 0)
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order Number</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Items</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($recentOrders as $order)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $order->order_number }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $order->created_at->format('M d, Y') }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $order->orderItems->count() }} items</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${{ number_format($order->total_amount, 2) }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                    @if($order->status === 'pending') bg-yellow-100 text-yellow-800
                                                    @elseif($order->status === 'processing') bg-blue-100 text-blue-800
                                                    @elseif($order->status === 'shipped') bg-purple-100 text-purple-800
                                                    @elseif($order->status === 'delivered') bg-emerald-100 text-emerald-800
                                                    @else bg-red-100 text-red-800
                                                    @endif">
                                                    {{ ucfirst($order->status) }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <a href="{{ route('orders.show', $order->id) }}" class="text-blue-600 hover:text-blue-800 font-medium">View Details</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="px-6 py-8 text-center">
                                <p class="text-gray-500">No orders yet. <a href="{{ route('products') }}" class="text-blue-600 hover:text-blue-800">Start shopping!</a></p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <a href="{{ route('products') }}" class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="h-8 w-8 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l-1 12H6L5 9z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900">Shop Products</h3>
                                <p class="text-gray-600">Browse our beauty collection</p>
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('cart.index') }}" class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="h-8 w-8 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m-2.4 0h2.4M7 13L5.4 5H3m4 8v6a2 2 0 002 2h8a2 2 0 002-2v-6m-8 0v6a2 2 0 002 2h4a2 2 0 002-2v-6"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900">View Cart</h3>
                                <p class="text-gray-600">Review your selected items</p>
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('orders.index') }}" class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="h-8 w-8 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900">Order History</h3>
                                <p class="text-gray-600">Track your past purchases</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </x-app-layout>

    @include('partials.footer')
</body>

</html>
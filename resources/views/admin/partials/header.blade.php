<!-- Header -->
<header class="bg-white shadow-sm border-b border-gray-200">
    <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-semibold text-gray-900">
                @if(request()->routeIs('admin.dashboard'))
                    Dashboard
                @elseif(request()->routeIs('admin.products.*'))
                    Product Management
                @elseif(request()->routeIs('admin.categories.*'))
                    Category Management
                @elseif(request()->routeIs('admin.orders.*'))
                    Order Management
                @else
                    Admin Panel
                @endif
            </h1>
        </div>
        
        <div class="flex items-center space-x-4">
            <!-- Notifications -->
            <div class="relative">
                <button class="p-2 text-gray-400 hover:text-gray-600 focus:outline-none focus:text-gray-600">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                    </svg>
                    @php
                        $pendingOrdersCount = \App\Models\Order::where('status', 'pending')->count();
                    @endphp
                    @if($pendingOrdersCount > 0)
                        <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-400"></span>
                    @endif
                </button>
            </div>

            <!-- User Info -->
            <div class="flex items-center space-x-3">
                <div class="text-right">
                    <p class="text-sm font-medium text-gray-900">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-gray-500">Administrator</p>
                </div>
                <div class="h-8 w-8 rounded-full bg-gray-300 flex items-center justify-center">
                    <span class="text-sm font-medium text-gray-700">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</header>
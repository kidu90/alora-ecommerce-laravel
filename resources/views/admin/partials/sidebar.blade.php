<!-- Sidebar -->
<aside class="w-64 bg-gray-800 text-white min-h-screen">
    <div class="p-4 border-b border-gray-700">
        <h1 class="text-2xl font-bold">Alora Admin</h1>
    </div>
    <nav class="mt-4">
        <a href="{{ route('admin.dashboard') }}" 
           class="block px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700 text-white' : '' }}">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Dashboard
            </div>
        </a>

        <a href="{{ route('admin.products.index') }}" 
           class="block px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200 {{ request()->routeIs('admin.products.*') ? 'bg-gray-700 text-white' : '' }}">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                </svg>
                Products
            </div>
        </a>

        <a href="{{ route('admin.categories.index') }}" 
           class="block px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200 {{ request()->routeIs('admin.categories.*') ? 'bg-gray-700 text-white' : '' }}">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                </svg>
                Categories
            </div>
        </a>

        <a href="{{ route('admin.orders.index') }}" 
           class="block px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200 {{ request()->routeIs('admin.orders.*') ? 'bg-gray-700 text-white' : '' }}">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                </svg>
                Orders
            </div>
        </a>

        <a href="{{ route('welcome') }}" 
           class="block px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
                View Website
            </div>
        </a>

        <!-- User Actions -->
        <div class="mt-8 pt-4 border-t border-gray-700">
            <div class="px-4 py-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">
                Account
            </div>
            
            <a href="{{ route('dashboard') }}" 
               class="block px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    My Profile
                </div>
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full text-left block px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Logout
                    </div>
                </button>
            </form>
        </div>
    </nav>
</aside>
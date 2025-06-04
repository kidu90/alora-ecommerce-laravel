<header class="bg-white shadow-sm">
    <nav class="container mx-auto px-4 py-4 flex justify-between items-center">
        <!-- Logo -->
        <a href="{{ route('welcome') }}" class="text-2xl font-secondary font-bold">Alora</a>

        <!-- Hamburger Button (Mobile) -->
        <button id="mobile-menu-button" class="md:hidden text-gray-700 focus:outline-none">
            <svg id="hamburger-icon" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                <path id="icon-path" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>

        <!-- Desktop Menu -->
        <ul class="hidden md:flex space-x-8 items-center">
            <li><a href="{{ route('welcome') }}" class="hover:text-gray-600">Home</a></li>
            <li><a href="{{ route('about') }}" class="hover:text-gray-600">About</a></li>
            <li><a href="{{ route('products') }}" class="hover:text-gray-600">Shop</a></li>
            <li><a href="{{ route('contact') }}" class="hover:text-gray-600">Contact</a></li>
        </ul>

        <!-- Cart & Auth Buttons -->
        <div class="hidden md:flex items-center space-x-4">
            <div class="relative">
                <a href="{{ route('cart.index') }}" class="relative">
                    <svg class="w-6 h-6 text-gray-700 hover:text-gray-900" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M16 11V7a4 4 0 00-8 0v4M5 9h14l-1 12H6L5 9z"/>
                    </svg>
                    <span id="cart-count"
                          class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">0</span>
                </a>
            </div>

            @if (Route::has('login'))
                @auth
                    <a href="{{ route('orders.index') }}"
                       class="bg-gray-200 text-black px-3 py-1.5 text-sm rounded-lg hover:bg-gray-100">
                        Orders
                    </a>
                    <a href="{{ url('/dashboard') }}"
                       class="bg-gray-200 text-black px-3 py-1.5 text-sm rounded-lg hover:bg-gray-100">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="bg-gray-200 text-black px-3 py-1.5 text-sm rounded-lg hover:bg-gray-100">
                        Login
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="border border-gray-300 text-black px-3 py-1.5 text-sm rounded-lg hover:bg-gray-100">
                            Register
                        </a>
                    @endif
                @endauth
            @endif
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden px-4 pb-4">
        <ul class="space-y-4">
            <li><a href="{{ route('welcome') }}" class="block text-gray-700 hover:text-gray-900">Home</a></li>
            <li><a href="{{ route('about') }}" class="block text-gray-700 hover:text-gray-900">About</a></li>
            <li><a href="{{ route('products') }}" class="block text-gray-700 hover:text-gray-900">Shop</a></li>
            <li><a href="{{ route('contact') }}" class="block text-gray-700 hover:text-gray-900">Contact</a></li>

            <div class="mt-4 space-y-2">
                <a href="{{ route('cart.index') }}" class="flex items-center space-x-2 text-gray-700 hover:text-gray-900">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M16 11V7a4 4 0 00-8 0v4M5 9h14l-1 12H6L5 9z"/>
                    </svg>
                    <span>Cart (<span id="cart-count-mobile">0</span>)</span>
                </a>

                @if (Route::has('login'))
                    @auth
                        <a href="{{ route('orders.index') }}"
                           class="block bg-gray-200 text-black px-3 py-1.5 text-sm rounded-lg hover:bg-gray-100">
                            Orders
                        </a>
                        <a href="{{ url('/dashboard') }}"
                           class="block bg-gray-200 text-black px-3 py-1.5 text-sm rounded-lg hover:bg-gray-100">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                           class="block bg-gray-200 text-black px-3 py-1.5 text-sm rounded-lg hover:bg-gray-100">
                            Login
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                               class="block border border-gray-300 text-black px-3 py-1.5 text-sm rounded-lg hover:bg-gray-100">
                                Register
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </ul>
    </div>

    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const menuBtn = document.getElementById('mobile-menu-button');
            const menu = document.getElementById('mobile-menu');
            const iconPath = document.getElementById('icon-path');

            menuBtn.addEventListener('click', () => {
                const isHidden = menu.classList.contains('hidden');
                menu.classList.toggle('hidden');

                // Toggle icon between hamburger and X
                iconPath.setAttribute('d',
                    isHidden
                        ? 'M6 18L18 6M6 6l12 12' // X icon
                        : 'M4 6h16M4 12h16M4 18h16' // Hamburger icon
                );
            });

            function updateCartCount() {
                fetch('/cart/count')
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('cart-count').textContent = data.count;
                        const mobileCart = document.getElementById('cart-count-mobile');
                        if (mobileCart) mobileCart.textContent = data.count;
                    })
                    .catch(error => console.error('Error fetching cart count:', error));
            }

            updateCartCount();
            setInterval(updateCartCount, 30000);
        });
    </script>
</header>

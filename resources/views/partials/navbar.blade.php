<header class="bg-white shadow-sm">
    <nav class="container mx-auto px-4 py-3 flex justify-between items-center">
        <a href="{{ route('welcome') }}" class="text-2xl font-secondary font-bold">Alora</a>
        
        <ul class="flex space-x-8">
            <li><a href="{{ route('about') }}" class="hover:text-gray-600">About</a></li>
            <li><a href="{{ route('products') }}" class="hover:text-gray-600">Shop</a></li>
            <li><a href="{{ route('contact') }}" class="hover:text-gray-600">Contact</a></li>
            <li><a href="{{ route('subscription') }}" class="hover:text-gray-600">Subscription</a></li>
        </ul>

        <div class="flex items-center">
            <div class="relative">
                <a href="{{ route('cart.index') }}" class="relative">
                    <svg class="w-6 h-6 text-gray-700 hover:text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l-1 12H6L5 9z"></path>
                    </svg>
                    <span id="cart-count" class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">0</span>
                </a>
            </div>

            <div class="ml-4 flex items-center space-x-2">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ route('orders.index') }}"
                           class="bg-gray-200 text-black px-3 py-1.5 text-sm rounded-lg hover:bg-gray-100 w-full sm:w-auto">
                            Orders
                        </a>
                        <a href="{{ url('/dashboard') }}"
                           class="bg-gray-200 text-black px-3 py-1.5 text-sm rounded-lg hover:bg-gray-100 w-full sm:w-auto">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                           class="bg-gray-200 text-black px-3 py-1.5 text-sm rounded-lg hover:bg-gray-100 w-full sm:w-auto">
                            Login
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                               class="border border-gray-300 text-black px-3 py-1.5 text-sm rounded-lg hover:bg-gray-100 w-full sm:w-auto">
                                Register
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            updateCartCount();
        });

        function updateCartCount() {
            fetch('/cart/count')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('cart-count').textContent = data.count;
                })
                .catch(error => console.error('Error fetching cart count:', error));
        }

        setInterval(updateCartCount, 30000);
    </script>
</header>

<header class="bg-white shadow-sm">
    <nav class="container mx-auto px-4 py-3 flex justify-between items-center">
        <a href="{{ route('welcome') }}" class="text-2xl font-secondary font-bold">Alora</a>
        <ul class="flex space-x-8">
            <li><a href="index.php?route=about" class="hover:text-gray-600">About</a></li>
            <li><a href="index.php?route=shop" class="hover:text-gray-600">Shop</a></li>
            <li><a href="index.php?route=contact" class="hover:text-gray-600">Contact</a></li>
            <li><a href="index.php?route=subscription" class="hover:text-gray-600">Subscription</a></li>
        </ul>
        <div class="flex items-center space-x-4">
            @if (Route::has('login'))
            @auth
            <a href="{{ url('/dashboard') }}" class="text-gray-700 hover:text-gray-900">Dashboard</a>
            @else
            <a href="{{ route('login') }}" class="text-gray-700 hover:text-gray-900">Login</a>

            @endauth
            @endif

        </div>
    </nav>

</header>
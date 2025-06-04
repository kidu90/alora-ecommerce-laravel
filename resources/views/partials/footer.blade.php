<footer class="bg-gray-100 text-black py-8">
    <div class="container mx-auto px-8 py-12">
        <div class="flex flex-wrap justify-between">
            <div class="w-full md:w-1/4 mb-4 md:mb-0">
                <h2 class="text-3xl font-bold font-secondary mb-4">Alora</h2>
                <div class="flex items-center gap-x-4">
                    <a href="#" class="hover:opacity-70 transition">
                        <img src="{{ asset('images/facebook-svgrepo-com (1).svg') }}" alt="Facebook Icon" class="w-6 h-6">
                    </a>
                    <a href="#" class="hover:opacity-70 transition">
                        <img src="{{ asset('images/instagram-167-svgrepo-com.svg') }}" alt="Instagram Icon" class="w-6 h-6">
                    </a>
                    <a href="#" class="hover:opacity-70 transition">
                        <img src="{{ asset('images/twitter-154-svgrepo-com.svg') }}" alt="Twitter Icon" class="w-6 h-6">
                    </a>
                </div>
            </div>

            <div class="w-full md:w-1/4 mb-4 md:mb-0">
                <h3 class="text-lg font-semibold mb-2">Company</h3>
                <ul>
                    <li><a href="{{ route('welcome') }}" class="hover:text-gray-300">Shop</a></li>
                    <li><a href="{{ route('welcome') }}" class="hover:text-gray-300">About us</a></li>
                    <li><a href="#" class="hover:text-gray-300">Privacy and Policy</a></li>
                </ul>
            </div>
            <div class="w-full md:w-1/4 mb-4 md:mb-0">
                <h3 class="text-lg font-semibold mb-2">Information</h3>
                <ul>
                    <li><a href="{{ route('welcome') }}" class="hover:text-gray-300">Home</a></li>
                    <li><a href="#" class="hover:text-gray-300">FAQ</a></li>
                    <li><a href="{{ route('welcome') }}" class="hover:text-gray-300">Contact</a></li>
                </ul>
            </div>
            <div class="w-full md:w-1/4 mb-4 md:mb-0">
                <h3 class="text-lg font-semibold mb-2">Subscription</h3>
                <ul>
                    <li><a href="{{ route('subscription') }}" class="hover:text-gray-300">Subscription</a></li>
                    <li><a href="{{ route('welcome') }}" class="hover:text-gray-300">Profile</a></li>
                    <li><a href="#" class="hover:text-gray-300">Cart</a></li>
                </ul>
            </div>

        </div>
        <div class="border-t border-gray-300 mt-8 pt-8 text-sm text-center">
            <p>&copy; 2025 Alora. All rights reserved.</p>
        </div>
    </div>
</footer>
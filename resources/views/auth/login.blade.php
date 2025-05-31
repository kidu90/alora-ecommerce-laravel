<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-noto">

    @include('partials.navbar')
    <x-guest-layout>
        <div class=" min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-md w-full space-y-8">
                <div class="bg-white shadow-lg rounded-lg p-8">
                    <!-- Logo Section -->
                    <div class="text-center mb-8">
                        <x-authentication-card-logo class="mx-auto h-12 w-auto" />
                        <h2 class="mt-6 text-3xl font-semibold text-gray-900">
                            Welcome to Alora
                        </h2>
                        <p class="mt-2 text-sm text-gray-600">
                            Sign in to your account
                        </p>
                    </div>

                    <!-- Validation Errors -->
                    <x-validation-errors class="mb-6 p-4 bg-red-50 border border-red-200 rounded-md" />

                    <!-- Status Message -->
                    @session('status')
                    <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-md">
                        <div class="font-medium text-sm text-green-600 dark:text-green-400">
                            {{ $value }}
                        </div>
                    </div>
                    @endsession

                    <!-- Login Form -->
                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                        <!-- Email Field -->
                        <div>
                            <x-label for="email" value="{{ __('Email') }}" class="block text-sm font-medium text-gray-900 mb-2" />
                            <x-input id="email"
                                class="block w-full px-3 py-2 border border-gray-400 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                type="email"
                                name="email"
                                :value="old('email')"
                                required
                                autofocus
                                autocomplete="username"
                                placeholder="Enter your email" />
                        </div>

                        <!-- Password Field -->
                        <div>
                            <x-label for="password" value="{{ __('Password') }}" class="block text-sm font-medium text-gray-700 mb-2" />
                            <x-input id="password"
                                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                type="password"
                                name="password"
                                required
                                autocomplete="current-password"
                                placeholder="Enter your password" />
                        </div>

                        <!-- Remember Me -->
                        <div class="flex items-center">
                            <x-checkbox id="remember_me"
                                name="remember"
                                class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" />
                            <label for="remember_me" class="ml-2 block text-sm text-gray-700">
                                {{ __('Remember me') }}
                            </label>
                        </div>

                        <!-- Submit Button and Forgot Password -->
                        <div class="flex items-center justify-between">
                            @if (Route::has('password.request'))
                            <a class="text-sm text-indigo-600 hover:text-indigo-500 font-medium"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                            @endif

                            <x-button class="ml-auto bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 text-white font-medium py-2 px-6 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 transition duration-150 ease-in-out">
                                {{ __('Log in') }}
                            </x-button>
                        </div>
                    </form>

                    <!-- Additional Links -->
                    <div class="mt-6 text-center">
                        <p class="text-sm text-gray-600">
                            Don't have an account?
                            <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                                Sign up
                            </a>
                        </p>
                    </div>
                </div>

                <!-- Footer -->

            </div>
        </div>
    </x-guest-layout>

    @include('partials.footer')

</body>

</html>
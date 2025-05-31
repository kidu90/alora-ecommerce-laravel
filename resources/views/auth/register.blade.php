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
        <div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-md w-full space-y-8">
                <div class="bg-white shadow-lg rounded-lg p-8">
                    <!-- Logo Section -->
                    <div class="text-center mb-8">
                        <x-authentication-card-logo class="mx-auto h-12 w-auto" />
                        <h2 class="mt-6 text-3xl font-semibold text-gray-900">
                            Create your account
                        </h2>
                        <p class="mt-2 text-sm text-gray-600">
                            Join Alora today
                        </p>
                    </div>

                    <!-- Validation Errors -->
                    <x-validation-errors class="mb-6 p-4 bg-red-50 border border-red-200 rounded-md" />

                    <!-- Registration Form -->
                    <form method="POST" action="{{ route('register') }}" class="space-y-6">
                        @csrf

                        <!-- Name Field -->
                        <div>
                            <x-label for="name" value="{{ __('Name') }}" class="block text-sm font-medium text-gray-700 mb-2" />
                            <x-input id="name"
                                class="block w-full px-3 py-2 border border-gray-200 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                type="text"
                                name="name"
                                :value="old('name')"
                                required
                                autofocus
                                autocomplete="name"
                                placeholder="Enter your full name" />
                        </div>

                        <!-- Email Field -->
                        <div>
                            <x-label for="email" value="{{ __('Email') }}" class="block text-sm font-medium text-gray-700 mb-2" />
                            <x-input id="email"
                                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                type="email"
                                name="email"
                                :value="old('email')"
                                required
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
                                autocomplete="new-password"
                                placeholder="Create a password" />
                        </div>

                        <!-- Confirm Password Field -->
                        <div>
                            <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="block text-sm font-medium text-gray-700 mb-2" />
                            <x-input id="password_confirmation"
                                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                type="password"
                                name="password_confirmation"
                                required
                                autocomplete="new-password"
                                placeholder="Confirm your password" />
                        </div>

                        <!-- Terms and Privacy Policy -->
                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <x-checkbox name="terms"
                                    id="terms"
                                    required
                                    class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" />
                            </div>
                            <div class="ml-3 text-sm">
                                <x-label for="terms" class="text-gray-700">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="font-medium text-indigo-600 hover:text-indigo-500">'.__('Terms of Service').'</a>',
                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="font-medium text-indigo-600 hover:text-indigo-500">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                                </x-label>
                            </div>
                        </div>
                        @endif

                        <!-- Submit Button and Login Link -->
                        <div class="flex items-center justify-between">
                            <a class="text-sm text-indigo-600 hover:text-indigo-500 font-medium"
                                href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>

                            <x-button class="ml-auto bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 text-white font-medium py-2 px-6 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 transition duration-150 ease-in-out">
                                {{ __('Register') }}
                            </x-button>
                        </div>
                    </form>

                    <!-- Additional Links -->
                    <div class="mt-6 text-center">
                        <p class="text-sm text-gray-600">
                            Already have an account?
                            <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                                Sign in
                            </a>
                        </p>
                    </div>
                </div>

            </div>

    </x-guest-layout>

    @include('partials.footer')
</body>

</html>
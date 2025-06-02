<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - View</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body >
    <div class="max-w-4xl mx-auto mt-10 bg-white shadow-md rounded-lg p-8">
        <!-- Product Title -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800">{{ $product->name }}</h1>
            <p class="text-sm text-gray-500">Category: {{ $product->category->name }}</p>
        </div>
    
        <!-- Product Info Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Left Column -->
            <div class="space-y-4">
                <div>
                    <p class="text-gray-600 font-medium">Price:</p>
                    <p class="text-lg font-semibold text-blue-600">${{ number_format($product->price, 2) }}</p>
                </div>
    
                <div>
                    <p class="text-gray-600 font-medium">Stock:</p>
                    <p class="text-lg font-semibold {{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }}">
                        {{ $product->stock > 0 ? 'Available' : 'Out of Stock' }}
                        <span class="text-gray-500 text-sm">({{ $product->stock }} items)</span>
                    </p>
                </div>
    
                @if($product->ingredients)
                    <div>
                        <p class="text-gray-600 font-medium">Ingredients:</p>
                        <p class="text-gray-800">{{ $product->ingredients }}</p>
                    </div>
                @endif
            </div>
    
            <!-- Right Column -->
            <div class="space-y-4">
                @if($product->description)
                    <div>
                        <p class="text-gray-600 font-medium">Description:</p>
                        <p class="text-gray-800">{{ $product->description }}</p>
                    </div>
                @endif
    
                @if($product->usage_tips)
                    <div>
                        <p class="text-gray-600 font-medium">Usage Tips:</p>
                        <p class="text-gray-800">{{ $product->usage_tips }}</p>
                    </div>
                @endif
            </div>
        </div>
    
        <!-- Product Image -->
        @if($product->image)
            <div class="mt-8">
                <p class="text-gray-600 font-medium mb-2">Product Image:</p>
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                     class="w-full md:w-1/2 rounded-lg border border-gray-200">
            </div>
        @endif
    
        <!-- Back Button -->
        <div class="mt-8">
            <a href="{{ route('admin.products.index') }}"
               class="inline-block bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-6 rounded">
                Back to Products
            </a>
        </div>
    </div>
    
</body>
</html>








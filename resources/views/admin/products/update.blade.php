<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product - Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="flex h-screen overflow-hidden">
        @include('admin.partials.sidebar')

        <div class="flex-1 flex flex-col overflow-hidden">
            @include('admin.partials.header')

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
                <div class="container mx-auto px-6 py-8">
                    <!-- Header -->
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-gray-800">Edit Product</h2>
                        <a href="{{ route('admin.products.index') }}" 
                           class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Back to Products
                        </a>
                    </div>

                    <!-- Form -->
                    <div class="bg-white shadow-md rounded-lg p-6">
                        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                <!-- Left Column -->
                                <div class="space-y-6">
                                    <!-- Product Name -->
                                    <div>
                                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Product Name</label>
                                        <input type="text" id="name" name="name"
                                               value="{{ old('name', $product->name) }}"
                                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror"
                                               required>
                                        @error('name')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Category -->
                                    <div>
                                        <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                                        <select id="category_id" name="category_id"
                                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('category_id') border-red-500 @enderror"
                                                required>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Price -->
                                    <div>
                                        <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Price ($)</label>
                                        <input type="number" id="price" name="price"
                                               value="{{ old('price', $product->price) }}" step="0.01" min="0"
                                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('price') border-red-500 @enderror"
                                               required>
                                        @error('price')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Stock -->
                                    <div>
                                        <label for="stock" class="block text-sm font-medium text-gray-700 mb-2">Stock Quantity</label>
                                        <input type="number" id="stock" name="stock"
                                               value="{{ old('stock', $product->stock) }}" min="0"
                                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('stock') border-red-500 @enderror"
                                               required>
                                        @error('stock')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Product Image -->
                                    <!-- Product Image URL -->
<div>
    <label for="image_url" class="block text-sm font-medium text-gray-700 mb-2">Image URL</label>
    <input type="url" 
           id="image_url" 
           name="image_url" 
           value="{{ old('image_url', $product->image) }}"
           placeholder="https://example.com/image.jpg"
           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('image_url') border-red-500 @enderror">
    @error('image_url')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
    <p class="text-sm text-gray-500 mt-1">Optional: Use a direct image URL if no file is uploaded.</p>
</div>


                                <!-- Right Column -->
                                <div class="space-y-6">
                                    <!-- Description -->
                                    <div>
                                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                                        <textarea id="description" name="description" rows="4"
                                                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('description') border-red-500 @enderror"
                                                  placeholder="Enter product description...">{{ old('description', $product->description) }}</textarea>
                                        @error('description')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Ingredients -->
                                    <div>
                                        <label for="ingredients" class="block text-sm font-medium text-gray-700 mb-2">Ingredients</label>
                                        <textarea id="ingredients" name="ingredients" rows="4"
                                                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('ingredients') border-red-500 @enderror"
                                                  placeholder="List the main ingredients...">{{ old('ingredients', $product->ingredients) }}</textarea>
                                        @error('ingredients')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Usage Tips -->
                                    <div>
                                        <label for="usage_tips" class="block text-sm font-medium text-gray-700 mb-2">Usage Tips</label>
                                        <textarea id="usage_tips" name="usage_tips" rows="4"
                                                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('usage_tips') border-red-500 @enderror"
                                                  placeholder="How to use this product...">{{ old('usage_tips', $product->usage_tips) }}</textarea>
                                        @error('usage_tips')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Buttons -->
                            <div class="mt-8 flex justify-end space-x-4">
                                <a href="{{ route('admin.products.index') }}"
                                   class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-6 rounded">
                                    Cancel
                                </a>
                                <button type="submit"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded">
                                    Update Product
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Validation & Success Feedback -->
                    @if ($errors->any())
                        <div class="mt-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                            <strong>There were some issues with your input:</strong>
                            <ul class="mt-2 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="mt-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                </div>
            </main>
        </div>
    </div>
</body>
</html>

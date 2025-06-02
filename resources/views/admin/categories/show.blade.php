<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Admin - View Category</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="max-w-4xl mx-auto mt-10 bg-white shadow-md rounded-lg p-8">
        <!-- Category Title -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800">{{ $category->name }}</h1>
            @if($category->description)
                <p class="text-gray-600 mt-2">{{ $category->description }}</p>
            @endif
        </div>

        <!-- Category Info Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-4">
                <div>
                    <p class="text-gray-600 font-medium">Number of Products:</p>
                    <p class="text-lg font-semibold text-blue-600">{{ $category->products->count() }}</p>
                </div>
            </div>

            <div class="space-y-4">
                <!-- Add more category related info here if needed -->
            </div>
        </div>

        <!-- Back Button -->
        <div class="mt-8">
            <a href="{{ route('admin.categories.index') }}"
               class="inline-block bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-6 rounded">
                Back to Categories
            </a>
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Categories - Admin</title>
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
                        <h2 class="text-2xl font-bold text-gray-800">Categories</h2>
                        <a href="{{ route('admin.categories.create') }}"
                           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Add New Category
                        </a>
                    </div>

                    <!-- Success & Error Messages -->
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                            {{ session('error') }}
                        </div>
                    @endif

                    <!-- Categories Table -->
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Category Name
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Products Count
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($categories as $category)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap text-gray-900 font-medium">
                                            {{ $category->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                                {{ $category->products_count > 0 ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-600' }}">
                                                {{ $category->products_count }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                            <a href="{{ route('admin.categories.show', $category) }}" 
                                               class="text-blue-600 hover:text-blue-900">View</a>
                                            <a href="{{ route('admin.categories.edit', $category) }}" 
                                               class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                            <form action="{{ route('admin.categories.destroy', $category) }}" 
                                                  method="POST" 
                                                  class="inline"
                                                  onsubmit="return confirm('Are you sure you want to delete this category? This action cannot be undone.')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-6 py-4 text-center text-gray-500">
                                            No categories found. 
                                            <a href="{{ route('admin.categories.create') }}" class="text-blue-600 hover:text-blue-800">
                                                Add your first category
                                            </a>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-6">
                        {{ $categories->links() }}
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>

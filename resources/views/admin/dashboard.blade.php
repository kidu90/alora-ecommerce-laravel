<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <body class="bg-gray-100">
        <div class="flex h-screen overflow-hidden">
            <!-- Sidebar -->
            <aside class="w-64 bg-white shadow-md">
                <div class="p-4 border-b border-gray-200">
                    <h1 class="text-2xl font-bold text-gray-800">Alora</h1>
                </div>
                <nav class="mt-4">
                    <a href="#home" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800 transition-colors duration-200 sidebar-link" data-target="home">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Home
                    </a>
                    <a href="#products" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800 transition-colors duration-200 sidebar-link" data-target="products">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                        Manage Products
                    </a>
                    <a href="#orders" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800 transition-colors duration-200 sidebar-link" data-target="orders">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                        Order History
                    </a>
                    <a href="#stock" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800 transition-colors duration-200 sidebar-link" data-target="stock">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                        </svg>
                        Stock
                    </a>
                    <a href="#subscriptions" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800 transition-colors duration-200 sidebar-link" data-target="subscriptions">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 9a2 2 0 10-4 0v5a2 2 0 01-2 2h6m-6-4h4m8 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Subscriptions
                    </a>
                </nav>
            </aside>

            <!-- Main Content -->
            <div class="flex-1 flex flex-col overflow-hidden">
                <!-- Header -->
                <header class="bg-white shadow-sm">
                    <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                        <h1 class="text-lg font-semibold text-gray-900">Dashboard</h1>
                    </div>
                </header>

                <!-- Page Content -->
                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
                    <div class="container mx-auto px-6 py-8">
                        <div id="home" class="tab-content active">
                            <h2 class="text-2xl font-semibold text-gray-900 mb-4">Welcome to Alora Dashboard</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                                <div class="bg-white rounded-lg shadow-md p-6">
                                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Total Revenue</h3>
                                    <p class="text-3xl font-bold text-gray-900">$45,231.89</p>
                                    <p class="text-sm text-green-600">+20.1% from last month</p>
                                </div>
                                <div class="bg-white rounded-lg shadow-md p-6">
                                    <h3 class="text-lg font-semibold text-gray-700 mb-2">New Orders</h3>
                                    <p class="text-3xl font-bold text-gray-900">356</p>
                                    <p class="text-sm text-green-600">+5.3% from last week</p>
                                </div>
                                <div class="bg-white rounded-lg shadow-md p-6">
                                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Customer Satisfaction</h3>
                                    <p class="text-3xl font-bold text-gray-900">98%</p>
                                    <p class="text-sm text-green-600">+2% from last quarter</p>
                                </div>
                                <div class="bg-white rounded-lg shadow-md p-6">
                                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Pending Shipments</h3>
                                    <p class="text-3xl font-bold text-gray-900">23</p>
                                    <p class="text-sm text-yellow-600">-3 from yesterday</p>
                                </div>
                            </div>
                        </div>

                        <div id="products" class="tab-content hidden">
                            <h2 class="text-2xl font-semibold text-gray-900 mb-4">Manage Products</h2>
                            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product Name</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">Product A</td>
                                            <td class="px-6 py-4 whitespace-nowrap">Electronics</td>
                                            <td class="px-6 py-4 whitespace-nowrap">$199.99</td>
                                            <td class="px-6 py-4 whitespace-nowrap">50</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                                                <a href="#" class="text-red-600 hover:text-red-900">Delete</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">Product B</td>
                                            <td class="px-6 py-4 whitespace-nowrap">Clothing</td>
                                            <td class="px-6 py-4 whitespace-nowrap">$49.99</td>
                                            <td class="px-6 py-4 whitespace-nowrap">100</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                                                <a href="#" class="text-red-600 hover:text-red-900">Delete</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div id="orders" class="tab-content hidden">
                            <h2 class="text-2xl font-semibold text-gray-900 mb-4">Order History</h2>
                            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">#12345</td>
                                            <td class="px-6 py-4 whitespace-nowrap">John Doe</td>
                                            <td class="px-6 py-4 whitespace-nowrap">2023-04-01</td>
                                            <td class="px-6 py-4 whitespace-nowrap">$299.99</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Completed</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">#12346</td>
                                            <td class="px-6 py-4 whitespace-nowrap">Jane Smith</td>
                                            <td class="px-6 py-4 whitespace-nowrap">2023-04-02</td>
                                            <td class="px-6 py-4 whitespace-nowrap">$149.99</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div id="stock" class="tab-content hidden">
                            <h2 class="text-2xl font-semibold text-gray-900 mb-4">Stock Management</h2>
                            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product Name</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Current Stock</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Reorder Level</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">Product A</td>
                                            <td class="px-6 py-4 whitespace-nowrap">50</td>
                                            <td class="px-6 py-4 whitespace-nowrap">20</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">In Stock</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Reorder</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">Product B</td>
                                            <td class="px-6 py-4 whitespace-nowrap">5</td>
                                            <td class="px-6 py-4 whitespace-nowrap">15</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Low Stock</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Reorder</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div id="subscriptions" class="tab-content hidden">
                            <h2 class="text-2xl font-semibold text-gray-900 mb-4">Subscriptions</h2>
                            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Plan</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Start Date</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Next Billing</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">John Doe</td>
                                            <td class="px-6 py-4 whitespace-nowrap">Premium</td>
                                            <td class="px-6 py-4 whitespace-nowrap">2023-01-01</td>
                                            <td class="px-6 py-4 whitespace-nowrap">2023-05-01</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">Jane Smith</td>
                                            <td class="px-6 py-4 whitespace-nowrap">Basic</td>
                                            <td class="px-6 py-4 whitespace-nowrap">2023-02-15</td>
                                            <td class="px-6 py-4 whitespace-nowrap">2023-05-15</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script>
            // Tab switching functionality
            const tabLinks = document.querySelectorAll('.sidebar-link');
            const tabContents = document.querySelectorAll('.tab-content');

            tabLinks.forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    const targetId = link.getAttribute('data-target');

                    tabContents.forEach(content => {
                        content.classList.add('hidden');
                    });

                    tabLinks.forEach(link => {
                        link.classList.remove('bg-gray-100', 'text-gray-800');
                    });

                    document.getElementById(targetId).classList.remove('hidden');
                    link.classList.add('bg-gray-100', 'text-gray-800');
                });
            });
        </script>

    </body>

</html>
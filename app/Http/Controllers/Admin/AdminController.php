<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalOrders = Order::count();
        $totalRevenue = Order::where('status', '!=', 'cancelled')->sum('total_amount');
        $totalProducts = Product::count();
        $totalCustomers = User::where('is_admin', false)->count();
        $pendingOrders = Order::where('status', 'pending')->count();
        $lowStockProducts = Product::where('stock', '<=', 10)->count();

        $recentOrders = Order::with(['user', 'orderItems'])
            ->latest()
            ->take(5)
            ->get();

        $monthlyRevenue = Order::where('status', '!=', 'cancelled')
            ->whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)
            ->sum('total_amount');

        return view('admin.dashboard', compact(
            'totalOrders',
            'totalRevenue', 
            'totalProducts',
            'totalCustomers',
            'pendingOrders',
            'lowStockProducts',
            'recentOrders',
            'monthlyRevenue'
        ));
    }
}
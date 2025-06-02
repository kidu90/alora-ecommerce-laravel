<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())
                      ->with('orderItems.product')
                      ->orderBy('created_at', 'desc')
                      ->paginate(10);
        
        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }
        
        return view('orders.show', compact('order'));
    }

    public function checkout()
    {
        $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();
        
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty');
        }

        $subtotal = $cartItems->sum(function ($item) {
            return $item->quantity * $item->price;
        });
        
        $shipping = 5; // Fixed shipping cost
        $tax = $subtotal * 0.1; // 10% tax
        $total = $subtotal + $shipping + $tax;

        return view('orders.checkout', compact('cartItems', 'subtotal', 'shipping', 'tax', 'total'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'shipping_name' => 'required|string|max:255',
            'shipping_email' => 'required|email',
            'shipping_phone' => 'required|string|max:20',
            'shipping_address' => 'required|string',
            'shipping_city' => 'required|string|max:100',
            'shipping_state' => 'required|string|max:100',
            'shipping_postal_code' => 'required|string|max:20',
            'notes' => 'nullable|string'
        ]);

        $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();
        
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty');
        }

        DB::beginTransaction();
        
        try {
            // Calculate totals
            $subtotal = $cartItems->sum(function ($item) {
                return $item->quantity * $item->price;
            });
            
            $shipping = 500;
            $tax = $subtotal * 0.1;
            $total = $subtotal + $shipping + $tax;

            // Create order
            $order = Order::create([
                'order_number' => Order::generateOrderNumber(),
                'user_id' => Auth::id(),
                'total_amount' => $total,
                'tax_amount' => $tax,
                'shipping_amount' => $shipping,
                'shipping_name' => $request->shipping_name,
                'shipping_email' => $request->shipping_email,
                'shipping_phone' => $request->shipping_phone,
                'shipping_address' => $request->shipping_address,
                'shipping_city' => $request->shipping_city,
                'shipping_state' => $request->shipping_state,
                'shipping_postal_code' => $request->shipping_postal_code,
                'notes' => $request->notes,
            ]);

            // Create order items and update stock
            foreach ($cartItems as $cartItem) {
                $product = $cartItem->product;
                
                if ($product->stock < $cartItem->quantity) {
                    throw new \Exception("Insufficient stock for {$product->name}");
                }

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'product_price' => $cartItem->price,
                    'quantity' => $cartItem->quantity,
                    'total_price' => $cartItem->quantity * $cartItem->price,
                ]);

                // Update product stock
                $product->decrement('stock', $cartItem->quantity);
            }

            // Clear cart
            Cart::where('user_id', Auth::id())->delete();

            DB::commit();

            return redirect()->route('orders.success', $order->id)
                           ->with('success', 'Order placed successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()
                           ->withInput()
                           ->with('error', 'Failed to place order: ' . $e->getMessage());
        }
    }

    public function success(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }
        
        return view('orders.success', compact('order'));
    }
}
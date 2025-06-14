<?php

namespace App\Http\Controllers\api;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = $this->getCartItems();

        $total = $cartItems->sum(function ($item) {
            return $item->quantity * $item->price;
        });

        return response()->json([
            'cart_items' => $cartItems,
            'total' => $total,
        ]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Product::findOrFail($request->product_id);

        if ($product->stock < $request->quantity) {
            return response()->json(['error' => 'Insufficient stock'], 400);
        }

        $cartData = [
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'price' => $product->price
        ];

        if (Auth::check()) {
            $cartData['user_id'] = Auth::id();
            $existingItem = Cart::where('user_id', Auth::id())
                ->where('product_id', $product->id)
                ->first();
        } else {
            $cartData['session_id'] = session()->getId();
            $existingItem = Cart::where('session_id', session()->getId())
                ->where('product_id', $product->id)
                ->first();
        }

        if ($existingItem) {
            $newQuantity = $existingItem->quantity + $request->quantity;
            if ($product->stock < $newQuantity) {
                return response()->json(['error' => 'Insufficient stock'], 400);
            }
            $existingItem->update(['quantity' => $newQuantity]);
        } else {
            Cart::create($cartData);
        }

        return response()->json(['success' => 'Product added to cart']);
    }

    public function update(Request $request, Cart $cart)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        if ($cart->product->stock < $request->quantity) {
            return response()->json(['error' => 'Insufficient stock'], 400);
        }

        $cart->update(['quantity' => $request->quantity]);

        return response()->json(['success' => 'Cart updated']);
    }

    public function remove(Cart $cart)
    {
        $cart->delete();
        return response()->json(['success' => 'Item removed from cart']);
    }

    public function count()
    {
        $count = $this->getCartItems()->sum('quantity');
        return response()->json(['count' => $count]);
    }

    private function getCartItems()
    {
        if (Auth::check()) {
            return Cart::with('product')->where('user_id', Auth::id())->get();
        } else {
            return Cart::with('product')->where('session_id', session()->getId())->get();
        }
    }
}

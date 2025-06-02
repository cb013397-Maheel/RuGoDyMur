<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart($id)
    {
        $cart = new Cart();
        $cart->user_id = auth()->id(); // Assuming user is authenticated
        $cart->product_id = $id;

        // Check if the product is already in the cart
        if (Cart::where('user_id', auth()->id())->where('product_id', $id)->exists()) {
            return redirect()->back()->with('error', 'Product already in cart.');
        }

        $cart->save();

        return redirect()->back()->with('success', 'Product added to cart successfully.');
    }

    public function index()
    {
        $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();
        $totalPrice = $cartItems->sum(function ($item) {
            return $item->product->price; // Assuming the Product model has a price attribute
        });
        return view('customer.cart.index', compact('cartItems', 'totalPrice'));
    }

    public function remove($id)
    {
        $cartItem = Cart::where('user_id', auth()->id())->where('product_id', $id)->first();

        if ($cartItem) {
            $cartItem->delete();
            return redirect()->back()->with('success', 'Product removed from cart successfully.');
        }

        return redirect()->back()->with('error', 'Product not found in cart.');
    }

    public function checkout()
    {
        // Here you can implement the checkout logic, like processing payment, etc.
        // For now, we'll just return a view.
        return view('customer.cart.checkout');
    }
}

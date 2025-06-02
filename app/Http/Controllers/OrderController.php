<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function checkout(Request $request)
    {
        // Validate the request data
        $request->validate([
            'address' => 'required|string|max:255',
            'contact' => 'required|string|max:15',
        ]);

        // Create a new order
        $order = new Order();
        $order->user_id = auth()->id();
        $order->address = $request->address;
        $order->phone = $request->contact;
        $order->total_amount = 0; // This should be calculated based on cart items
        $order->status = 'pending'; // Default status

        // Save the order
        $order->save();

        // Get cart items for the authenticated user
        $cartItems = Cart::where('user_id', auth()->id())->get();
        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        // Calculate total amount and create order items
        $totalAmount = 0;

        foreach ($cartItems as $item) {
            $totalAmount += $item->product->price; // Assuming the Product model has a price attribute
            $order->orderItems()->create([
                'product_id' => $item->product_id,
                'user_id' => auth()->id(),
            ]);
        }
        // Update the total amount in the order
        $order->total_amount = $totalAmount;
        $order->save();
        // Clear the cart after placing the order
        Cart::where('user_id', auth()->id())->delete();

        return redirect()->route('customer.orders.index')->with('success', 'Order placed successfully.');
    }

    public function index()
    {
        // Get all orders for the authenticated user
        $orders = Order::where('user_id', auth()->id())->with('orderItems.product')->get();

        return view('customer.order.index', compact('orders'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,completed,cancelled',
        ]);

        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->back()->with('success', 'Order status updated successfully!');
    }
}

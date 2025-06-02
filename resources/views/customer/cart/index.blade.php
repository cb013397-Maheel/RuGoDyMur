<x-app-layout>
    <x-slot name="slot">
        <div class="py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold mb-6">Your Cart</h1>

                <!-- Customer Details -->
                <div class="bg-white shadow-md rounded-lg p-6 mb-6">
                    <h2 class="text-xl font-bold mb-2">Customer Details</h2>
                    <p class="text-gray-700">Name: {{ auth()->user()->name }}</p>
                    <p class="text-gray-700">Email: {{ auth()->user()->email }}</p>
                </div>

                @if ($cartItems->isEmpty())
                    <p class="text-gray-500">Your cart is empty.</p>
                @else
                    <div class="grid grid-cols-1 gap-6">
                        @foreach ($cartItems as $item)
                            <div class="bg-white shadow-md rounded-lg overflow-hidden flex flex-col md:flex-row">
                                <!-- Product Image -->
                                <div class="relative flex-1">
                                    @if ($item->product->image)
                                        <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}" class="w-full h-48 object-cover rounded-l-lg">
                                    @else
                                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center rounded-l-lg">
                                            <span class="text-gray-500">No Image Available</span>
                                        </div>
                                    @endif
                                </div>

                                <!-- Product Details -->
                                <div class="p-6 flex-1">
                                    <h2 class="text-xl font-bold mb-2">{{ $item->product->name }}</h2>
                                    <p class="text-gray-600 mb-2">Price: ${{ $item->product->price }}</p>
                                    <p class="text-gray-600 mb-2">Quantity: 1</p>
                                    <form method="POST" action="{{ route('cart.remove', $item->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-400">
                                            Remove
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Checkout Section -->
                    <div class="mt-6 bg-white shadow-md rounded-lg p-6">
                        <h2 class="text-xl font-bold mb-4">Checkout</h2>
                        <p class="text-gray-700 mb-4">Total: ${{ $totalPrice }}</p>
                        <p class="text-gray-700 mb-4">Please provide your address and contact number to complete the order.</p>
                    <form method="POST" action="{{ route('order.checkout') }}" class="bg-white shadow-md rounded-lg p-6">
                        @csrf
                        <div class="mb-4">
                            <label for="address" class="block text-gray-700 font-bold mb-2">Address</label>
                            <textarea
                                id="address"
                                name="address"
                                rows="3"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200"
                                placeholder="Enter your address"
                                required
                            ></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="contact" class="block text-gray-700 font-bold mb-2">Contact Number</label>
                            <input
                                type="text"
                                id="contact"
                                name="contact"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200"
                                placeholder="Enter your contact number"
                                required
                            />
                        </div>
                        <div class="mt-6">
                            <button type="submit" class="block w-full text-center bg-yellow-500 text-white py-2 rounded hover:bg-yellow-400">
                                Place Order
                            </button>
                        </div>
                    </form>
                    </div>
                @endif
            </div>
        </div>
    </x-slot>
</x-app-layout>

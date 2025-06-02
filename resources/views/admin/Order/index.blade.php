<x-app-layout>
    <x-slot name="slot">
        <div class="py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold mb-6">Orders</h1>

                @if ($orders->isEmpty())
                    <p class="text-gray-500">No orders found.</p>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($orders as $order)
                            <div class="bg-white shadow-md rounded-lg p-6">
                                <!-- Order Details -->
                                <h2 class="text-xl font-bold mb-2">Order #{{ $order->id }}</h2>
                                <p class="text-gray-700 mb-2">User: {{ $order->user->name }}</p>
                                <p class="text-gray-700 mb-2">Email: {{ $order->user->email }}</p>
                                <p class="text-gray-700 mb-2">Total Amount: ${{ $order->total_amount }}</p>
                                <p class="text-gray-700 mb-2">Address: {{ $order->address }}</p>

                                <!-- Status -->
                                <div class="mb-4">
                                    <p class="text-gray-700 mb-2">Status:
                                    @if ($order->status === 'pending')
                                        <form method="POST" action="{{ route('order.updateStatus', $order->id) }}">
                                            @csrf
                                            @method('PATCH')
                                            <select name="status" class="border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200">
                                                <option value="pending" selected>Pending</option>
                                                <option value="completed">Completed</option>
                                                <option value="cancelled">Cancelled</option>
                                            </select>
                                            <button type="submit" class="bg-blue-500 text-white py-1 px-3 rounded hover:bg-blue-400 mt-2">
                                                Update
                                            </button>
                                        </form>
                                    @else
                                        <span class="font-bold">{{ ucfirst($order->status) }}</span>
                                        @endif
                                        </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </x-slot>
</x-app-layout>

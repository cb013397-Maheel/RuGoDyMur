<x-app-layout>
    <x-slot name="slot">
        <div class="py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold mb-6">Your Orders</h1>

                @if ($orders->isEmpty())
                    <p class="text-gray-500">You have no orders.</p>
                @else
                    <div class="grid grid-cols-1 gap-6">
                        @foreach ($orders as $order)
                            <div class="bg-white shadow-md rounded-lg p-6">
                                <!-- Order Details -->
                                <h2 class="text-xl font-bold mb-2">Order #{{ $order->id }}</h2>
                                <p class="text-gray-700 mb-2">Status: <span class="font-bold">{{ ucfirst($order->status) }}</span></p>
                                <p class="text-gray-700 mb-2">Total Amount: ${{ $order->total_amount }}</p>
                                <p class="text-gray-700 mb-4">Address: {{ $order->address }}</p>

                                <!-- Order Items -->
                                <h3 class="text-lg font-bold mb-2">Items:</h3>
                                <ul class="list-disc pl-6">
                                    @foreach ($order->orderItems as $item)
                                        <li>
                                            <p class="text-gray-700">
                                                {{ $item->product->name }} - ${{ $item->product->price }}
                                            </p>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </x-slot>
</x-app-layout>

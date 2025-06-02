<x-app-layout>
    <x-slot name="slot">
        <div class="py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white shadow-md rounded-lg overflow-hidden flex md:flex-row">
                    <!-- Product Image -->
                    <div class="relative flex-1">
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-96 object-cover rounded-l-lg">
                        @else
                            <div class="w-full h-96 bg-gray-200 flex items-center justify-center rounded-l-lg">
                                <span class="text-gray-500">No Image Available</span>
                            </div>
                        @endif
                    </div>

                    <!-- Product Details -->
                    <div class="p-6 flex-1">
                        <h1 class="text-3xl font-bold mb-4">{{ $product->name }}</h1>
                        <p class="text-gray-600 mb-4">{{ $product->description }}</p>
                        <p class="text-yellow-500 font-bold text-xl mb-4">${{ $product->price }}</p>
                        <p class="text-gray-500 mb-4">Category: <span class="font-bold">{{ $product->category->name }}</span></p>
                        <div class="flex justify-evenly">
                            <a href="{{ route('cart.add', $product->id) }}" class="block mt-4 text-center bg-green-500 text-white py-2 rounded hover:bg-green-400 w-50">
                                Add to Cart
                            </a>
                            <a href="{{ route('products.index') }}" class="block mt-4 text-center bg-yellow-500 text-white py-2 rounded hover:bg-yellow-400 w-50">
                                Back to Products
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>

<x-app-layout>
    <x-slot name="slot">
        <!-- Hero Section -->
        <div class="relative bg-gray-800 text-white">
            <img src="{{ asset('images/hero.jpg') }}" alt="Hero Image" class="w-full h-96 object-cover">
            <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50">
                <h1 class="text-3xl font-bold" style="font-family: 'Cherry Bomb One', cursive; color: #ffbf00">Welcome to RuGoDyMur</h1>
            </div>
        </div>

        <!-- Product Grid -->
        <div class="py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-2xl font-bold mb-6">Our Products</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach ($products as $product)
                        <div class="bg-white shadow-md rounded-lg overflow-hidden">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h3 class="text-lg font-bold">{{ $product->name }}</h3>
                                <p class="text-gray-600">{{ $product->description }}</p>
                                <p class="text-yellow-500 font-bold mt-2">${{ $product->price }}</p>
                                <a href="{{ route('product.show', $product->id) }}" class="block mt-4 text-center bg-yellow-500 text-white py-2 rounded hover:bg-yellow-400">
                                    View Product
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>

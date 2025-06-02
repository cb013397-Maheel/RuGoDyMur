<!-- File: resources/views/customer/product/index.blade.php -->
<x-app-layout>
    <x-slot name="slot">
        <div class="py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold mb-6">Product Catalog</h1>

                <!-- Filters -->
                <div class="mb-6 flex flex-col md:flex-row gap-4">
                    <!-- Search Bar -->
                    <form method="GET" action="{{ route('products.index') }}" class="flex-1">
                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Search products..."
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200"
                        />
                    </form>

                    <!-- Category Filter -->
                    <form method="GET" action="{{ route('products.index') }}" class="flex-1">
                        <select
                            name="category"
                            onchange="this.form.submit()"
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200"
                        >
                            <option value="">All Categories</option>
                            @foreach ($categories as $category)
                                <option
                                    value="{{ $category->id }}"
                                    {{ request('category') == $category->id ? 'selected' : '' }}
                                >
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                </div>

                <!-- Product Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @forelse ($products as $product)
                        <div class="bg-white shadow-md rounded-lg overflow-hidden">
                            <img
                                src="{{ asset('storage/' . $product->image) }}"
                                alt="{{ $product->name }}"
                                class="w-full h-48 object-cover"
                            />
                            <div class="p-4">
                                <h3 class="text-lg font-bold">{{ $product->name }}</h3>
                                <p class="text-gray-600">{{ $product->description }}</p>
                                <p class="text-yellow-500 font-bold mt-2">${{ $product->price }}</p>
                                <a
                                    href="{{ route('product.show', $product->id) }}"
                                    class="block mt-4 text-center bg-yellow-500 text-white py-2 rounded hover:bg-yellow-400"
                                >
                                    View Product
                                </a>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500">No products found.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>

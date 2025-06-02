<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-4">Edit Product</h1>
                <form method="POST" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <x-label for="name" value="Product Name" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$product->name" required autofocus />
                    </div>
                    <div class="mb-4">
                        <x-label for="description" value="Description" />
                        <textarea id="description" class="block mt-1 w-full" name="description" required>{{ $product->description }}</textarea>
                    </div>
                    <div class="mb-4">
                        <x-label for="price" value="Price" />
                        <x-input id="price" class="block mt-1 w-full" type="number" name="price" :value="$product->price" required />
                    </div>
                    <div class="mb-4">
                        <x-label for="category_id" value="Category" />
                        <select id="category_id" name="category_id" class="block mt-1 w-full" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <x-label for="image" value="Product Image" />
                        <x-input id="image" class="block mt-1 w-full" type="file" name="image" />
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="w-16 h-16 object-cover mt-2">
                        @endif
                    </div>
                    <div class="flex items-center justify-end">
                        <x-button class="bg-yellow-500 text-black hover:bg-yellow-400">
                            Update Product
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

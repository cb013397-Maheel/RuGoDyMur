<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-4">Create Product</h1>
                <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <x-label for="name" value="Product Name" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                    </div>
                    <div class="mb-4">
                        <x-label for="description" value="Description" />
                        <textarea id="description" class="block mt-1 w-full" name="description" required>{{ old('description') }}</textarea>
                    </div>
                    <div class="mb-4">
                        <x-label for="price" value="Price" />
                        <x-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')" required />
                    </div>
                    <div class="mb-4">
                        <x-label for="category_id" value="Category" />
                        <select id="category_id" name="category_id" class="block mt-1 w-full" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <x-label for="image" value="Product Image" />
                        <x-input id="image" class="block mt-1 w-full" type="file" name="image" />
                    </div>
                    <div class="flex items-center justify-end">
                        <x-button class="bg-yellow-500 text-black hover:bg-yellow-400">
                            Create Product
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

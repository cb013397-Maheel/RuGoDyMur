<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h1 class="text-2xl font-bold">Products</h1>
                    <a href="{{ route('product.create') }}" class="bg-yellow-500 text-black px-4 py-2 rounded hover:bg-yellow-400">
                        Create Product
                    </a>
                </div>
                <table class="table-auto w-full border-collapse border border-gray-300">
                    <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-4 py-2">ID</th>
                        <th class="border border-gray-300 px-4 py-2">Name</th>
                        <th class="border border-gray-300 px-4 py-2">Description</th>
                        <th class="border border-gray-300 px-4 py-2">Price</th>
                        <th class="border border-gray-300 px-4 py-2">Category</th>
                        <th class="border border-gray-300 px-4 py-2">Image</th>
                        <th class="border border-gray-300 px-4 py-2">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($product as $item)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $item->id }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $item->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $item->description }}</td>
                            <td class="border border-gray-300 px-4 py-2">${{ $item->price }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $item->category->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                @if ($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="Product Image" class="w-16 h-16 object-cover">
                                @else
                                    No Image
                                @endif
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                <a href="{{ route('product.edit', $item->id) }}" class="bg-yellow-500 text-white px-2 py-2 m-2 rounded hover:bg-yellow-400">
                                    Edit
                                </a>
                                <form method="POST" action="{{ route('product.destroy', $item->id) }}" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-2 py-1 m-2 rounded hover:bg-red-400">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

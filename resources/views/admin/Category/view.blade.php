<!-- File: resources/views/admin/category/view.blade.php -->
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h1 class="text-2xl font-bold">Categories</h1>
                    <a href="{{ route('category.create') }}" class="bg-yellow-500 text-black px-4 py-2 rounded hover:bg-yellow-400">
                        Create Category
                    </a>
                </div>
                <table class="table-auto w-full border-collapse border border-gray-300">
                    <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-4 py-2 w-25">ID</th>
                        <th class="border border-gray-300 px-4 py-2">Name</th>
                        <th class="border border-gray-300 px-4 py-2 w-50">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $category->id }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $category->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <a href="{{ route('category.edit', $category->id) }}" class="bg-yellow-500 text-white px-4 py-1 m-2 rounded hover:bg-yellow-400">
                                    Edit
                                </a>
                                <form method="POST" action="{{ route('category.destroy', $category->id) }}" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-400">
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

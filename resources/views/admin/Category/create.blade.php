<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-4">Create Category</h1>
                <form method="POST" action="{{ route('category.store') }}">
                    @csrf
                    <div class="mb-4">
                        <x-label for="name" value="Category Name" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                    </div>
                    <div class="flex items-center justify-end">
                        <x-button class="bg-yellow-500 text-black hover:bg-yellow-400">
                            Create Category
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

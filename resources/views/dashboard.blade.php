<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h1 class="text-2xl font-bold">Users</h1>
                    <a href="{{ route('user.create') }}" class="bg-yellow-500 text-black px-4 py-2 rounded hover:bg-yellow-400">
                        Create User
                    </a>
                </div>
                <table class="table-auto w-full border-collapse border border-gray-300">
                    <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-4 py-2">ID</th>
                        <th class="border border-gray-300 px-4 py-2">Name</th>
                        <th class="border border-gray-300 px-4 py-2">Email</th>
                        <th class="border border-gray-300 px-4 py-2">Created At</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        @if( $user->id === auth()->id() )
                            <tr class="bg-yellow-100">
                        @else
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $user->id }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $user->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $user->email }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $user->created_at->format('d-m-y') }}</td>
                        </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

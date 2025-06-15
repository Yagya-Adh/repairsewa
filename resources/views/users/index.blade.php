<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __('Users') }}
                </div>
            </div>
            @session('success')
            <div class="alert alert-success bg-green-400 w-full px-4 py-1">
                {{ $value }}
            </div>
            @endsession
            <table
                class="min-w-full table-auto mt-6 text-left border-collapse border border-gray-300 dark:border-gray-600">

                <a href="{{ route('users.create') }}" class="text-black bg-green-600 rounded-sm px-4 py-1">Create
                    user</a>

                <a href="{{ route('product.create') }}" class="text-black bg-green-600 rounded-sm px-4 py-1">Create
                    Product</a>

                <thead class="bg-gray-100 dark:bg-gray-700">

                    <tr>
                        <th class="border px-4 py-2">S.No</th>
                        <th class="border px-4 py-2">Name</th>
                        <th class="border px-4 py-2">Email</th>
                        <th class="border px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $user)
                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <td class="border px-4 py-2">{{ $index + 1 }}</td>
                        <td class="border px-4 py-2">{{ $user->name }}</td>
                        <td class="border px-4 py-2">{{ $user->email }}</td>
                        <td class="border px-4 py-2">
                            <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                                <a href="{{ route('users.edit',$user->id) }}"
                                    class="btn btn-info text-orange-500">Edit</a>
                                <a href="{{ route('users.show',$user->id) }}"
                                    class="btn btn-info text-gray-500">Show</a>
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-info text-red-500">Del</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
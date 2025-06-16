<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __('Update Role') }}
                </div>
            </div>

            @if (session('success'))
            <div class="alert alert-success mt-4 p-4 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
            @endif

            <a href="{{ route('roles.index') }}"
                class="inline-block mt-4 mb-4 text-white bg-gray-700 hover:bg-gray-800 px-4 py-2 rounded">
                Go back
            </a>

            <form action="{{ route('roles.update', $role->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Name:</label>
                    <input type="text" name="name" id="name" class="form-control mt-1 block w-full"
                        value="{{ old('name', $role->name) }}">
                    @error('name')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <h3 class="font-semibold mb-2">Permissions:</h3>
                    @foreach ($permissions as $permission)
                    <div class="flex items-center mb-2">
                        <input type="checkbox" id="perm_{{ $permission->id }}" name="permissions[]"
                            value="{{ $permission->name }}"
                            {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }} class="mr-2">
                        <label for="perm_{{ $permission->id }}">{{ $permission->name }}</label>
                    </div>
                    @endforeach
                </div>

                <div class="mt-4">
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
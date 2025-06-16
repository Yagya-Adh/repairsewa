<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __('Create role') }}
                </div>
            </div>
            @session('success')
            <div class="alert alert-success">
                {{ $value }}
            </div>
            @endsession
            <a href="{{ route('roles.index') }}"
                class="text-black hover:text-white bg-gray-700 mt-2 rounded-sm px-4 py-3 btn btn-info">
                Go back
            </a>
            <form action="{{ route('roles.store') }}" method="POST">
                @csrf
                <div class="mt-2">
                    <label>Name :</label>
                    <input type="text" name="name" class="form-control" />
                    @error('name')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="mt-2 flex flex-col">
                    <h3>Permissions:</h3>
                    @foreach($permissions as $permission)
                    <label>
                        <input type="checkbox" name="permissions[{{ $permission->name }}]"
                            value="{{ $permission->name }}" class="">
                        {{ $permission->name }}
                    </label>
                    @endforeach

                </div>

                <div class="mt-2">
                    <button class="btn btn-success text-black bg-white rounded-sm px-4 py-2">Submit</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
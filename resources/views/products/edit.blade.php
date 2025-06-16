<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __('Products edit') }}
                </div>
            </div>
            <a href="{{ route('products.index') }}"
                class="text-black bg-gray-700 mt-2 rounded-sm px-4 py-1 btn btn-info">
                Go back
            </a>
            <form action="{{ route('products.update',$product->id) }}" method="POST">
                @csrf
                @method('PUT')
                @session('success')
                <div class="alert alert-success">
                    {{ $value }}
                </div>
                @endsession
                <div class="mt-2">
                    <label>Name :</label>
                    <input type="text" name="name" class="form-control" value="{{ $product->name }}" />
                    @error('name')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="mt-2">
                    <button class="btn btn-success text-black bg-white rounded-sm px-4 py-2">Submit</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
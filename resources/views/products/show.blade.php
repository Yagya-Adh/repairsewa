<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __('Show Users  ') }}
                </div>
            </div>
            <a href="{{ route('products.index') }}"
                class="text-black bg-gray-700 mt-2 rounded-sm px-4 py-1 btn btn-info">
                Go back
            </a>
            <p> Name : <strong>{{ $product->name }}</strong> </p>
        </div>
    </div>
</x-app-layout>
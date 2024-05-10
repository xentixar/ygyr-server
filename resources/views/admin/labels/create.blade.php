<x-app-layout>

    <x-slot name="title">
        {{ __('Add label') }}
    </x-slot>

    <div>
        <div class="flex justify-between mb-5">
            <strong>Add label</strong>
            <a href="{{route('admin.labels.index')}}" class="bg-gray-800 text-white px-4 py-1 rounded block">Manage
                labels </a>
        </div>


        <div class="relative overflow-x-auto">
            <form action="{{route('admin.labels.store')}}" method="post">
                @csrf
                <div class="mb-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name <b class="text-red-600">*</b></label>
                    <input type="text" id="name" name="name"
                           class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                           placeholder="Copper" value="{{old('name')}}" required/>
                    @error('name')
                    <div class="text-red-600">{{$message}}</div>
                    @enderror
                </div>
                <button type="submit" class="bg-gray-800 text-white px-4 py-1 rounded block">Add label</button>
            </form>
        </div>
    </div>
</x-app-layout>

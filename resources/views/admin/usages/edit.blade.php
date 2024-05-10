<x-app-layout>

    <x-slot name="title">
        {{ __('Update usage') }}
    </x-slot>

    <div>
        <div class="flex justify-between mb-5">
            <strong>Update usage</strong>
            <a href="{{route('admin.usages.index',['label'=>request('label')])}}"
               class="bg-gray-800 text-white px-4 py-1 rounded block">Manage
                usages </a>
        </div>


        <div class="relative overflow-x-auto">
            <form action="{{route('admin.usages.update', ['usage'=>$usage->id,'label'=>request('label')])}}"
                  method="post">
                @csrf
                @method('PUT')
                <div class="mb-5">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Name <b
                            class="text-red-600">*</b>
                    </label>
                    <textarea type="text" id="description" name="description"
                              class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                              placeholder="Gold Chain" required>{{$usage->description}}</textarea>
                    @error('description')
                    <div class="text-red-600">{{$message}}</div>
                    @enderror
                </div>
                <button type="submit" class="bg-gray-800 text-white px-4 py-1 rounded block">Update usage</button>
            </form>
        </div>
    </div>
</x-app-layout>

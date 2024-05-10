<x-app-layout>

    <x-slot name="title">
        {{ __('Update label') }}
    </x-slot>

    <div>
        <div class="flex justify-between mb-5">
            <strong>Update donations</strong>
            <a href="{{route('admin.donations.index')}}" class="bg-gray-800 p-2 text-white rounded">Manage
                Donations</a>
        </div>


        <div class="">

            <div class="relative overflow-x-auto border p-4 rounded">
                <form action="{{route('admin.donations.update',['donation'=>$donation->id])}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-5">
                        <label for="image" class="block mb-2 text-sm font-medium text-gray-900 ">Image</label>
                        <a target="_blank" href="{{$donation->url}}">
                            <img width="50" height="50" src="{{$donation->url}}" alt="Donation">
                        </a>
                        @error('image')
                        <div class="text-red-700">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="label" class="block mb-2 text-sm font-medium text-gray-900 ">Detected Label</label>
                        <input type="text" id="label"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                               placeholder="Silver" name="label" value="{{$donation->label->name}}" readonly required/>
                        @error('label')
                        <div class="text-red-700">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="donated_by" class="block mb-2 text-sm font-medium text-gray-900 ">Donated By</label>
                        <input type="text" id="donated_by"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                               placeholder="Silver" name="donated_by" value="{{$donation->user->name}}" readonly
                               required/>
                        @error('donated_by')
                        <div class="text-red-700">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="weight" class="block mb-2 text-sm font-medium text-gray-900 ">Weight ( in gm
                            )</label>
                        <input type="text" id="weight"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                               placeholder="2" name="weight" required/>
                        @error('weight')
                        <div class="text-red-700">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <button class="bg-gray-800 py-2 px-3 text-white rounded">Add to Warehouse</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>

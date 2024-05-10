<x-app-layout>

    <x-slot name="title">
        {{ __('Add user') }}
    </x-slot>

    <div>
        <div class="flex justify-between mb-5">
            <strong>Add user</strong>
            <a href="{{route('admin.users.index')}}" class="bg-gray-800 text-white px-4 py-1 rounded block">Manage
                users </a>
        </div>


        <div class="relative overflow-x-auto">
            <form action="{{route('admin.users.store')}}" method="post">
                @csrf
                <div class="mb-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name <b class="text-red-600">*</b></label>
                    <input type="text" id="name" name="name"
                           class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                           placeholder="Alex Smith" value="{{old('name')}}" required/>
                    @error('name')
                    <div class="text-red-600">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email <b
                            class="text-red-600">*</b></label>
                    <input type="email" id="email" name="email"
                           class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                           placeholder="example@domain.com" value="{{old('email')}}" required/>
                    @error('email')
                    <div class="text-red-600">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password <b
                            class="text-red-600">*</b></label>
                    <input type="password" id="password" name="password"
                           class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                           placeholder="********" required/>
                    @error('password')
                    <div class="text-red-600">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">Confirm
                        Password <b
                            class="text-red-600">*</b></label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                           class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                           placeholder="********" required/>
                    @error('password_confirmation')
                    <div class="text-red-600">{{$message}}</div>
                    @enderror
                </div>
                <button type="submit" class="bg-gray-800 text-white px-4 py-1 rounded block">Add user</button>
            </form>
        </div>
    </div>
</x-app-layout>

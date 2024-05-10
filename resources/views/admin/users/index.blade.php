<x-app-layout>

    <x-slot name="title">
        {{ __('Manage users') }}
    </x-slot>

    <div>
        <div class="flex justify-between mb-5">
            <strong>Manage users</strong>
            <a href="{{route('admin.users.create')}}" class="bg-gray-800 text-white px-4 py-1 rounded block">Add
                user</a>
        </div>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        S.N.
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Reward Points
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                </tr>
                </thead>
                <tbody>
                @forelse($users as $user)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{$loop->iteration}}
                        </th>
                        <td class="px-6 py-4">
                            {{$user->name}}
                        </td>
                        <td class="px-6 py-4">
                            {{$user->email}}
                        </td>
                        <td class="px-6 py-4">
                            {{$user->points}}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{route('admin.users.edit',['user'=>$user->id])}}"
                               class="bg-gray-800 text-white px-4 py-1.5 rounded">Edit</a>
                            <form onsubmit="return confirm('Are you sure you want to delete this user?')"
                                  action="{{route('admin.users.destroy',['user'=>$user->id])}}" method="post"
                                  class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-800 text-white px-4 py-1 rounded">Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr class="bg-white border-b">
                        <th scope="row" colspan="6"
                            class="px-6 text-center py-4 font-medium text-gray-900 whitespace-nowrap">
                            No users found
                        </th>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="my-3">
            {{$users->links()}}
        </div>
    </div>
</x-app-layout>

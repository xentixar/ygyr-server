<x-app-layout>

    <x-slot name="title">
        {{ __('Manage donations') }}
    </x-slot>

    <div>
        <div class="flex justify-between mb-5">
            <strong>Manage donations</strong>
        </div>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        S.N.
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Image
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Label
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Donated By
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Requested On
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Approved
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                </tr>
                </thead>
                <tbody>
                @forelse($donations as $donation)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{$loop->iteration}}
                        </th>
                        <td class="px-6 py-4">
                            <a href="{{$donation->url}}" target="_blank">
                                <img width="40" height="40" src="{{$donation->url}}" alt="{{$donation->label->name}}">
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            {{$donation->label->name}}
                        </td>
                        <td class="px-6 py-4">
                            {{$donation->user->name}}
                        </td>
                        <td class="px-6 py-4">
                            {{$donation->created_at}}
                        </td>
                        <td class="px-6 py-4">
                            <span
                                class="bg-{{$donation->status ? 'green' : 'gray' }}-800 text-white px-3 py-1 rounded">{{$donation->status ? 'Yes' : 'No'}}</span>
                        </td>
                        <td class="px-6 py-4">
                            @if(!$donation->status)
                                <a href="{{route('admin.donations.edit',['donation'=>$donation->id])}}"
                                   class="bg-gray-800 text-white px-4 py-1.5 rounded">Add to Warehouse</a>
                            @else
                                <button
                                    class="bg-gray-800 text-white px-4 py-1 rounded">Not Available
                                </button>
                            @endif
                            <form onsubmit="return confirm('Are you sure you want to delete this donation?')"
                                  action="{{route('admin.donations.destroy',['donation'=>$donation->id])}}"
                                  method="post"
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
                            No donations found
                        </th>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="my-3">
            {{$donations->links()}}
        </div>
    </div>
</x-app-layout>

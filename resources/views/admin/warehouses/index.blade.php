<x-app-layout>

    <x-slot name="title">
        {{ __('Manage warehouses') }}
    </x-slot>

    <div>
        <div class="flex justify-between mb-5">
            <strong>Manage warehouses</strong>
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
                        Detected Label
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Donated By
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Weight
                    </th>
                </tr>
                </thead>
                <tbody>
                @forelse($warehouses as $warehouse)
                    <tr class="bg-gray-50 border-b ">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{$loop->iteration}}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            <a target="_blank" href="{{$warehouse->url}}">
                                <img width="50" height="50" src="{{$warehouse->url}}" alt="Donation">
                            </a>
                        </th>
                        <td class="px-6 py-4">
                            {{$warehouse->label->name}}
                        </td>
                        <td class="px-6 py-4">
                            {{$warehouse->user->name}}
                        </td>
                        <td class="px-6 py-4">
                            {{$warehouse->weight}} gm
                        </td>
                    </tr>
                @empty
                    <tr class="bg-gray-50 border-b ">
                        <th colspan="6" scope="row"
                            class="text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            No items found
                        </th>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="my-3">
            {{$warehouses->links()}}
        </div>
    </div>
</x-app-layout>

<x-app-layout>

    <x-slot name="title">
        {{ __('Manage labels') }}
    </x-slot>

    <div>
        <div class="flex justify-between mb-5">
            <strong>Manage labels</strong>
            <a href="{{route('admin.labels.create')}}" class="bg-gray-800 text-white px-4 py-1 rounded block">Add
                label</a>
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
                        Available Quantity
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                </tr>
                </thead>
                <tbody>
                @forelse($labels as $label)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{$loop->iteration}}
                        </th>
                        <td class="px-6 py-4">
                            {{$label->name}}
                        </td>
                        <td class="px-6 py-4">
                            {{$label->warehouses()->sum('weight')}} gm
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{route('admin.usages.index',['label'=>$label->id])}}"
                               class="bg-blue-800 text-white px-4 py-1.5 rounded">Usages</a>
                            <a href="{{route('admin.labels.edit',['label'=>$label->id])}}"
                               class="bg-gray-800 text-white px-4 py-1.5 rounded">Edit</a>
                            <form onsubmit="return confirm('Are you sure you want to delete this label?')"
                                  action="{{route('admin.labels.destroy',['label'=>$label->id])}}" method="post"
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
                            No labels found
                        </th>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="my-3">
            {{$labels->links()}}
        </div>
    </div>
</x-app-layout>

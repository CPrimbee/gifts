<div>
    @php
        /** @var \App\Models\Item $item */
    @endphp
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="flex sm:items-end sm:justify-between">
            <x-native-select
                label="Quantity"
                :options="[10,25,50,100]"
                wire:model.debounce.250ms="quantity"
            />
            <livewire:item.create />
        </div>
        <div class="flow-root mt-8">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">#</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Nome</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Categoria</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Quantidade</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Status</th>
                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                    <span class="sr-only">Editar</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($items as $item)
                                    <tr>
                                        <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6">{{ $item->id }}</td>
                                        <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $item->name }}</td>
                                        <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $item->category->name }}</td>
                                        <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $item->quantity }}</td>
                                        <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $item->is_active }}</td>
                                        <td class="relative py-4 pl-3 pr-4 text-sm font-medium text-right whitespace-nowrap sm:pr-6">
                                            <x-button.circle primary
                                                    icon="pencil"
                                                    wire:click="update({{$item->id}})"
                                            />
                                            <x-button.circle negative
                                                            icon="trash"
                                                            wire:click="delete({{$item->id}})"
                                            />
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{ $items->links() }}
        <livewire:item.update />
        <livewire:item.delete />
    </div>
</div>

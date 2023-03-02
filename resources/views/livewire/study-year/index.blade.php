<div>
    <br>
    <div class="flex justify-between">
        <div class='w-full md:w-1/6 px-3 mb-6'>
            <input
                class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500'
                wire:model="search" id='grid-text-1' type='text' placeholder='Search' required>
        </div>
        <div class='w-full md:w-1/6 px-3 mb-6 text-end'>
            <button
                class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 mt-4 sm:mt-0 px-6 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded">
                <a href="{{ route('categories.create') }}" class="text-sm font-medium leading-none text-white">Add
                    new</a>
            </button>
        </div>
    </div>

    <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5 flex">
        <div style="width: 100%">
            <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Name</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Start Date</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">End Date</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                    @foreach ($data as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                                <div class="text-sm">
                                    <div class="text-gray-400">{{ $item->name ?? 'N/A' }}</div>
                                </div>
                            </td>
                            <td class="px-6 py-4">{{ $item->start_date ?? 'N/A' }}</td>
                            <td class="px-6 py-4">{{ $item->end_date }}</td>
                            <td class="px-6 py-4">
                                <div class="flex gap-4">
                                    <a x-data="{ tooltip: 'Delete' }" wire:click="onDelete({{ $item->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="h-6 w-6"
                                            x-tooltip="tooltip">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </a>
                                    <a x-data="{ tooltip: 'Edite' }" wire:click="onEdit({{ $item->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="h-6 w-6"
                                            x-tooltip="tooltip">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="my-5 w-60">{{ $data->links() }}</div>
        </div>
        <div style="width: 100%" class="justify-center">
            <div class="flex flex-col justify-center">
                <input type="hidden" wire:model="class_room_id">
                <div class='w-full md:w-1/2 px-3 mb-6'>
                    <label>Name</label>
                    <input wire:model='name'
                        class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500'
                        id='grid-text-1' type='text' placeholder='name' name="name" required>
                </div>
                <div class='w-full md:w-1/2 px-3 mb-6'>
                    <label>Start Date</label>
                    <input wire:model='start_date'
                        class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500'
                        id='grid-text-1' type='date' placeholder='start_date' name="start_date" required>
                </div>
                <div class='w-full md:w-1/2 px-3 mb-6'>
                    <label>Name</label>
                    <input wire:model='end_date'
                        class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500'
                        id='grid-text-1' type='date' placeholder='end_date' name="end_date" required>
                </div>
                <div class='w-full md:w-1/2 px-3 mb-6'>
                    <button wire:click="onSave()"
                        class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 mt-4 sm:mt-0 px-6 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded">
                        <p class="text-sm font-medium leading-none text-white">Save</p>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<x-AdminComp.layout-admin>
    <x-AdminComp.table-style>
        <x-slot:buttonslot>
            <button type="button" class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                </svg>
                Add Grade
            </button>
        </x-slot:buttonslot>
        <x-slot:header>
            <th class="py-3 px-4 text-left">Grade ID</th>
            <th class="py-3 px-4 text-left">Name</th>
            <th class="py-3 px-4 text-left">Department</th>
            <th class="py-3 px-4 text-left">Student List</th>
            <th class="py-3 px-4 text-left font-semibold">Actions</th>

        </x-slot:header>
        <x-slot:body>
            @foreach ($grades as $grade)
            <tr class="bg-gray-100 hover:bg-gray-200 border-b">
                <td class="py-3 px-4">{{$grade["id"]}}</td>
                <td class="py-3 px-4">{{$grade["name"]}}</td>
                <td class="py-3 px-4">{{ $grade->department ? $grade->department->name : 'N/A' }}</td>
                <td class="py-3 px-4">
                    @foreach ($grade->students as $student)
                    <ul>
                        <li>{{$student->name}}</li>
                    </ul>
                    @endforeach
                </td>
                <td class="py-3 px-4 text-gray-700 flex items-center gap-x-2">
                    <img src="{{ asset('images/eye.svg') }}" alt="View" class="w-6 h-6" class="">
                    <img src="{{ asset('images/edit.svg') }}" alt="Edit" class="w-6 h-6">
                    <img src="{{ asset('images/trash.svg') }}" alt="trash" class="w-6 h-6">
                </td>
              </tr>
            @endforeach
        </x-slot:body>
    </x-AdminComp.table-style>
</x-AdminComp.layout-admin>

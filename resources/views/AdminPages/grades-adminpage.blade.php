<x-AdminComp.layout-admin>
    <x-AdminComp.table-style>
        <x-slot:buttontitle>
            Add Grade
        </x-slot:buttontitle>
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

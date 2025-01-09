<x-AdminComp.layout-admin>
    <x-AdminComp.table-style>
        <x-slot:buttontitle>
            Add Student
        </x-slot:buttontitle>
        <x-slot:header>
                    <th class="py-3 px-4 text-left font-semibold">No</th>
                    <th class="py-3 px-4 text-left font-semibold">Name</th>
                    <th class="py-3 px-4 text-left font-semibold">Grade</th>
                    <th class="py-3 px-4 text-left font-semibold">Department</th>
                    <th class="py-3 px-4 text-left font-semibold">Email</th>
                    <th class="py-3 px-4 text-left font-semibold">Address</th>
                    <th class="py-3 px-4 text-left font-semibold">Actions</th>
        </x-slot:header>
        <x-slot:body>
            @foreach ($students as $student)
                    <tr class="bg-gray-100 hover:bg-gray-200 border-b">
                        <td class="py-3 px-4 text-gray-700">{{$loop->iteration}}</td>
                        <td class="py-3 px-4 text-gray-700">{{$student->name}}</td>
                        <td class="py-3 px-4 text-gray-700">
                            {{ $student->grade ? $student->grade->name : 'N/A' }}
                        </td>
                        <td class="py-3 px-4 text-gray-700">
                            {{ $student->grade->department ? $student->grade->department->name : 'N/A' }}
                        </td>
                        <td class="py-3 px-4 text-gray-700">{{$student->email}}</td>
                        <td class="py-3 px-4 text-gray-700">{{$student->address}}</td>
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

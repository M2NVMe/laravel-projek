<x-AdminComp.layout-admin>
    <x-AdminComp.table-style>
        <x-slot:buttontitle>
            Add Department
        </x-slot:buttontitle>
        <x-slot:header>
            <th class="py-3 px-4 text-left">Department ID</th>
              <th class="py-3 px-4 text-left">Name</th>
              <th class="py-3 px-4 text-left">Description</th>
              <th class="py-3 px-4 text-left font-semibold">Actions</th>
        </x-slot:header>
        <x-slot:body>
            @foreach ($departments as $dept)
            <tr class="bg-gray-100 hover:bg-gray-200 border-b">
                <td class="py-3 px-4">{{$dept["id"]}}</td>
                <td class="py-3 px-4">{{$dept["name"]}}</td>
                <td class="py-3 px-4">{{$dept["description"]}}</td>
                <td class="py-3 px-4 text-gray-700 flex items-center gap-x-2">
                    <img src="{{ asset('images/eye.svg') }}" alt="View" class="w-6 h-6" class="">
                    <img src="{{ asset('images/edit.svg') }}" alt="Edit" class="w-6 h-6">
                    <img src="{{ asset('images/trash.svg') }}" alt="trash" class="w-6 h-6">
            </td>
                {{-- <td class="py-3 px-4">
                    @foreach ($grade->students as $student)
                    <ul>
                        <li>{{$student->name}}</li>
                    </ul>
                    @endforeach
                </td> --}}
              </tr>
            @endforeach
        </x-slot:body>
    </x-AdminComp.table-style>
</x-AdminComp.layout-admin>

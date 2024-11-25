<x-layout-admin>
    <div class="p-12">
        <div class="flex mx-4 my-2">
            <button class="bg-blue-700 text-white rounded-md px-4 py-2 hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-400 flex items-center gap-x-2">
                <img src="{{ asset('images/plus.svg') }}" alt="" class="w-4 h-4 ">
                Add Student
            </button>
        </div>
        <table class="min-w-full bg-white rounded-lg shadow-lg">
            <thead class="bg-gray-200 text-black">
                <tr>
                    <th class="py-3 px-4 text-left font-semibold">No</th>
                    <th class="py-3 px-4 text-left font-semibold">Name</th>
                    <th class="py-3 px-4 text-left font-semibold">Grade</th>
                    <th class="py-3 px-4 text-left font-semibold">Department</th>
                    <th class="py-3 px-4 text-left font-semibold">Email</th>
                    <th class="py-3 px-4 text-left font-semibold">Address</th>
                    <th class="py-3 px-4 text-left font-semibold">Action</th>
                </tr>
            </thead>
            <tbody>
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
            </tbody>
        </table>
    </div>
</x-layout-admin>

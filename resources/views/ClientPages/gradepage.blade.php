<x-ClientComp.layout>
    <x-slot:dokumentitle>{{$title}}</x-slot>
    <x-slot:title>{{$title}}</x-slot>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded-lg shadow-lg">
          <thead class="bg-gray-800 text-white">
            <tr>
              <th class="py-3 px-4 text-left">Grade ID</th>
              <th class="py-3 px-4 text-left">Name</th>
              <th class="py-3 px-4 text-left">Department</th>
              <th class="py-3 px-4 text-left">Student List</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($grades as $grade)
            <tr class="bg-gray-300 border-b-2 border-gray-800">
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
              </tr>
            @endforeach
            <!-- Additional rows can go here -->
          </tbody>
        </table>
      </div>
</x-ClientComp.layout>

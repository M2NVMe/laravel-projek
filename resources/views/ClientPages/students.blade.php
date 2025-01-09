<x-ClientComp.layout>
    <x-slot:dokumentitle>{{$title}}</x-slot>
    <x-slot:title>{{$title}}</x-slot>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded-lg shadow-lg">
          <thead class="bg-gray-800 text-white">
            <tr>
              <th class="py-3 px-4 text-left">No</th>
              <th class="py-3 px-4 text-left">Nama</th>
              <th class="py-3 px-4 text-left">Grade</th>
              <th class="py-3 px-4 text-left">Department</th>
              <th class="py-3 px-4 text-left">Email</th>
              <th class="py-3 px-4 text-left">Address</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($students as $student)
            <tr class="bg-gray-300 border-b-2 border-gray-800">
                <td class="py-3 px-4">{{$loop->iteration}}</td>
                <td class="py-3 px-4">{{$student->name}}</td>
                <td class="py-3 px-4">{{ $student->grade ? $student->grade->name : 'N/A' }}</td>
                <td class="py-3 px-4">{{ $student->grade->department ? $student->grade->department->name : 'N/A' }}</td>
                <td class="py-3 px-4">{{$student->email}}</td>
                <td class="py-3 px-4">{{$student->address}}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
</x-ClientComp.layout>

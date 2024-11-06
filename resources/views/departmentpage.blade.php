<x-layout>
    <x-slot:dokumentitle>{{$title}}</x-slot>
    <x-slot:title>{{$title}}</x-slot>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded-lg shadow-lg">
          <thead class="bg-gray-800 text-white">
            <tr>
              <th class="py-3 px-4 text-left">Department ID</th>
              <th class="py-3 px-4 text-left">Name</th>
              <th class="py-3 px-4 text-left">Description</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($departments as $dept)
            <tr class="bg-gray-300 border-b-2 border-gray-800">
                <td class="py-3 px-4">{{$dept["id"]}}</td>
                <td class="py-3 px-4">{{$dept["name"]}}</td>
                <td class="py-3 px-4">{{$dept["description"]}}</td>
                {{-- <td class="py-3 px-4">
                    @foreach ($grade->students as $student)
                    <ul>
                        <li>{{$student->name}}</li>
                    </ul>
                    @endforeach
                </td> --}}
              </tr>
            @endforeach
            <!-- Additional rows can go here -->
          </tbody>
        </table>
      </div>
</x-layout>

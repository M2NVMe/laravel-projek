<x-AdminComp.layout-admin>
    <x-AdminComp.table-style>
        <x-slot:buttonslot>
            <button onclick="window.location.href='/adminpage/departments/create';" type="button"
                class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true">
                    <path clip-rule="evenodd" fill-rule="evenodd"
                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                </svg>
                Add Department
            </button>
        </x-slot:buttonslot>
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
                <td class="py-3 px-4 flex space-x-4">
                    @if($dept->id)
                    <a href="/adminpage/departments/edit/{{ $dept->id }}">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1"
                                d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                        </svg>
                    </a>
                    <button id="deleteButton" data-id="{{ $dept->id }}"
                        class="text-red-600 hover:text-red-800">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1"
                                d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                        </svg>
                    </button>
                    @endif
                </td>
              </tr>
            @endforeach
            <!-- the modals. -->
            <div id="deleteModal"
                class="fixed inset-0 z-50 hidden flex justify-center items-center bg-gray-800 bg-opacity-50">
                <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm w-full">
                    <h3 class="text-lg font-semibold text-gray-800">Apakah anda yakin untuk menghapus data jurusan?</h3>
                    <p class="text-sm text-gray-600 mt-2">Data tidak bisa dikembalikan setelah dihapus.</p>
                    <div class="mt-4 flex justify-end space-x-4">
                        <button id="cancelDelete"
                            class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400">Batal</button>
                        <button id="confirmDelete"
                            class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">Hapus</button>
                    </div>
                </div>
            </div>

            <!-- Hidden form for delete action -->
            <form id="deleteForm" method="POST" style="display:none;">
                @csrf
                @method('DELETE')
            </form>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    // Delete Modal
                    const deleteModal = document.getElementById('deleteModal');
                    const confirmDeleteButton = document.getElementById('confirmDelete');
                    const cancelDeleteButton = document.getElementById('cancelDelete');
                    const deleteForm = document.getElementById('deleteForm');
                    let departmentIdToDelete = null;

                    // Safely handle delete button clicks
                    if (deleteModal && confirmDeleteButton && cancelDeleteButton && deleteForm) {
                        document.querySelectorAll('#deleteButton').forEach(button => {
                            button.addEventListener('click', function() {
                                departmentIdToDelete = button.getAttribute('data-id');
                                if (departmentIdToDelete) {
                                    deleteModal.classList.remove('hidden');
                                }
                            });
                        });

                        confirmDeleteButton.addEventListener('click', function() {
                            if (departmentIdToDelete) {
                                deleteForm.action = `/adminpage/departments/delete/${departmentIdToDelete}`;
                                deleteForm.submit();
                            }
                        });

                        cancelDeleteButton.addEventListener('click', function() {
                            deleteModal.classList.add('hidden');
                        });
                    }
                });
            </script>
        </x-slot:body>
    </x-AdminComp.table-style>
</x-AdminComp.layout-admin>

<x-AdminComp.layout-admin>
    <x-AdminComp.table-style>
        <x-slot:buttonslot>
            <button onclick="window.location.href='/adminpage/students/create';" type="button"
                class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true">
                    <path clip-rule="evenodd" fill-rule="evenodd"
                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                </svg>
                Add Student
            </button>
        </x-slot:buttonslot>
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
                    <td class="py-3 px-4 text-gray-700">{{ $loop->iteration }}</td>
                    <td class="py-3 px-4 text-gray-700">{{ $student->name ?? 'N/A' }}</td>
                    <td class="py-3 px-4 text-gray-700">
                        {{ $student->grade->name ?? 'N/A' }}
                    </td>
                    <td class="py-3 px-4 text-gray-700">
                        {{ optional(optional($student->grade)->department)->name ?? 'N/A' }}
                    </td>
                    <td class="py-3 px-4 text-gray-700">{{ $student->email ?? 'N/A' }}</td>
                    <td class="py-3 px-4 text-gray-700">{{ $student->address ?? 'N/A' }}</td>
                    <td class="py-3 px-4 flex space-x-4">
                        <button id="modalDetail" class="modalDetailBtn"
                            data-name="{{ $student->name ?? 'N/A' }}"
                            data-grade="{{ optional($student->grade)->name ?? 'N/A' }}"
                            data-email="{{ $student->email ?? 'N/A' }}"
                            data-department="{{ optional(optional($student->grade)->department)->name ?? 'N/A' }}"
                            data-address="{{ $student->address ?? 'N/A' }}"
                            data-modal-target="readStudentModal"
                            data-modal-toggle="readStudentModal"
                            studentId="{{ $student->id }}"
                            type="button">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-width="1"
                                    d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                <path stroke="currentColor" stroke-width="1" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </button>
                        @if($student->id)
                        <a href="/adminpage/students/edit/{{ $student->id }}">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1"
                                    d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                            </svg>
                        </a>
                        <button id="deleteButton" data-id="{{ $student->id }}"
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

            <!-- Modal for reading student details -->
            <div id="readStudentModal" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                <div class="relative p-4 w-full max-w-xl h-full md:h-auto">
                    <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                        <dl>
                            <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Name</dt>
                            <dd id="modalName" class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400"></dd>

                            <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Grade</dt>
                            <dd id="modalGrade" class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400"></dd>

                            <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Email</dt>
                            <dd id="modalEmail" class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400"></dd>

                            <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Department</dt>
                            <dd id="modalDepartment" class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400"></dd>

                            <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Address</dt>
                            <dd id="modalAddress" class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400"></dd>
                        </dl>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center space-x-3 sm:space-x-4">
                                <a id="modalEditButton" type="button" href=""
                                    class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                    <svg aria-hidden="true" class="mr-1 -ml-1 w-5 h-5" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                                    </svg>
                                    Edit
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Delete confirmation modal -->
            <div id="deleteModal"
                class="fixed inset-0 z-50 hidden flex justify-center items-center bg-gray-800 bg-opacity-50">
                <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm w-full">
                    <h3 class="text-lg font-semibold text-gray-800">Apakah anda yakin untuk menghapus data siswa?</h3>
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
                    // Detail Modal
                    const modalDetailBtns = document.querySelectorAll('.modalDetailBtn');
                    const modal = document.getElementById('readStudentModal');
                    const modalElements = {
                        name: document.getElementById('modalName'),
                        grade: document.getElementById('modalGrade'),
                        email: document.getElementById('modalEmail'),
                        department: document.getElementById('modalDepartment'),
                        address: document.getElementById('modalAddress'),
                        editButton: document.getElementById('modalEditButton')
                    };

                    if (modal && modalDetailBtns) {
                        modalDetailBtns.forEach(button => {
                            button.addEventListener('click', function() {
                                const studentId = button.getAttribute('studentId');

                                // Safely update modal content
                                Object.entries(modalElements).forEach(([key, element]) => {
                                    if (element && key !== 'editButton') {
                                        element.textContent = button.getAttribute(`data-${key}`) || 'N/A';
                                    }
                                });

                                // Safely update edit button href
                                if (modalElements.editButton && studentId) {
                                    modalElements.editButton.href = `/adminpage/students/edit/${studentId}`;
                                }

                                modal.classList.remove('hidden');
                            });
                        });
                    }

                    // Delete Modal
                    const deleteModal = document.getElementById('deleteModal');
                    const confirmDeleteButton = document.getElementById('confirmDelete');
                    const cancelDeleteButton = document.getElementById('cancelDelete');
                    const deleteForm = document.getElementById('deleteForm');
                    let studentIdToDelete = null;

                    // Safely handle delete button clicks
                    document.querySelectorAll('#deleteButton').forEach(button => {
                        button.addEventListener('click', function() {
                            studentIdToDelete = button.getAttribute('data-id');
                            if (deleteModal && studentIdToDelete) {
                                deleteModal.classList.remove('hidden');
                            }
                        });
                    });

                    // Safe delete confirmation
                    if (confirmDeleteButton && deleteForm) {
                        confirmDeleteButton.addEventListener('click', function() {
                            if (studentIdToDelete) {
                                deleteForm.action = `/adminpage/students/delete/${studentIdToDelete}`;
                                deleteForm.submit();
                            }
                        });
                    }

                    // Safe cancel action
                    if (cancelDeleteButton && deleteModal) {
                        cancelDeleteButton.addEventListener('click', function() {
                            deleteModal.classList.add('hidden');
                        });
                    }
                });
            </script>
        </x-slot:body>
    </x-AdminComp.table-style>
</x-AdminComp.layout-admin>

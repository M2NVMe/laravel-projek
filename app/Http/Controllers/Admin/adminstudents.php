<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Grade;
use App\Models\Student;

class AdminStudents extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('AdminPages.students.siswa-adminpage', [
            'students' => Student::with(['grade', 'department'])->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('AdminPages.student-creation', [
            'grades' => Grade::all(),
            'departments' => Department::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'grade_id' => 'required|exists:grades,id',
            'department_id' => 'required|exists:departments,id',
            'email' => 'required|email|unique:students,email',
            'address' => 'required|string|max:255',
        ]);

        Student::create($validated);

        return redirect('/adminpage/students')->with('success', 'Student created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    $student = Student::findOrFail($id);
    $grades = Grade::all();
    $departments = Department::all();

    return view('AdminPages.students.student-edit', [
        'student' => $student,
        'grades' => $grades,
        'departments' => $departments,
    ]);
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'grade_id' => 'required|exists:grades,id',
            'department_id' => 'required|exists:departments,id',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
        ]);

        $student = Student::findOrFail($id);
        $student->update([
            'name' => $validated['name'],
            'grade_id' => $validated['grade_id'],
            'department_id' => $validated['department_id'],
            'email' => $validated['email'],
            'address' => $validated['address']
        ]);

        return redirect('/adminpage/students')->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect('/adminpage/students')->with('success', 'Student deleted successfully.');
    }
}

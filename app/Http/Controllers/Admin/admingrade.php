<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Grade;
use Illuminate\Http\Request;

class admingrade extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('AdminPages/grades/grades-adminpage', [
            'grades' => Grade::all()->load('students')->load('department'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('AdminPages.grades.grade-creation', [
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
            'department_id' => 'required|string|exists:departments,id'
        ]);

        Grade::create($validated);

        return redirect('/adminpage/grades')->with('success', 'Grade created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $grade = Grade::findOrFail($id);
        $departments = Department::all();
        return view('AdminPages.grades.grade-edit', [
            'grade' => $grade,
            'departments' => $departments
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'department_id' => 'required|string|exists:departments,id'
        ]);
        $grade = Grade::findOrFail($id);
        $grade->update([
            'name' => $validated['name'],
            'department_id' => $validated['department_id']
        ]);
        return redirect('/adminpage/grades')->with('success', 'Grade updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $grade = Grade::findOrFail($id);
        $grade->delete();

        return redirect('/adminpage/grades')->with('success', 'Grade deleted successfully.');
    }
}

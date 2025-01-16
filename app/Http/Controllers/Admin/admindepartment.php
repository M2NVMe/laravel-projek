<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class admindepartment extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('AdminPages/departments/departments-adminpage', [
            'departments' => Department::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('AdminPages.departments.departments-creation', [
            'departments' => Department::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255'
        ]);

        Department::create($validated);

        return redirect('/adminpage/departments')->with('success', 'Grade created successfully');
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
        $department = Department::findOrFail($id);
        return view('AdminPages.departments.departments-edit', [
            'departments' => $department
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255'
        ]);
        $department = Department::findOrFail($id);
        $department->update([
            'name' => $validated['name'],
            'description' => $validated['description']
        ]);
        return redirect('/adminpage/departments')->with('success', 'Grade created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return redirect('/adminpage/departments')->with('success', 'Department deleted successfully.');
    }
}

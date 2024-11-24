<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Grade;
use App\Models\Student;
use Illuminate\Http\Request;

class adminpage extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('adminpage');
    }

    public function index2() {
        return view('siswa-adminpage', [
            'students' => Student::all()->load('grade')->load('department')
        ]);
    }

    public function index3() {
        return view('grades-adminpage', [
            'grades' => Grade::all()->load('students')->load('department'),
        ]);
    }

    public function index4() {
        return view('departments-adminpage', [
            'departments' => Department::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

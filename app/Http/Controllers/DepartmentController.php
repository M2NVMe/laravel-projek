<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index() {
        return view('ClientPages/departmentpage', [
            'title' => 'Department',
            'departments' => Department::all()
        ] );
    }
}

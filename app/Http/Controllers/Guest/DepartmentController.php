<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Department;

class DepartmentController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        return view('department_template');
    }

    public function show($initial){
        $department = Department::firstWhere('initial', $initial);
        if (!$department) {
            return abort(404);
        }
        return view('department/department', compact('department'));
    }
}

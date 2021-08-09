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
        $arrayDept = [
            // EMTI
            'nonDept' => Department::firstWhere('initial', 'Non-Dept') ?? null,
            'hrd' => Department::firstWhere('initial', 'HRD') ?? null,
            'advo' => Department::firstWhere('initial', 'Advo') ?? null,
            'se' => Department::firstWhere('initial', 'SE') ?? null,
            'rnd' => Department::firstWhere('initial', 'RnD') ?? null,
            'rnc' => Department::firstWhere('initial', 'RnC') ?? null,
            'entre' => Department::firstWhere('initial', 'Entre') ?? null,
            // BPMTI
            'nonKomisi' => Department::firstWhere('name', 'BPMTI') ?? null,
            'komisi1' => Department::firstWhere('name', 'Komisi 1') ?? null,
            'komisi2' => Department::firstWhere('name', 'Komisi 2') ?? null,
            'komisi3' => Department::firstWhere('name', 'Komisi 3') ?? null
        ];
        // return view('department_template', compact('arrayDept'));
        return view('department.experimental_department_template', compact('arrayDept'));
    }

    public function show($initial){
        $department = Department::firstWhere('initial', $initial);
        if (!$department) {
            return abort(404);
        }
        return view('department/department', compact('department'));
    }
}

<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Department;

class DepartmentController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /**
         * NOTE: nonDept included:
         *  - Ketua dan Wakil ketua EMTI
         *  - Koordinator dan Sekretaris Jenderal KBMTI
         */

        $arrayDept = [
            // EMTI
            'kahim_wakahim' => Department::firstWhere('initial', 'Kahim_dan_Wakahim') ?? null,
            'sekben' => Department::firstWhere('initial', 'Sekben') ?? null,
            'internal' => Department::firstWhere('initial', 'Internal') ?? null,
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

        // Group decision
        $group = request()->query('group') ?? "emti"; // Default to emti
        if ($group == "emti") {
            $subGroup = request()->query('subGroup') ?? "kahim_wakahim"; // Default emti is kahim_wakahim
        } else {
            $subGroup = request()->query('subGroup') ?? "nonKomisi"; // Default to kahim_wakahim
        }
        $arrayDept[$subGroup]->isVisible = true;
        // Testing
        // return response()->json([
        //     "arrayDept" => $arrayDept
        // ]);

        // return view('department_template', compact('arrayDept'));
        return view('department.department_template', compact('arrayDept', 'group', 'subGroup'));
    }
}

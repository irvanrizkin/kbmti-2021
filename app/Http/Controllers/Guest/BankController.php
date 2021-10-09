<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Matkuliah;
use Illuminate\Http\Request;

class BankController extends Controller
{
    /**
     *@return \Illuminate\Contracts\Support\Renderable
     */
    public function index (){
        $matkuls = Matkuliah::where('semester', 1)->get();
        $data = [
            'matkuls' => $matkuls,
        ];
        return response()->json($matkuls[1]->matkuliahBankSoalMateris->groupBy('type')->count());
    }

    public function show ($id = 1){
        $matkuls = Matkuliah::where('semester', $id)->get();
        $data = [
            'matkuls' => $matkuls,
            'materis' => collect(),
        ];
        return view('bank_materi.index')->with($data);
    }

    public function getWithMateri($semester, $matkul) {
        $matkuls = Matkuliah::where('semester', $semester)->get();
        $materis = Matkuliah::find($matkul)->matkuliahBankSoalMateris->groupBy('type');
        $data = [
            'matkuls' => $matkuls,
            'materis' => $materis,
        ];
        return view('bank_materi.index')->with($data);
    }

    public function dropdownRedirect (Request $request) {
        return redirect()->action(
            [$this::class, 'show'], ['bank_materi' => $request->semester]
        );
    }
}

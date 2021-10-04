<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Oprec;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PendaftaranStaffMuda extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('temp_pendaftaran_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pendaftars = Oprec::all();

        return view('admin.temp.pendaftaran-staff-muda.index', compact('pendaftars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Not necessarily exist
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Not necessarily exist
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($oprec_id)
    {
        abort_if(Gate::denies('temp_pendaftaran_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $pendaftar = Oprec::find($oprec_id);

        return view('admin.temp.pendaftaran-staff-muda.show', compact('pendaftar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Oprec $oprec)
    {
        abort_if(Gate::denies('temp_pendaftaran_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // return view('admin.temp.pendaftaran-staff-muda.edit', compact('pendaftars'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $oprec = Oprec::where('id', $id);
        $oprec->update([
            "is_interviewed" => $request->input('is_interviewed'),
        ]);

        return redirect()->route('admin.temp.pendaftaran-staff-muda.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Not necessarily exist
    }
}

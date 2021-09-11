<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMatkuliahRequest;
use App\Http\Requests\StoreMatkuliahRequest;
use App\Http\Requests\UpdateMatkuliahRequest;
use App\Models\Matkuliah;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MatkuliahController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('matkuliah_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $matkuliahs = Matkuliah::all();

        return view('admin.matkuliahs.index', compact('matkuliahs'));
    }

    public function create()
    {
        abort_if(Gate::denies('matkuliah_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.matkuliahs.create');
    }

    public function store(StoreMatkuliahRequest $request)
    {
        $matkuliah = Matkuliah::create($request->all());

        return redirect()->route('admin.matkuliahs.index');
    }

    public function edit(Matkuliah $matkuliah)
    {
        abort_if(Gate::denies('matkuliah_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.matkuliahs.edit', compact('matkuliah'));
    }

    public function update(UpdateMatkuliahRequest $request, Matkuliah $matkuliah)
    {
        $matkuliah->update($request->all());

        return redirect()->route('admin.matkuliahs.index');
    }

    public function show(Matkuliah $matkuliah)
    {
        abort_if(Gate::denies('matkuliah_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $matkuliah->load('matkuliahBankSoalMateris');

        return view('admin.matkuliahs.show', compact('matkuliah'));
    }

    public function destroy(Matkuliah $matkuliah)
    {
        abort_if(Gate::denies('matkuliah_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $matkuliah->delete();

        return back();
    }

    public function massDestroy(MassDestroyMatkuliahRequest $request)
    {
        Matkuliah::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

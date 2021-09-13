<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBankSoalMateriRequest;
use App\Http\Requests\StoreBankSoalMateriRequest;
use App\Http\Requests\UpdateBankSoalMateriRequest;
use App\Models\BankSoalMateri;
use App\Models\Matkuliah;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BankSoalMateriController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('bank_soal_materi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bankSoalMateris = BankSoalMateri::with(['matkuliah'])->get();

        return view('admin.bankSoalMateris.index', compact('bankSoalMateris'));
    }

    public function create()
    {
        abort_if(Gate::denies('bank_soal_materi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $matkuliahs = Matkuliah::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.bankSoalMateris.create', compact('matkuliahs'));
    }

    public function store(StoreBankSoalMateriRequest $request)
    {
        $bankSoalMateri = BankSoalMateri::create($request->all());

        return redirect()->route('admin.bank-soal-materis.index');
    }

    public function edit(BankSoalMateri $bankSoalMateri)
    {
        abort_if(Gate::denies('bank_soal_materi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $matkuliahs = Matkuliah::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $bankSoalMateri->load('matkuliah');

        return view('admin.bankSoalMateris.edit', compact('matkuliahs', 'bankSoalMateri'));
    }

    public function update(UpdateBankSoalMateriRequest $request, BankSoalMateri $bankSoalMateri)
    {
        $bankSoalMateri->update($request->all());

        return redirect()->route('admin.bank-soal-materis.index');
    }

    public function show(BankSoalMateri $bankSoalMateri)
    {
        abort_if(Gate::denies('bank_soal_materi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bankSoalMateri->load('matkuliah');

        return view('admin.bankSoalMateris.show', compact('bankSoalMateri'));
    }

    public function destroy(BankSoalMateri $bankSoalMateri)
    {
        abort_if(Gate::denies('bank_soal_materi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bankSoalMateri->delete();

        return back();
    }

    public function massDestroy(MassDestroyBankSoalMateriRequest $request)
    {
        BankSoalMateri::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

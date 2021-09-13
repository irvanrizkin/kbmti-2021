@extends('layouts.admin.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.bankSoalMateri.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.bank-soal-materi.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.bankSoalMateri.fields.id') }}
                        </th>
                        <td>
                            {{ $bankSoalMateri->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bankSoalMateri.fields.name') }}
                        </th>
                        <td>
                            {{ $bankSoalMateri->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bankSoalMateri.fields.link') }}
                        </th>
                        <td>
                            {{ $bankSoalMateri->link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bankSoalMateri.fields.matkuliah') }}
                        </th>
                        <td>
                            {{ $bankSoalMateri->matkuliah->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bankSoalMateri.fields.type') }}
                        </th>
                        <td>
                            {{ App\Models\BankSoalMateri::TYPE_SELECT[$bankSoalMateri->type] }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bankSoalMateri.fields.sub_type') }}
                        </th>
                        <td>
                            {{ App\Models\BankSoalMateri::SUB_TYPE_SELECT[$bankSoalMateri->sub_type] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.bank-soal-materi.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
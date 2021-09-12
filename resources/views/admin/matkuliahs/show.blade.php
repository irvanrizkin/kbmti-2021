@extends('layouts.admin.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.matkuliah.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.matkuliah.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.matkuliah.fields.id') }}
                        </th>
                        <td>
                            {{ $matkuliah->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matkuliah.fields.name') }}
                        </th>
                        <td>
                            {{ $matkuliah->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matkuliah.fields.description') }}
                        </th>
                        <td>
                            {{ $matkuliah->description }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.matkuliah.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#matkuliah_bank_soal_materis" role="tab" data-toggle="tab">
                {{ trans('cruds.bankSoalMateri.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="matkuliah_bank_soal_materis">
            @includeIf('admin.matkuliah.relationships.matkuliahBankSoalMateris', ['bankSoalMateris' => $matkuliah->matkuliahBankSoalMateris])
        </div>
    </div>
</div>

@endsection
@extends('layouts.admin.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Detail Pendaftar
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.temp.pendaftaran-staff-muda.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            Nama
                        </th>
                        <td>
                            {{ $pendaftar->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            NIM
                        </th>
                        <td>
                            {{ $pendaftar->nim }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Tempat Tanggal Lahir
                        </th>
                        <td>
                            {{ $pendaftar->tempat_lahir }} , {{ $pendaftar->tanggal_lahir }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Nomor Telepon dan Id LINE
                        </th>
                        <td>
                            <div class="ml-2">
                                <li>
                                    {{ $pendaftar->no_hp }}
                                </li>
                                <li>
                                    {{ $pendaftar->id_line }}
                                </li>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Pilihan
                        </th>
                        <td>
                            <div class="ml-2">
                                <li>
                                    {{ $pendaftar->pilihan1 }}
                                </li>
                                <li>
                                    {{ $pendaftar->pilihan2 }}
                                </li>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Status
                        </th>
                        <td>
                            <span class="badge rounded-pill bg-{{ $pendaftar->is_interviewed ? "success" : "danger" }}">{{ $pendaftar->is_interviewed ? "Sudah Wawancara" : "Belum Wawancara" }}</span>
                            <form action="{{ route('admin.temp.pendaftaran-staff-muda.update', [ $pendaftar->id ?? "" ]) }}" method="post" class="form-group">
                                @csrf
                                @method("PUT")
                                <select name="is_interviewed" id="is_interviewed" class="form-control">
                                    <option value="0">Belum diwawancara</option>
                                    <option value="1">Sudah diwawancara</option>
                                </select>
                                <button class="btn btn-danger" type="submit">
                                    {{ trans('global.save') }}
                                </button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.temp.pendaftaran-staff-muda.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
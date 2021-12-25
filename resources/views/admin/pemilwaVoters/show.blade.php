@extends('layouts.admin.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.pemilwaVoter.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pemilwa-voters.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.pemilwaVoter.fields.id') }}
                        </th>
                        <td>
                            {{ $pemilwaVoter->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pemilwaVoter.fields.nim') }}
                        </th>
                        <td>
                            {{ $pemilwaVoter->nim }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pemilwaVoter.fields.email') }}
                        </th>
                        <td>
                            {{ $pemilwaVoter->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pemilwaVoter.fields.token') }}
                        </th>
                        <td>
                            {{ $pemilwaVoter->token }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pemilwaVoter.fields.pemilwa_event') }}
                        </th>
                        <td>
                            {{ $pemilwaVoter->pemilwa_event->tahun ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pemilwa-voters.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
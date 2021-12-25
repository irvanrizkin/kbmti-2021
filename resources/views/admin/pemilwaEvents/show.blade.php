@extends('layouts.admin.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.pemilwaEvent.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pemilwa-events.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.pemilwaEvent.fields.id') }}
                        </th>
                        <td>
                            {{ $pemilwaEvent->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pemilwaEvent.fields.tahun') }}
                        </th>
                        <td>
                            {{ $pemilwaEvent->tahun }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pemilwaEvent.fields.is_active') }}
                        </th>
                        <td>
                            {{ App\Models\PemilwaEvent::IS_ACTIVE_SELECT[$pemilwaEvent->is_active] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pemilwa-events.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
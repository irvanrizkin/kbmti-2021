@extends('layouts.admin.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.department.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.departments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <div class="row">
                <div class="col-12 d-flex flex-column">
                    <h2>Logo</h2>
                    @if ($media = $department->getMediaPath())
                        {{-- {{ $media }} --}}
                        {{-- <img src="{{ "/storage/departments/" . $department->getMediaPath()->path }}" alt="" class="img-fluid">      --}}
                        <img src="{{ $media->getUrlPath() }}" alt="" class="img-fluid">     
                    @endif
                </div>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.department.fields.id') }}
                        </th>
                        <td>
                            {{ $department->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.department.fields.name') }}
                        </th>
                        <td>
                            {{ $department->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.department.fields.initial') }}
                        </th>
                        <td>
                            {{ $department->initial }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.department.fields.description') }}
                        </th>
                        <td>
                            {!! $department->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.department.fields.type') }}
                        </th>
                        <td>
                            {{ App\Models\Department::TYPE_SELECT[$department->type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.department.fields.sub_type') }}
                        </th>
                        <td>
                            {{ App\Models\Department::SUB_TYPE_SELECT[$department->sub_type] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.departments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
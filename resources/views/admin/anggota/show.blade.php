@extends('layouts.admin.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.anggotum.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.anggota.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <div class="row">
                <div class="col-12 d-flex flex-column">
                    <h2>Avatar</h2>
                    @if ($anggotum->getMediaPath?->path)
                        <img src="{{ "/storage/anggotas/" . $anggotum->getMediaPath->path }}" alt="" class="img-fluid">     
                    @endif
                </div>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.anggotum.fields.id') }}
                        </th>
                        <td>
                            {{ $anggotum->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.anggotum.fields.name') }}
                        </th>
                        <td>
                            {{ $anggotum->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.anggotum.fields.image') }}
                        </th>
                        <td>
                            @if($anggotum->image)
                                <a href="{{ $anggotum->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $anggotum->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.anggotum.fields.instagram_acc') }}
                        </th>
                        <td>
                            {{ $anggotum->instagram_acc }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.anggotum.fields.linkedin_acc') }}
                        </th>
                        <td>
                            {{ $anggotum->linkedin_acc }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.anggotum.fields.department') }}
                        </th>
                        <td>
                            {{ $anggotum->department->initial ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.anggota.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
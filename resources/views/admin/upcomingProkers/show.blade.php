@extends('layouts.admin.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.upcomingProker.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.upcoming-prokers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <div class="row">
                <div class="col-12 d-flex flex-column">
                    <h2>Avatar</h2>
                    @if ($media = $upcomingProker->getMediaPath())
                        <img src="{{ $media->getUrlPath() }}" alt="" class="img-fluid">     
                    @endif
                </div>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.upcomingProker.fields.id') }}
                        </th>
                        <td>
                            {{ $upcomingProker->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.upcomingProker.fields.name') }}
                        </th>
                        <td>
                            {{ $upcomingProker->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.upcomingProker.fields.caption') }}
                        </th>
                        <td>
                            {{ $upcomingProker->caption }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.upcomingProker.fields.description') }}
                        </th>
                        <td>
                            {{ $upcomingProker->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.upcomingProker.fields.is_active') }}
                        </th>
                        <td>
                            {{ App\Models\UpcomingProker::IS_ACTIVE_SELECT[$upcomingProker->is_active] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.upcoming-prokers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
@extends('layouts.admin.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.eventField.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.event-fields.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.eventField.fields.id') }}
                        </th>
                        <td>
                            {{ $eventField->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.eventField.fields.type') }}
                        </th>
                        <td>
                            {{ App\Models\EventField::TYPE_SELECT[$eventField->type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.eventField.fields.name') }}
                        </th>
                        <td>
                            {{ $eventField->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.eventField.fields.event') }}
                        </th>
                        <td>
                            {{ $eventField->event->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.event-fields.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
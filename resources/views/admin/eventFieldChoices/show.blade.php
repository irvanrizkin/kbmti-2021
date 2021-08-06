@extends('layouts.admin.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.eventFieldChoice.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.event-field-choices.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.eventFieldChoice.fields.id') }}
                        </th>
                        <td>
                            {{ $eventFieldChoice->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.eventFieldChoice.fields.choice') }}
                        </th>
                        <td>
                            {{ $eventFieldChoice->choice }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.eventFieldChoice.fields.event_field') }}
                        </th>
                        <td>
                            {{ $eventFieldChoice->event_field->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.event-field-choices.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
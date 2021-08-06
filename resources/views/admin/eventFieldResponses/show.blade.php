@extends('layouts.admin.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.eventFieldResponse.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.event-field-responses.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.eventFieldResponse.fields.id') }}
                        </th>
                        <td>
                            {{ $eventFieldResponse->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.eventFieldResponse.fields.response') }}
                        </th>
                        <td>
                            {{ $eventFieldResponse->response }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.eventFieldResponse.fields.event_registration') }}
                        </th>
                        <td>
                            {{ $eventFieldResponse->event_registration->dummy_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.eventFieldResponse.fields.event_field') }}
                        </th>
                        <td>
                            {{ $eventFieldResponse->event_field->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.event-field-responses.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
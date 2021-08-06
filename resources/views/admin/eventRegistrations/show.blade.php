@extends('layouts.admin.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.eventRegistration.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.event-registrations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.eventRegistration.fields.id') }}
                        </th>
                        <td>
                            {{ $eventRegistration->id }}
                        </td>
                    </tr>
                    @foreach ($eventRegistration->getEventField() as $item)
                    <tr>
                        <th>
                            {{ $item->name ?? "" }}
                        </th>
                        <td>
                        @if ( $item->name == "Pemberkasan" )
                            <a href="{{ route('admin.event-registrations.downloadPemberkasan', [ 'itemPath' => $item->getPemberkasanAttribute($item->id)[0]->response ]) }}" target="blank">
                                Download Here
                            </a>    
                        @else
                                {{ $item->response ?? "" }}
                        @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.event-registrations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
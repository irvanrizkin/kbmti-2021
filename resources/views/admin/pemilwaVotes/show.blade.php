@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.vote.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.votes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.vote.fields.id') }}
                        </th>
                        <td>
                            {{ $vote->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vote.fields.pemilwa_event') }}
                        </th>
                        <td>
                            {{ $vote->pemilwa_event->tahun ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vote.fields.pemilwa_candidate') }}
                        </th>
                        <td>
                            {{ $vote->pemilwa_candidate->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.votes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
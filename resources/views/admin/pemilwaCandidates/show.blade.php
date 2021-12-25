@extends('layouts.admin.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.pemilwaCandidate.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pemilwa-candidates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <div class="row">
                <div class="col-12 d-flex flex-column">
                    <h2>Image</h2>
                    @if ($media = $pemilwaCandidate->getMediaPath())
                        <img src="{{ $media->getUrlPath() }}" alt="" class="img-fluid">     
                    @endif
                </div>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.pemilwaCandidate.fields.id') }}
                        </th>
                        <td>
                            {{ $pemilwaCandidate->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pemilwaCandidate.fields.name') }}
                        </th>
                        <td>
                            {{ $pemilwaCandidate->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pemilwaCandidate.fields.no_urut') }}
                        </th>
                        <td>
                            {{ $pemilwaCandidate->no_urut }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pemilwaCandidate.fields.type') }}
                        </th>
                        <td>
                            {{ App\Models\PemilwaCandidate::TYPE_SELECT[$pemilwaCandidate->type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pemilwaCandidate.fields.pemilwa_event') }}
                        </th>
                        <td>
                            {{ $pemilwaCandidate->pemilwa_event->tahun ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pemilwa-candidates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
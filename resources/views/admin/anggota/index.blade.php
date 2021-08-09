@extends('layouts.admin.admin')
@section('content')
@can('anggotum_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.anggota.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.anggotum.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.anggotum.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Anggotum">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.anggotum.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.anggotum.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.anggotum.fields.image') }}
                        </th>
                        <th>
                            {{ trans('cruds.anggotum.fields.instagram_acc') }}
                        </th>
                        <th>
                            {{ trans('cruds.anggotum.fields.linkedin_acc') }}
                        </th>
                        <th>
                            {{ trans('cruds.anggotum.fields.department') }}
                        </th>
                        <th>
                            {{ trans('cruds.anggotum.fields.type') }}
                        </th>
                        {{-- <th>
                            {{ trans('cruds.anggotum.fields.caption') }}
                        </th> --}}
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($anggota as $key => $anggotum)
                        <tr data-entry-id="{{ $anggotum->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $anggotum->id ?? '' }}
                            </td>
                            <td>
                                {{ $anggotum->name ?? '' }}
                            </td>
                            <td>
                                @if($anggotum->image)
                                    <a href="{{ $anggotum->image->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $anggotum->image->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $anggotum->instagram_acc ?? '' }}
                            </td>
                            <td>
                                {{ $anggotum->linkedin_acc ?? '' }}
                            </td>
                            <td>
                                {{ $anggotum->department->initial ?? '' }}
                            </td>
                            <td>
                                {{ $anggotum->type ?? '' }}
                            </td>
                            {{-- <td>
                                {{ $anggotum->caption ?? '' }}
                            </td> --}}
                            <td>
                                @can('anggotum_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.anggota.show', $anggotum->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('anggotum_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.anggota.edit', $anggotum->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('anggotum_delete')
                                    <form action="{{ route('admin.anggota.destroy', $anggotum->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('anggotum_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.anggota.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Anggotum:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
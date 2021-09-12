@extends('layouts.admin.admin')
@section('content')
@can('matkuliah_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.matkuliah.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.matkuliah.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.matkuliah.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Matkuliah">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.matkuliah.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.matkuliah.fields.name') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($matkuliahs as $key => $matkuliah)
                        <tr data-entry-id="{{ $matkuliah->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $matkuliah->id ?? '' }}
                            </td>
                            <td>
                                {{ $matkuliah->name ?? '' }}
                            </td>
                            <td>
                                @can('matkuliah_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.matkuliah.show', $matkuliah->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('matkuliah_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.matkuliah.edit', $matkuliah->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('matkuliah_delete')
                                    <form action="{{ route('admin.matkuliah.destroy', $matkuliah->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('matkuliah_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.matkuliah.massDestroy') }}",
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
  let table = $('.datatable-Matkuliah:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
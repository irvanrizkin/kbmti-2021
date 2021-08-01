@extends('layouts.admin.admin')
@section('content')
@can('upcoming_proker_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.upcoming-prokers.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.upcomingProker.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.upcomingProker.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-UpcomingProker">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.upcomingProker.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.upcomingProker.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.upcomingProker.fields.caption') }}
                        </th>
                        <th>
                            {{ trans('cruds.upcomingProker.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.upcomingProker.fields.is_active') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\UpcomingProker::IS_ACTIVE_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($upcomingProkers as $key => $upcomingProker)
                        <tr data-entry-id="{{ $upcomingProker->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $upcomingProker->id ?? '' }}
                            </td>
                            <td>
                                {{ $upcomingProker->name ?? '' }}
                            </td>
                            <td>
                                {{ $upcomingProker->caption ?? '' }}
                            </td>
                            <td>
                                {{ $upcomingProker->description ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\UpcomingProker::IS_ACTIVE_SELECT[$upcomingProker->is_active] ?? '' }}
                            </td>
                            <td>
                                @can('upcoming_proker_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.upcoming-prokers.show', $upcomingProker->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('upcoming_proker_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.upcoming-prokers.edit', $upcomingProker->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('upcoming_proker_delete')
                                    <form action="{{ route('admin.upcoming-prokers.destroy', $upcomingProker->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('upcoming_proker_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.upcoming-prokers.massDestroy') }}",
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
  let table = $('.datatable-UpcomingProker:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection
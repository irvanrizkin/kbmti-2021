@extends('layouts.admin.admin')
@section('content')
@can('event_registration_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.event-registrations.create') }}">
                {{ trans('global.add') }} Pendaftar
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        <div class="row">
            {{ trans('global.list_pendaftar_event') }} : <b> {{ $event->name ?? "Ini Nama Event" }} </b>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-EventRegistration">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.eventRegistration.fields.id') }}
                        </th>
                        @foreach ($event->eventFields as $field)
                            <th>
                                {{ $field->name }}
                            </th>    
                        @endforeach
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
                        @foreach ($event->eventFields as $field)
                            <td>
                                <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                            </td>
                        @endforeach
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($event->eventRegistrations as $item)
                        <tr data-entry-id="{{$item->id}}">
                            <td>

                            </td>
                            <td>
                                {{$item->id}}
                            </td>
                            @foreach ($item->eventFieldResponses as $response)
                                <td>{{$response->response ?? ''}}</td>
                            @endforeach
                            <td>
                                {{-- Menunjukkan detail dari pendaftar --}}
                                @can('event_registration_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.event-registrations.show', $item->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                {{-- Mengedit seseorang --}}
                                @can('event_registration_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.event-registrations.edit', $item->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                {{-- Menghapus orangnya --}}
                                @can('event_registration_delete')
                                    <form action="{{ route('admin.event-registrations.destroy', $item->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('event_registration_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.event-registrations.massDestroy') }}",
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
  let table = $('.datatable-EventRegistration:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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
@extends('layouts.admin.admin')
@section('content')
@can('event_field_choice_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.event-field-choices.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.eventFieldChoice.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.eventFieldChoice.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-EventFieldChoice">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.eventFieldChoice.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.eventFieldChoice.fields.choice') }}
                        </th>
                        <th>
                            {{ trans('cruds.eventFieldChoice.fields.event_field') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($eventFieldChoices as $key => $eventFieldChoice)
                        <tr data-entry-id="{{ $eventFieldChoice->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $eventFieldChoice->id ?? '' }}
                            </td>
                            <td>
                                {{ $eventFieldChoice->choice ?? '' }}
                            </td>
                            <td>
                                {{ $eventFieldChoice->event_field->name ?? '' }}
                            </td>
                            <td>
                                @can('event_field_choice_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.event-field-choices.show', $eventFieldChoice->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('event_field_choice_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.event-field-choices.edit', $eventFieldChoice->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('event_field_choice_delete')
                                    <form action="{{ route('admin.event-field-choices.destroy', $eventFieldChoice->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('event_field_choice_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.event-field-choices.massDestroy') }}",
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
  let table = $('.datatable-EventFieldChoice:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
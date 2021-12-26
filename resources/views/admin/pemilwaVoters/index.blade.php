@extends('layouts.admin.admin')
@section('content')
@can('pemilwa_voter_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.pemilwa-voters.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.pemilwaVoter.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.pemilwaVoter.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-PemilwaVoter">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.pemilwaVoter.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.pemilwaVoter.fields.nim') }}
                        </th>
                        <th>
                            {{ trans('cruds.pemilwaVoter.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.pemilwaVoter.fields.token') }}
                        </th>
                        <th>
                            {{ trans('cruds.pemilwaVoter.fields.pemilwa_event') }}
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
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($pemilwa_events as $key => $item)
                                    <option value="{{ $item->tahun }}">{{ $item->tahun }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pemilwaVoters as $key => $pemilwaVoter)
                        <tr data-entry-id="{{ $pemilwaVoter->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $pemilwaVoter->id ?? '' }}
                            </td>
                            <td>
                                {{ $pemilwaVoter->nim ?? '' }}
                            </td>
                            <td>
                                {{ $pemilwaVoter->email ?? '' }}
                            </td>
                            <td>
                                {{ $pemilwaVoter->token ?? '' }}
                            </td>
                            <td>
                                {{ $pemilwaVoter->pemilwa_event->tahun ?? '' }}
                            </td>
                            <td>
                                @can('pemilwa_voter_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.pemilwa-voters.show', $pemilwaVoter->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('pemilwa_voter_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.pemilwa-voters.edit', $pemilwaVoter->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('pemilwa_voter_delete')
                                    <form action="{{ route('admin.pemilwa-voters.destroy', $pemilwaVoter->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('pemilwa_voter_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.pemilwa-voters.massDestroy') }}",
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
  let table = $('.datatable-PemilwaVoter:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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
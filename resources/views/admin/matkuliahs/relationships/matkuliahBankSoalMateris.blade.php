<div class="m-3">
    @can('bank_soal_materi_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.bank-soal-materi.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.bankSoalMateri.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.bankSoalMateri.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-matkuliahBankSoalMateris">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.bankSoalMateri.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.bankSoalMateri.fields.name') }}
                            </th>
                            <th>
                                {{ trans('cruds.bankSoalMateri.fields.link') }}
                            </th>
                            <th>
                                {{ trans('cruds.bankSoalMateri.fields.matkuliah') }}
                            </th>
                            <th>
                                {{ trans('cruds.bankSoalMateri.fields.sub_type') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bankSoalMateris as $key => $bankSoalMateri)
                            <tr data-entry-id="{{ $bankSoalMateri->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $bankSoalMateri->id ?? '' }}
                                </td>
                                <td>
                                    {{ $bankSoalMateri->name ?? '' }}
                                </td>
                                <td>
                                    {{ $bankSoalMateri->link ?? '' }}
                                </td>
                                <td>
                                    {{ $bankSoalMateri->matkuliah->name ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\BankSoalMateri::SUB_TYPE_SELECT[$bankSoalMateri->sub_type] ?? '' }}
                                </td>
                                <td>
                                    @can('bank_soal_materi_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.bank-soal-materi.show', $bankSoalMateri->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('bank_soal_materi_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.bank-soal-materi.edit', $bankSoalMateri->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('bank_soal_materi_delete')
                                        <form action="{{ route('admin.bank-soal-materi.destroy', $bankSoalMateri->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('bank_soal_materi_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.bank-soal-materi.massDestroy') }}",
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
  let table = $('.datatable-matkuliahBankSoalMateris:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
<td style="width: 50%;">
    @switch($subtype)
        @case('DOCS')
        <img src="{{ asset('img/note-blue.svg') }}" class="table-product__svg-name" alt="">
        @break
        @case('PPT')
        <img src="{{ asset('img/note-orange.svg') }}" class="table-product__svg-name" alt="">
        @break
        @case('PDF')
        <img src="{{ asset('img/note-red.svg') }}" class="table-product__svg-name" alt="">
        @break
        @case('XLSX')
        <img src="{{ asset('img/note-green.svg') }}" class="table-product__svg-name" alt="">
        @break
    @endswitch
    {{ $name }}
</td>

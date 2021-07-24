@extends('layouts.app')

@section('title', 'Home')

@section('content')
<section class="berita__top">
    @include('layouts.heading', ['text' => 'Berita'])
    <div class="berita__break"></div>
    @include('layouts.search', ['name' => 'searchBerita', 'text' => 'Info Advokasi...'])
</section>
<section class="berita__content">
    <table border="1">
		<tr>
			<th>ID</th>
			<th>Title</th>
			<th>Created At</th>
			<th>Bureau</th>
		</tr>
		@foreach($berita as $b)
		<tr>
			<td>{{ $b->id }}</td>
			<td>{{ $b->title }}</td>
			<td>{{ $b->created_at }}</td>
			<td>{{ $b->bureau }}</td>
		</tr>
		@endforeach
	</table>
</section>
<section class="berita__paginator">
    <hr class="berita__hr">
    {{ $berita->links('vendor.pagination.custom') }}
</section>
@endsection

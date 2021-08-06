@extends('layouts.admin.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h2>Admin Dashboard KBMTI Versi 1.0</h2>
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    BTW, kalau ada yang ditanyakan atau bagaimana, bisa kontak development RnD ya. Oke?
                    @can('event_access')
                        TESTING
                    @endcan
                    {{-- {{ auth()->user()->can('event_access') }}
                    @if(auth()->user()->can('event_access'))
                        INI HARUS BISA
                    @endif --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection
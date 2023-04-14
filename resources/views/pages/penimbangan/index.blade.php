@extends('layouts.app')

@section('title', 'Halaman Data Penimbangan')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/select.bootstrap4.min.css') }}">
    @livewireStyles()
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Penimbangan</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('penimbangan.index') }}">Penimbangan</a></div>
                </div>
            </div>
            <div class="section-body">
                @if (session('msg-success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                        <div class="alert-body">
                            <div class="alert-title">Sukses</div>
                            {{ session('msg-success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Penimbangan</h4>
                                <div class="card-header-action">

                                    <a href="#" class="btn btn-icon btn-primary icon-left"><i class="fas fa-plus"></i>
                                        Tambah</a>

                                </div>
                            </div>
                            <div class="card-body">
                                <livewire:penimbangan-table theme='bootstrap-4' />
                                {{-- {{ $mahasiswas->links(); }} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- <x-modal.confirm-delete /> --}}
    </div>
@endsection
@push('scripts')
    @livewireScripts()
@endpush

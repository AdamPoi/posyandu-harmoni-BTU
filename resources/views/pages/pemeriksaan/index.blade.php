@extends('layouts.app')

@section('title', 'Halaman Data Pemeriksaan')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/select.bootstrap4.min.css') }}">
    @livewireStyles()
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Pemeriksaan</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('pemeriksaan.index') }}">Pemeriksaan</a></div>
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
                                <h4>Data Pemeriksaan</h4>
                                <div class="card-header-action">

                                    <a href="{{ route('cetak.pdf.pemeriksaan') }}"
                                        class="btn btn-icon btn-primary icon-left"><i class="fas fa-print"></i>
                                        Print PDF</a>
                                    <a href="{{ route('pemeriksaan.create') }}"
                                        class="btn btn-icon btn-primary icon-left"><i class="fas fa-plus"></i>
                                        Tambah</a>

                                </div>
                            </div>
                            <div class="card-body">
                                <livewire:pemeriksaan-table theme='bootstrap-4' />
                                {{-- <td>
                                    <form action="{{ route('pemeriksaan.destroy',$pemeriksaan->id_pemeriksaan) }}" method="POST">

                                        <a class="btn btn-info" href="{{ route('pemeriksaan.show',$pemeriksaan->id_pemeriksaan) }}">Show</a>
                                        <a class="btn btn-primary" href="{{ route('pemeriksaan.edit',$pemeriksaan->id_pemeriksaan) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                        
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td> --}}
                                {{-- {{ $pemeriksaans->links(); }} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('scripts')
    @livewireScripts()
@endpush

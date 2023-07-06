@extends('layouts.app')

@section('title', 'Halaman Detail balita')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Balita</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('balita.index') }}">Balita</a></div>
                    <div class="breadcrumb-item">Detail Balita</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-header-action">
                                    <a href="{{ route('balita.edit', $balita->id_balita) }}"
                                        class="btn btn-icon btn-warning icon-left"><i class="far fa-edit"></i>
                                        Edit</a>
                                    <button class="btn btn-danger btn-icon icon-left"
                                        data-action="{{ route('balita.destroy', $balita->id_balita) }}" data-toggle="modal"
                                        data-target="#confirm-delete-modal"> <i class="fas fa-trash"></i>
                                        Delete</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Nama Balita</label>
                                        <input readonly type="text" class="form-control" value="{{ $balita->nama }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Nama Ayah</label>
                                        <input readonly type="text" class="form-control"
                                            value="{{ $balita->nama_ayah }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Nama Ibu</label>
                                        <input readonly type="text" class="form-control"
                                            value="{{ $balita->nama_ibu }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Tanggal Lahir</label>
                                        <input readonly type="text" class="form-control"
                                            value="{{ $balita->tanggal_lahir }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Usia</label>
                                        <div class="input-group">
                                            <input readonly type="text" class="form-control" value="{{ $balita->usia }}">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    bulan
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Jenis Kelamin</label>
                                        <input readonly type="text" class="form-control"
                                            value="{{ $balita->jenis_kelamin }}">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a class="btn btn-primary float-left" href="{{ route('balita.index') }}">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>

    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush

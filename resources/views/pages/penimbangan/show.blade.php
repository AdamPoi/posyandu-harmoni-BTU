@extends('layouts.app')

@section('title', 'Halaman Detail Penimbangan')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Penimbangan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('penimbangan.index') }}">Penimbangan</a></div>
                    <div class="breadcrumb-item">Detail Penimbangan</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-header-action">
                                    <a href="{{ route('penimbangan.edit', $penimbangan->id_penimbangan) }}"
                                        class="btn btn-icon btn-warning icon-left"><i class="far fa-edit"></i>
                                        Edit</a>
                                    <button class="btn btn-danger btn-icon icon-left"
                                        data-action="{{ route('penimbangan.destroy', $penimbangan->id_penimbangan) }}"
                                        data-toggle="modal" data-target="#confirm-delete-modal"> <i
                                            class="fas fa-trash"></i>
                                        Delete</button>

                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Nama Balita</label>
                                        <input readonly type="text" class="form-control"
                                            value="{{ $penimbangan->balita->nama }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Usia</label>
                                        <input readonly type="text" class="form-control"
                                            value="{{ $penimbangan->balita->usia }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Berat Badan</label>
                                        <div class="input-group">
                                            <input readonly type="text" class="form-control"
                                                value="{{ $penimbangan->berat_badan }}">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    Kg
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Tinggi Badan</label>
                                        <div class="input-group">
                                            <input readonly type="text" class="form-control"
                                                value="{{ $penimbangan->tinggi_badan }}">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    cm
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Lingkar Kepala</label>
                                        <div class="input-group">
                                            <input readonly type="text" class="form-control"
                                                value="{{ $penimbangan->lingkar_kepala }}">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    cm
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Kegiatan</label>
                                        <input readonly type="text" class="form-control"
                                            value="{{ $penimbangan->jadwal->kegiatan ? $penimbangan->jadwal->kegiatan : '-' }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Tanggal</label>
                                        <input readonly type="date" class="form-control"
                                            value="{{ $penimbangan->tanggal }}">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a class="btn btn-primary float-left" href="{{ route('penimbangan.index') }}">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>

    </div>
@endsection

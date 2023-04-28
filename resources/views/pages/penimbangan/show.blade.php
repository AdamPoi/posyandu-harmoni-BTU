@extends('layouts.app')

@section('title', 'Halaman Detail Pemeriksaan')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Pemeriksaan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('pemeriksaan.index') }}">Pemeriksaan</a></div>
                    <div class="breadcrumb-item">Detail Pemeriksaan</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-header-action">    
                                    <a href="{{ route('pemeriksaan.edit', $pemeriksaans->id_pemeriksaan) }}" class="btn btn-icon btn-warning icon-left"><i
                                            class="far fa-edit"></i>
                                        Edit</a>
                                    <button class="btn btn-danger btn-icon icon-left"
                                        data-action="{{ route('pemeriksaan.destroy', $pemeriksaans->id_pemeriksaan) }}"><i class="fas fa-trash"></i>
                                        Delete</button>
        
                                </div>
                            </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Id Pemeriksaan</label>
                                            <input readonly type="text"
                                                class="form-control"
                                                value="{{ $pemeriksaans->id_pemeriksaan }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Id Ibu Hamil</label>
                                            <input readonly type="text"
                                                class="form-control"
                                                value="{{ $pemeriksaans->id_ibu_hamil }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Tanggal</label>
                                            <input readonly type="date"
                                                class="form-control"
                                                value="{{ $pemeriksaans->tanggal }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Catatan</label>
                                            <input readonly type="text"
                                                class="form-control"
                                                value="{{ $pemeriksaans->catatan }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <a class="btn btn-primary float-left" href="{{ route('pemeriksaan.index') }}">Kembali</a></div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection

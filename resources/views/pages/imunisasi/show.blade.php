@extends('layouts.app')

@section('title', 'Halaman Detail Imunisasi')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Imunisasi</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('imunisasi.index') }}">Imunisasi</a></div>
                    <div class="breadcrumb-item">Detail Imunisasi</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-header-action">    
                                    <a href="{{ route('imunisasi.edit', $imunisasis->id_imunisasi) }}" class="btn btn-icon btn-warning icon-left"><i
                                            class="far fa-edit"></i>
                                        Edit</a>
                                    <button class="btn btn-danger btn-icon icon-left"
                                        data-action="{{ route('imunisasi.destroy', $imunisasis->id_imunisasi) }}"><i class="fas fa-trash"></i>
                                        Delete</button>
        
                                </div>
                            </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Id Imunisasi</label>
                                            <input readonly type="text"
                                                class="form-control"
                                                value="{{ $imunisasis->id_imunisasi }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Nama Balita</label>
                                            <input readonly type="text"
                                                class="form-control"
                                                value="{{ $imunisasis->balita->nama }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>jenis_imunisasi</label>
                                            <input readonly type="text"
                                                class="form-control"
                                                value="{{ $imunisasis->jenis_imunisasi }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Tanggal</label>
                                            <input readonly type="date"
                                                class="form-control"
                                                value="{{ $imunisasis->tanggal }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Deskripsi</label>
                                            <textarea readonly class="form-control summernote-simple">{{ $imunisasis->deskripsi }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <a class="btn btn-primary float-left" href="{{ route('imunisasi.index') }}">Kembali</a></div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection

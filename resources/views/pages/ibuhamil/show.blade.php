@extends('layouts.app')

@section('title', 'Halaman Detail Ibu Hamil')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Ibu Hamil</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('ibuhamil.index') }}">Ibu Hamil</a></div>
                    <div class="breadcrumb-item">Detail Ibu Hamil</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-header-action">
                                    <a href="{{ route('ibuhamil.edit', $ibuhamil->id_ibu_hamil) }}"
                                        class="btn btn-icon btn-warning icon-left"><i class="far fa-edit"></i>
                                        Edit</a>
                                    <button class="btn btn-danger btn-icon icon-left"
                                        data-action="{{ route('ibuhamil.destroy', $ibuhamil->id_ibu_hamil) }}"
                                        data-toggle="modal" data-target="#confirm-delete-modal"> <i
                                            class="fas fa-trash"></i>
                                        Delete</button>

                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group col-12">
                                    <label>Id Ibu Hamil</label>
                                    <input readonly type="text" class="form-control"
                                        value="{{ $ibuhamil->id_ibu_hamil }}">
                                </div>
                                <div class="form-group col-12">
                                    <label>Nama</label>
                                    <input readonly type="text" class="form-control" value="{{ $ibuhamil->nama }}">
                                </div>
                                <div class="form-group col-12">
                                    <label>No Telepon</label>
                                    <input readonly type="text" class="form-control" value="{{ $ibuhamil->no_telepon }}">
                                </div>

                                <div class="form-group col-12">
                                    <label>Alamat</label>
                                    <textarea readonly class="form-control" data-height="160">{{ $ibuhamil->alamat }}</textarea>
                                </div>
                                <div class="form-group col-12">
                                    <label>Usia Kandungan</label>
                                    <input readonly type="text" class="form-control"
                                        value="{{ $ibuhamil->usia_kandungan }}">
                                </div>
                                <div class="form-group col-12">
                                    <label>Tanggal Hamil</label>
                                    <input readonly type="date" class="form-control"
                                        value="{{ $ibuhamil->tanggal_hamil }}">
                                </div>

                                <div class="form-group col-12">
                                    <label>Tanggal Lahir</label>
                                    <input readonly type="date" class="form-control"
                                        value="{{ $ibuhamil->tanggal_lahir }}">
                                </div>


                            </div>
                            <div class="card-footer text-right">
                                <a class="btn btn-primary float-left" href="{{ route('ibuhamil.index') }}">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>

    </div>
@endsection

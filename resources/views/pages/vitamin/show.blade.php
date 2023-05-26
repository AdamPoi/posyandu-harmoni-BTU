@extends('layouts.app')

@section('title', 'Halaman Detail Vitamin')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Vitamin</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('vitamin.index') }}">Vitamin</a></div>
                    <div class="breadcrumb-item">Detail Vitamin</div>
                </div>
            </div>
            <div class="section-body">
                {{-- <h2 class="section-title">Hi, {{ $vitamin->jenis_vitamin }}!</h2>
                <p class="section-lead">
                    Information about yourself on this page.
                </p> --}}

                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12">
                        <div class="card">
                           <div class="card-header">
                                <div class="card-header-action">
                                    <a href="{{ route('vitamin.edit', $vitamin->id_vitamin) }}"
                                        class="btn btn-icon btn-warning icon-left"><i class="far fa-edit"></i>
                                        Edit</a>
                                    <button class="btn btn-danger btn-icon icon-left"
                                        data-action="{{ route('vitamin.destroy', $vitamin->id_vitamin) }}"
                                        data-toggle="modal" data-target="#confirm-delete-modal"> <i
                                            class="fas fa-trash"></i>
                                        Delete</button>

                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Jenis Vitamin</label>
                                        <input readonly type="text" class="form-control"
                                            value="{{ $vitamin->jenis_vitamin }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Deskripsi</label>
                                        <textarea readonly class="form-control summernote-simple" data-height="160">{{ $vitamin->deskripsi }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a class="btn btn-primary float-left" href="{{ route('vitamin.index') }}">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>

    </div>
@endsection

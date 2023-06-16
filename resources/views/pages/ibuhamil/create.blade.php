@extends('layouts.app')

@section('title', 'Halaman Tambah Ibu Hamil')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Ibu Hamil</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('ibuhamil.index') }}">Ibu Hamil</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('ibuhamil.create') }}">Tambah Ibu Hamil</a></div>
                </div>
            </div>

            <div class="section-body">
                @if ($errors->any())
                    <div class="pt-3">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul>
                                @foreach ($errors->all() as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Ibu Hamil</h4>

                    </div>
                    <form action="{{ route('ibuhamil.store') }}" method="POST">
                        <div class="card-body">
                            @csrf
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama"
                                    class="form-control @if (old('nama')) is-valid @endif
                                @error('nama') is-invalid @enderror"
                                    value="{{ old('nama') }}">
                            </div>
                            <div class="form-group">
                                <label>No Telepon</label>
                                <input type="text" name="no_telepon"
                                    class="form-control @if (old('no_telepon')) is-valid @endif
                                @error('no_telepon') is-invalid @enderror"
                                    value="{{ old('no_telepon') }}">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat"
                                    class="form-control @if (old('alamat')) is-valid @endif
                                @error('alamat') is-invalid @enderror"
                                    value="{{ old('alamat') }}"class="form-control" data-height="150"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Usia Kandungan</label>
                                <input type="number" name="usia_kandungan"
                                    class="form-control @if (old('usia_kandungan')) is-valid @endif
                                @error('usia_kandungan') is-invalid @enderror"
                                    value="{{ old('usia_kandungan') }}">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Hamil</label>
                                <input type="date" name="tanggal_hamil"
                                    class="form-control @if (old('tanggal_hamil')) is-valid @endif
                                @error('tanggal_hamil') is-invalid @enderror"
                                    value="{{ old('tanggal_hamil') }}">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir"
                                    class="form-control @if (old('tanggal_lahir')) is-valid @endif
                                @error('tanggal_lahir') is-invalid @enderror"
                                    value="{{ old('tanggal_lahir') }}">
                            </div>

                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

    </div>
@endsection

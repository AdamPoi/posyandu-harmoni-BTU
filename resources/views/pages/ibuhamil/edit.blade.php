@extends('layouts.app')

@section('title', 'Halaman Edit Ibu Hamil')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Ibu Hamil</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('ibuhamil.index') }}">Ibu Hamil</a></div>
                    <div class="breadcrumb-item">Edit Ibu Hamil</div>
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
                        <h4>Edit Ibu Hamil</h4>

                    </div>
                    <form action="{{ route('ibuhamil.update', $ibuhamil->id_ibu_hamil) }}" method="POST">
                        <div class="card-body">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama"
                                    class="form-control @if (old('nama')) is-valid @endif
                                @error('nama') is-invalid @enderror"
                                    value="{{ old('nama', $ibuhamil->nama) }}">
                            </div>
                            <div class="form-group">
                                <label>No Telepon</label>
                                <input type="text" name="no_telepon"
                                    class="form-control @if (old('no_telepon')) is-valid @endif
                                @error('no_telepon') is-invalid @enderror"
                                    value="{{ old('no_telepon', $ibuhamil->no_telepon) }}">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat"
                                    class="form-control @if (old('alamat')) is-valid @endif
                                @error('alamat') is-invalid @enderror"
                                    class="form-control" data-height="80">{{ old('alamat', $ibuhamil->alamat) }}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label>Usia Kandungan</label>
                                <input type="number" name="usia_kandungan"
                                    class="form-control @if (old('usia_kandungan')) is-valid @endif
                                @error('usia_kandungan') is-invalid @enderror"
                                    value="{{ old('usia_kandungan', $ibuhamil->usia_kandungan) }}">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Hamil</label>
                                <input type="date" name="tanggal_hamil"
                                    class="form-control @if (old('tanggal_hamil')) is-valid @endif
                                @error('tanggal_hamil') is-invalid @enderror"
                                    value="{{ old('tanggal_hamil', $ibuhamil->tanggal_hamil) }}">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir"
                                    class="form-control @if (old('tanggal_lahir')) is-valid @endif
                                @error('tanggal_lahir') is-invalid @enderror"
                                    value="{{ old('tanggal_lahir', $ibuhamil->tanggal_lahir) }}">
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>

                        </div>
                    </form>
                </div>
            </div>
        </section>

    </div>
@endsection

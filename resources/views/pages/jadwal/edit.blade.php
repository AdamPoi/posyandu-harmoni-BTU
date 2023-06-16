@extends('layouts.app')

@section('title', 'Halaman Edit Data Jadwal')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Data Jadwal</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('jadwal.index') }}">Jadwal</a></div>
                    <div class="breadcrumb-item">Edit Jadwal</div>
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
                        <h4>Edit Data Jadwal</h4>

                    </div>
                    <form action="{{ route('jadwal.update', $jadwal->id_jadwal) }}" method="POST">
                        <div class="card-body">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Kegiatan</label>
                                <input type="text" name="kegiatan"
                                    class="form-control @if (old('kegiatan')) is-valid @endif
                                @error('kegiatan') is-invalid @enderror"
                                    value="{{ old('kegiatan', $jadwal->kegiatan) }}">
                            </div>
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" name="tanggal"
                                    class="form-control @if (old('tanggal')) is-valid @endif
                                @error('tanggal') is-invalid @enderror"
                                    value="{{ old('tanggal', $jadwal->tanggal) }}">
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi"
                                    class="form-control @if (old('deskripsi')) is-valid @endif
                                @error('deskripsi') is-invalid @enderror"
                                    class="form-control" data-height="150">{{ old('deskripsi', $jadwal->deskripsi) }}</textarea>
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

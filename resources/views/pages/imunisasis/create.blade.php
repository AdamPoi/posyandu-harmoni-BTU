@extends('layouts.app')

@section('title', 'Halaman Tambah Data Imunisasi')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Data Imunisasi</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('imunisasis.index') }}">Imunisasi</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('imunisasis.create') }}">Tambah Data Imunisasi</a></div>
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
                        <h4>Tambah Data Imunisasi</h4>

                    </div>
                    <form action="{{ route('imunisasis.store') }}" method="POST">
                        <div class="card-body">
                            @csrf
                            <div class="form-group">
                                <label for="id_balita">Nama Balita</label>
                                <select class="form-control" name="id_balita" id="id_ibu_balita">
                                    @foreach ($balita as $blt)
                                        <option value="{{$blt->id}}">{{$blt->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jenis Imunisasi</label>
                                <input type="text" name="jenis_imunisasi"
                                    class="form-control @if (old('jenis_imunisasi')) is-valid @endif
                                @error('jenis_imunisasi') is-invalid @enderror"
                                    value="{{ old('jenis_imunisasi') }}">
                            </div>
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" name="tanggal"
                                    class="form-control @if (old('tanggal')) is-valid @endif
                                @error('tanggal') is-invalid @enderror"
                                    value="{{ old('tanggal') }}">
                            </div>
                            <div class="form-group">
                                <label>Descripsi</label>
                                <input type="text" name="deskripsi"
                                    class="form-control @if (old('deskripsi')) is-valid @endif
                                @error('deskripsi') is-invalid @enderror"
                                    value="{{ old('deskripsi') }}">
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
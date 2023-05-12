@extends('layouts.app')

@section('title', 'Halaman Tambah Balita')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Balita</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('balita.index') }}">Balita</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('balita.create') }}">Tambah Balita</a></div>
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
                        <h4>Tambah Balita</h4>

                    </div>
                    <form action="{{ route('balita.store') }}" method="POST">
                        <div class="card-body">
                            @csrf
                            <div class="form-group">
                                <label>Nama Balita</label>
                                <input type="text" name="nama"
                                    class="form-control @if (old('nama')) is-valid @endif
                                @error('nama') is-invalid @enderror"
                                    value="{{ old('nama') }}">
                            </div>
                            <div class="form-group">
                                <label>Nama Ayah</label>
                                <input type="text" name="nama_ayah"
                                    class="form-control @if (old('nama_ayah')) is-valid @endif
                                @error('nama_ayah') is-invalid @enderror"
                                    value="{{ old('nama_ayah') }}">
                            </div>
                            
                            <div class="form-group">
                                <label for="id_ibu_hamil">Nama Ibu</label>
                                <select class="form-control" name="ibu_hamil" id="ibu_hamil">
                                    @foreach ($ibu_hamils as $ibu)
                                        <option value="{{$ibu->id_ibu_hamil.'-'.$ibu->nama}}">{{$ibu->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir"
                                    class="form-control @if (old('tanggal_lahir')) is-valid @endif
                                @error('tanggal_lahir') is-invalid @enderror"
                                    value="{{ old('tanggal_lahir') }}">
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
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
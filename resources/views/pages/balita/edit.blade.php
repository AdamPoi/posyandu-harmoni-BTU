@extends('layouts.app')

@section('title', 'Halaman Edit Pemeriksaan')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Balita</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('pemeriksaan.index') }}">Pemeriksaan</a></div>
                    <div class="breadcrumb-item">Edit Pemeriksaan</div>
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
                        <h4>Edit Balita</h4>

                    </div>
                    <form action="{{ route('balita.update', $balita->id_balita) }}" method="POST">
                        <div class="card-body">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nama">Nama Balita</label>
                                <input type="text" name="nama"
                                    class="form-control @if (old('nama')) is-valid @endif 
                                @error('nama') is-invalid @enderror"
                                value="{{ old('nama', $balita->nama) }}">
                            </div>
                            <div class="form-group">
                                <label for="nama_ayah">Nama Ayah</label>
                                <input type="text" name="nama_ayah"
                                    class="form-control @if (old('nama_ayah')) is-valid @endif 
                                @error('nama_ayah') is-invalid @enderror"
                                value="{{ old('nama_ayah', $balita->nama_ayah) }}">
                            </div>
                            {{-- <div class="form-group">
                                <label for="ibu_hamil">Nama Ibu</label>
                                <input readonly hidden type="text" name="ibu_hamil" class="form-control" value="{{ $balita->id_balita }}">
                                <input readonly type="text" name="ibu_hamil" class="form-control" value="{{ $balita->ibu_hamil->nama }}">
                            </div> --}}
                            <div class="form-group">
                                <label for="id_ibu_hamil">Nama Ibu</label>
                                <select class="form-control" name="id_ibu_hamil" id="id_ibu_hamil">
                                    @foreach ($ibu_hamils as $prk)
                                        <option value="{{ $prk->id_ibu_hamil }}"
                                            {{ $prk->id_ibu_hamil == $prk->id_ibu_hamil ? 'selected' : '' }}>
                                            {{ $prk->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="usia">Usia</label>
                                <input type="text" name="usia"
                                    class="form-control @if (old('usia')) is-valid @endif 
                                @error('usia') is-invalid @enderror"
                                value="{{ old('usia', $balita->usia) }}">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir"
                                    class="form-control @if (old('tanggal_lahir')) is-valid @endif 
                                @error('tanggal_lahir') is-invalid @enderror"
                                value="{{ old('tanggal_lahir', $balita->tanggal_lahir) }}">
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                    <option value="L" @if($balita == 'L') selected @endif>Laki-Laki</option>
                                    <option value="P" @if($balita == 'P') selected @endif>Perempuan</option>
                                </select>
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
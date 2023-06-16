@extends('layouts.app')

@section('title', 'Halaman Edit Data Imunisasi')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Data Imunisasi</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('imunisasi.index') }}">Imunisasi</a></div>
                    <div class="breadcrumb-item">Edit Imunisasi</div>
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
                        <h4>Edit Data Imunisasi</h4>

                    </div>
                    <form action="{{ route('imunisasi.update', $imunisasi->id_imunisasi) }}" method="POST">
                        <div class="card-body">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="id_ibu_hamil">Nama Balita</label>
                                <select class="form-control" name="id_balita" id="id_balita">
                                    @foreach ($balitas as $prk)
                                        <option value="{{ $prk->id_balita }}"
                                            {{ $prk->id_balita == $prk->id_balita ? 'selected' : '' }}>{{ $prk->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jenis Imunisasi</label>
                                <input type="text" name="jenis_imunisasi"
                                    class="form-control @if (old('jenis_imunisasi')) is-valid @endif 
                                @error('jenis_imunisasi') is-invalid @enderror"
                                    value="{{ old('jenis_imunisasi', $imunisasi->jenis_imunisasi) }}">
                            </div>
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" name="tanggal"
                                    class="form-control @if (old('tanggal')) is-valid @endif 
                                @error('tanggal') is-invalid @enderror"
                                    value="{{ old('tanggal', $imunisasi->tanggal) }}">
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi"
                                    class="form-control @if (old('deskripsi')) is-valid @endif
                                @error('deskripsi') is-invalid @enderror"
                                    data-height="150">{{ old('deskripsi', $imunisasi->deskripsi) }}</textarea>
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

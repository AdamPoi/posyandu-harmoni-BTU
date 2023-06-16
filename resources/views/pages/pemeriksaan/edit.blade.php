@extends('layouts.app')

@section('title', 'Halaman Edit Pemeriksaan')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Pemeriksaan</h1>
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
                        <h4>Edit Pemeriksaan</h4>

                    </div>
                    <form action="{{ route('pemeriksaan.update', $pemeriksaan->id_pemeriksaan) }}" method="POST">
                        <div class="card-body">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="id_ibu_hamil">Nama Ibu Hamil</label>
                                <select class="form-control" name="id_ibu_hamil" id="id_ibu_hamil">
                                    @foreach ($ibu_hamils as $prk)
                                        <option value="{{ $prk->id_ibu_hamil }}"
                                            {{ $prk->id_ibu_hamil == $pemeriksaan->ibu_hamil->id_ibu_hamil ? 'selected' : '' }}>
                                            {{ $prk->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" name="tanggal"
                                    class="form-control @if (old('tanggal')) is-valid @endif 
                                @error('tanggal') is-invalid @enderror"
                                    value="{{ old('tanggal', $pemeriksaan->tanggal) }}">
                            </div>
                            <div class="form-group">
                                <label>Catatan</label>
                                <textarea name="catatan"
                                    class="form-control @if (old('catatan')) is-valid @endif
                                @error('catatan') is-invalid @enderror"
                                    class="form-control" data-height="160">{{ old('catatan', $pemeriksaan->catatan) }}
                                </textarea>
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

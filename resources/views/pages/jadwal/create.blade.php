@extends('layouts.app')

@section('title', 'Halaman Tambah Jadwal')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Jadwal</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('jadwal.index') }}">Jadwal</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('jadwal.create') }}">Tambah Jadwal</a></div>
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
                        <h4>Tambah Jadwal</h4>

                    </div>
                    <form action="{{ route('jadwal.store') }}" method="POST">
                        <div class="card-body">
                            @csrf

                            <div class="form-group">
                                <label>Kegiatan</label>
                                <input type="text" name="kegiatan"
                                    class="form-control @if (old('id_jadwal')) is-valid @endif
                                @error('kegiatan') is-invalid @enderror"
                                    value="{{ old('id_jadwal') }}">
                            </div>
                            <div class="form-group">
                                <label>Jenis Kegiatan</label>
                                <select name="jenis" id="jenis" class="form-control">
                                    <option value="imunisasi">Imunisasi</option>
                                    <option value="penimbangan">Penimbangan</option>
                                    <option value="pemeriksaan">Pemeriksaan</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" name="tanggal"
                                    class="form-control @if (old('tanggal')) is-valid @endif
                                @error('tanggal') is-invalid @enderror"
                                    value="{{ old('tanggal') }}">
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi"
                                    class="form-control @if (old('deskripsi')) is-valid @endif
                                @error('deskripsi') is-invalid @enderror"
                                    value="{{ old('deskripsi') }}" style="height:8rem;"></textarea>
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
@push('scripts')
    <script>
        const params = new URLSearchParams(window.location.search);
        const jenis = params.get('jenis');
        $('#jenis').val(jenis)
    </script>
@endpush

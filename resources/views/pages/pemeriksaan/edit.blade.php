@extends('layouts.app')

@section('title', 'Halaman Edit Pemeriksaan')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <style>
        .select2-selection__clear {
            position: absolute !important;
            right: 40px !important;
        }
    </style>
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
                                <label for="id_ibu_hamil">Nama Ibu</label>
                                <select class="form-control" name="id_ibu_hamil" id="id-ibu-hamil">
                                    @if (old('id_ibu_hamil', $pemeriksaan->id_ibu_hamil))
                                        <option value="{{ old('id_ibu_hamil', $pemeriksaan->id_ibu_hamil) }}" selected>
                                            {{ old('nama_ibu_hamil', $pemeriksaan->ibu_hamil->nama) }}
                                        </option>
                                    @endif
                                </select>
                            </div>
                            <input type="hidden" id="nama-ibu-hamil" name="nama_ibu_hamil"
                                value="{{ old('nama_ibu_hamil', $pemeriksaan->ibu_hamil->nama) }}">
                            <div class="form-group">
                                <label for="kegiatan">Kegiatan</label>
                                <select class="form-control" name="id_jadwal" id="kegiatan">
                                    @if (old('id_jadwal', $pemeriksaan->jadwal))
                                        <option value="{{ old('id_jadwal', $pemeriksaan->jadwal->id_jadwal) }}" selected>
                                            {{ old('kegiatan', $pemeriksaan->jadwal->kegiatan) }}
                                        </option>
                                    @endif

                                </select>
                            </div>
                            <input type="hidden" id='nama-kegiatan' name="kegiatan"
                                value="{{ old('kegiatan', $pemeriksaan->jadwal->kegiatan) }}">
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" name="tanggal"
                                    class="form-control @if (old('tanggal')) is-valid @endif 
                                @error('tanggal') is-invalid @enderror"
                                    value="{{ old('tanggal', $pemeriksaan->tanggal) }}">
                            </div>
                            <div class="form-group">
                                <label for="catatan">Catatan</label>
                                <select name="catatan" id="catatan"
                                    class="form-control @if (old('catatan')) is-valid @endif @error('catatan') is-invalid @enderror">
                                    <option value="Kondisi dalam keadaan sehat"
                                        @if ($pemeriksaan == 'Kondisi dalam keadaan sehat') selected @endif>Kondisi dalam keadaan sehat
                                    </option>
                                    <option value="Kondisi dalam keadaan tidak sehat"
                                        @if ($pemeriksaan == 'Kondisi dalam keadaan tidak sehat') selected @endif>Kondisi dalam keadaan tidak sehat
                                    </option>
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
@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script type="text/javascript">
        $('#id-ibu-hamil').select2({
            placeholder: 'Pilih Ibu Hamil',
            ajax: {
                url: '{!! route('autocomplete.ibuhamil') !!}',
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.nama,
                                id: item.id_ibu_hamil
                            }
                        })
                    };
                },
                cache: true
            }
        });
        $('#id-ibu-hamil').on('change', function(e) {
            var title = $(this).select2('data')[0].text;
            $('#nama-ibu-hamil').val(title);
        });
        let jadwals;
        $('#kegiatan').select2({
            placeholder: 'Pilih Kegiatan',
            allowClear: true,
            ajax: {
                url: '{!! route('autocomplete.jadwal', ['jenis' => 'pemeriksaan']) !!}',
                dataType: 'json',
                delay: 250,

                processResults: function(data) {
                    jadwals = $.map(data, function(item) {
                        return {
                            tanggal: item.tanggal,
                            text: item.kegiatan,
                            id: item.id_jadwal
                        }
                    })
                    return {
                        results: jadwals
                    };
                },
                cache: true
            }
        });
        $('#kegiatan').on('change', function(e) {
            var title = $(this).select2('data')[0].text;
            $('#nama-kegiatan').val(title);
            const selectedJadwal = jadwals.find(i => i.id = e.target.value)
            $('#tanggal').val(selectedJadwal.tanggal);
        });
    </script>
@endpush

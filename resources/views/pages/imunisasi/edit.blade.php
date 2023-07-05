@extends('layouts.app')

@section('title', 'Halaman Edit Data Imunisasi')

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
                                <label for="id-balita">Nama Balita</label>
                                <select class="form-control" name="id_balita" id="id-balita">
                                    @if (old('id_balita', $imunisasi->id_balita))
                                        <option value="{{ old('id_balita', $imunisasi->id_balita) }}" selected>
                                            {{ old('nama_balita', $imunisasi->balita->nama) }}
                                        </option>
                                    @endif
                                </select>
                            </div>
                            <input type="hidden" id="jenis-vitamin" name="jenis_vitamin"
                                value="{{ old('jenis_vitamin', $imunisasi->vitamin->jenis_vitamin) }}">
                            <div class="form-group">
                                <label for="id-vitamin">Jenis Imunisasi</label>
                                <select class="form-control" name="id_vitamin" id="id-vitamin">
                                    @if (old('id_vitamin', $imunisasi->id_vitamin))
                                        <option value="{{ old('id_vitamin', $imunisasi->id_vitamin) }}" selected>
                                            {{ old('jenis_vitamin', $imunisasi->vitamin->jenis_vitamin) }}
                                        </option>
                                    @endif
                                </select>
                            </div>
                            <input type="hidden" id="jenis-vitamin" name="jenis_vitamin"
                                value="{{ old('jenis_vitamin', $imunisasi->vitamin->jenis_vitamin) }}">
                            <div class="form-group">
                                <label for="kegiatan">Kegiatan</label>
                                <select class="form-control" name="id_jadwal" id="kegiatan">
                                    @if (old('id_jadwal', $imunisasi->jadwal))
                                        <option value="{{ old('id_jadwal', $imunisasi->jadwal->id_jadwal) }}" selected>
                                            {{ old('kegiatan', $imunisasi->jadwal->kegiatan) }}
                                        </option>
                                    @endif

                                </select>
                            </div>
                            <input type="hidden" id='nama-kegiatan' name="kegiatan"
                                value="{{ old('kegiatan', $imunisasi->jadwal->kegiatan) }}">
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
                                @error('deskripsi') is-invalid @enderror summernote-simple"
                                    style="height:8rem;">{{ old('deskripsi', $imunisasi->deskripsi) }}</textarea>
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
        $('#id-balita').select2({
            placeholder: 'Pilih Balita',
            ajax: {
                url: '{!! route('autocomplete.balita') !!}',
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.nama,
                                id: item.id_balita
                            }
                        })
                    };
                },
                cache: true
            }
        });
        $('#id-balita').on('change', function(e) {
            var title = $(this).select2('data')[0].text;
            $('#nama-balita').val(title);
        });
        $('#id-vitamin').select2({
            placeholder: 'Pilih Jenis Imunisasi',
            ajax: {
                url: '{!! route('autocomplete.vitamin') !!}',
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.jenis_vitamin,
                                id: item.id_vitamin
                            }
                        })
                    };
                },
                cache: true
            }
        });
        $('#id-vitamin').on('change', function(e) {
            var title = $(this).select2('data')[0].text;
            $('#jenis-vitamin').val(title);
        });
        $('#kegiatan').select2({
            placeholder: 'Pilih Kegiatan',
            allowClear: true,
            ajax: {
                url: '{!! route('autocomplete.jadwal', ['jenis' => 'imunisasi']) !!}',
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

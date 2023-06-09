@extends('layouts.app')

@section('title', 'Halaman Tambah Pemeriksaan')

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
                <h1>Tambah Pemeriksaan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('pemeriksaan.index') }}">Pemeriksaan</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('pemeriksaan.create') }}">Tambah Pemeriksaan</a></div>
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
                        <h4>Tambah Pemeriksaan</h4>

                    </div>
                    <form action="{{ route('pemeriksaan.store') }}" method="POST">
                        <div class="card-body">
                            @csrf
                            <div class="form-group">
                                <label for="id_ibu_hamil">Nama Ibu</label>
                                <select class="form-control" name="id_ibu_hamil" id="id-ibu-hamil">
                                    @if (old('id_ibu_hamil'))
                                        <option value="{{ old('id_ibu_hamil') }}" selected>
                                            {{ old('nama_ibu_hamil') }}
                                        </option>
                                    @endif
                                </select>
                            </div>
                            <input type="hidden" id="nama-ibu-hamil" name="nama_ibu_hamil"
                                value="{{ old('nama_ibu_hamil') }}">
                            <div class="form-group">
                                <label for="kegiatan">Kegiatan</label>
                                <select class="form-control" name="id_jadwal" id="kegiatan">
                                    @if (old('id_jadwal'))
                                        <option value="{{ old('id_jadwal') }}" selected>
                                            {{ old('kegiatan') }}
                                        </option>
                                    @endif
                                </select>
                            </div>
                            <input type="hidden" id='nama-kegiatan' name="kegiatan" value="{{ old('kegiatan') }}">
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" name="tanggal"
                                    class="form-control @if (old('tanggal')) is-valid @endif
                                @error('tanggal') is-invalid @enderror"
                                    value="{{ old('tanggal') }}">
                            </div>
                            <div class="form-group">
                                <label for="catatan">Catatan</label>
                                <select name="catatan" id="catatan"
                                    class="form-control @if (old('catatan')) is-valid @endif @error('catatan') is-invalid @enderror">
                                    <option value="">Pilih catatan</option>
                                    <option value="Kondisi dalam keadaan sehat"
                                        @if (old('catatan') == 'Kondisi dalam keadaan sehat') selected @endif>Kondisi dalam keadaan sehat
                                    </option>
                                    <option value="Kondisi dalam keadaan tidak sehat"
                                        @if (old('catatan') == 'Kondisi dalam keadaan tidak sehat') selected @endif>Kondisi dalam keadaan tidak sehat
                                    </option>
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

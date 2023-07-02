@extends('layouts.app')

@section('title', 'Halaman Tambah Imunisasi')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Imunisasi</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('imunisasi.index') }}">Imunisasi</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('imunisasi.create') }}">Tambah Imunisasi</a></div>
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
                        <h4>Tambah Imunisasi</h4>

                    </div>
                    <form action="{{ route('imunisasi.store') }}" method="POST">
                        <div class="card-body">
                            @csrf
                            <div class="form-group">
                                <label for="id-balita">Nama Balita</label>
                                <select class="form-control" name="id_balita" id="id-balita">

                                </select>
                            </div>
                            <input type="hidden" id="nama-balita" name="nama_balita" value="{{ old('nama_balita') }}">
                            <div class="form-group">
                                <label for="id-vitamin">Jenis Imunisasi</label>
                                <select class="form-control" name="id_vitamin" id="id-vitamin">

                                </select>
                            </div>
                            <input type="hidden" id="jenis-vitamin" name="jenis_vitamin" value="{{ old('jenis_vitamin') }}">
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
                                    value="{{ old('deskripsi') }}"class="form-control" style="height:8rem;"></textarea>
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
    </script>
    <script type="text/javascript">
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
    </script>
@endpush

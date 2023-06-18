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
                            <div class="form-group">
                                <label for="id_ibu_hamil">Nama Ibu</label>
                                <select class="form-control" name="id_ibu_hamil" id="id-ibu-hamil">
                                    @if (old('id_ibu_hamil', $balita->id_ibu_hamil))
                                        <option value="{{ old('id_ibu_hamil', $balita->id_ibu_hamil) }}" selected>
                                            {{ old('nama_ibu_hamil', $balita->ibu_hamil->nama) }}
                                        </option>
                                    @endif
                                </select>
                            </div>
                            <input type="hidden" id="nama-ibu-hamil" name="nama_ibu_hamil"
                                value="{{ old('nama_ibu_hamil', $balita->ibu_hamil->nama) }}">
                            <div class="form-group">
                                <label for="usia">Usia</label>
                                <div class="input-group">

                                    <input type="text" name="usia"
                                        class="form-control @if (old('usia')) is-valid @endif 
                                  @error('usia') is-invalid @enderror"
                                        value="{{ old('usia', $balita->usia) }}">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            bulan
                                        </div>
                                    </div>
                                </div>
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
                                    <option value="L" @if ($balita == 'L') selected @endif>Laki-Laki
                                    </option>
                                    <option value="P" @if ($balita == 'P') selected @endif>Perempuan
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
    </script>
@endpush

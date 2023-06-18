@extends('layouts.app')

@section('title', 'Halaman Edit Perkembangan')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Perkembangan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('penimbangan.index') }}">Penimbangan</a></div>
                    <div class="breadcrumb-item">Edit Perkembangan</div>
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
                        <h4>Edit Perkembangan</h4>

                    </div>
                    <form action="{{ route('penimbangan.update', $penimbangan->id_penimbangan) }}" method="POST">
                        <div class="card-body">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="id-balita">Nama Balita</label>
                                <select class="form-control" name="id_balita" id="id-balita">
                                    @if (old('id_balita', $penimbangan->id_balita))
                                        <option value="{{ old('id_balita', $penimbangan->id_balita) }}" selected>
                                            {{ old('nama_balita', $penimbangan->balita->nama) }}
                                        </option>
                                    @endif
                                </select>
                            </div>
                            <input type="hidden" id="nama-balita" name="nama_balita"
                                value="{{ old('nama_balita', $penimbangan->balita->nama) }}">
                            <div class="form-group">
                                <label>Berat Badan</label>
                                <div class="input-group">

                                    <input type="text" name="berat_badan"
                                        class="form-control @if (old('berat_badan')) is-valid @endif
                                  @error('berat_badan') is-invalid @enderror"
                                        value="{{ old('berat_badan', $penimbangan->berat_badan) }}">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            Kg
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tinggi Badan</label>
                                <div class="input-group">

                                    <input type="text" name="tinggi_badan"
                                        class="form-control @if (old('tinggi_badan')) is-valid @endif
                                  @error('tinggi_badan') is-invalid @enderror"
                                        value="{{ old('tinggi_badan', $penimbangan->tinggi_badan) }}">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            cm
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Lingkar Kepala</label>
                                <div class="input-group">

                                    <input type="text" name="lingkar_kepala"
                                        class="form-control @if (old('lingkar_kepala')) is-valid @endif
                                  @error('lingkar_kepala') is-invalid @enderror"
                                        value="{{ old('lingkar_kepala', $penimbangan->lingkar_kepala) }}">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            cm
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" name="tanggal"
                                    class="form-control @if (old('tanggal')) is-valid @endif 
                                @error('tanggal') is-invalid @enderror"
                                    value="{{ old('tanggal', $penimbangan->tanggal) }}">
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
@endpush

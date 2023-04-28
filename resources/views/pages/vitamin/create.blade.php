@extends('layouts.app')

@section('title', 'Halaman Tambah Vitamin')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Vitamin</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('vitamin.index') }}">Vitamin</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('vitamin.create') }}">Tambah Vitamin</a></div>
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
                        <h4>Tambah Vitamin</h4>

                    </div>
                    <form action="{{ route('vitamin.store') }}" method="POST">
                        <div class="card-body">
                            @csrf
                            <div class="form-group">
                                <label>Jenis Vitamin</label>
                                <input type="text" name="jenis_vitamin"
                                    class="form-control @if (old('jenis_vitamin')) is-valid @endif
                                @error('jenis_vitamin') is-invalid @enderror"
                                    value="{{ old('jenis_vitamin') }}">
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi"
                                    class="form-control @if (old('deskripsi')) is-valid @endif
                                @error('deskripsi') is-invalid @enderror"
                                    data-height="150">{{ old('deskripsi') }}</textarea>
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
    <script src="{{ asset('library/cleave.js/dist/cleave.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
@endpush

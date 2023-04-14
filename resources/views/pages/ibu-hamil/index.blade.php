@extends('layouts.app')

@section('title', 'Ibu Hamil')
@push('style')
    {{-- <link rel="stylesheet" href="{{ asset('vendor/datatables/datatables.min.css') }}"> --}}
@endpush
@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Ibu Hamil</h1>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Ibu Hamil</h4>
                        <div class="card-header-action">
                            <a href="{{ route('ibuhamil.create') }}" class="btn btn-primary">Tambah Ibu Hamil</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @livewireStyles
                        <livewire:jadwal-table />
                        @livewireScripts
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('scripts')
    {{-- <script src="{{ asset('vendor/datatables/datatables.min.js') }}"></script> --}}
@endpush

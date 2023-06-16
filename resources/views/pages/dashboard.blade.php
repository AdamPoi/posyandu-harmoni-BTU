@extends('layouts.app')

@section('title', 'General Dashboard')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Pengguna</h4>
                            </div>
                            <div class="card-body">
                                {{ $userCount }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-person-pregnant"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Ibu Hamil</h4>
                            </div>
                            <div class="card-body">
                                {{ $ibuHamilCount }}

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-baby"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Balita</h4>
                            </div>
                            <div class="card-body">
                                {{ $balitaCount }}

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-prescription"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Pemeriksaan</h4>
                            </div>
                            <div class="card-body">
                                {{ $pemeriksaanCount }}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Kegiatan Bulan Ini</h4>
                        </div>
                        <div class="card-body">
                            <div class="summary">

                                <div class="summary-item">
                                    <ul class="list-unstyled list-unstyled-border py-0">
                                        @foreach ($jadwals as $jadwal)
                                            <li class="media">

                                                <div class="media-body">
                                                    <div class="media-right">{{ $jadwal->tanggal }}</div>
                                                    <div class="media-title">
                                                        <a class="text-blue"
                                                            href="jadwals/{{ $jadwal->id_jadwal }}">{{ $jadwal->kegiatan }}
                                                        </a>
                                                    </div>
                                                    <div class="text-muted text-small">{{ $jadwal->deskripsi }}
                                                    </div>

                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush

@extends('layouts.app')

@section('title', 'Halaman Data Balita')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/select.bootstrap4.min.css') }}">
    @livewireStyles()
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Balita</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('balita.index') }}">Balita</a></div>
                </div>
            </div>
            <div class="section-body">
                @if (session('msg-success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                        <div class="alert-body">
                            <div class="alert-title">Sukses</div>
                            {{ session('msg-success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Balita</h4>
                                <div class="card-header-action">
                                    <a href="{{ route('cetak.pdf.balita') }}" class="btn btn-icon btn-primary icon-left" target="_blank" rel="noopener noreferrer"><i
                                        class="fas fa-print"></i>
                                    Print PDF</a>
                                    <a href="{{ route('balita.create') }}" class="btn btn-icon btn-primary icon-left"><i
                                            class="fas fa-plus"></i>
                                        Tambah</a>

                                </div>
                            </div>
                            {{-- <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>No</th>
                                        <th>ID Balita</th>
                                        <th>ID Ibu Hamil</th>
                                        <th>Nama</th>
                                        <th>Nama Ayah</th>
                                        <th>Nama Ibu</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th width="200px">Action</th>
                                    </tr>
                                    {{-- @foreach ($mahasiswas as $Mahasiswa) --}}
                            {{-- <tr>
                                        <td>1</td>
                                        <td>B001</td>
                                        <td>I001</td>
                                        <td>Basith Ambiya</td>
                                        <td>Didik Budiono</td>
                                        <td>Siti Fatimah</td>
                                        <td>03-07-2000</td>
                                        <td>L</td>
                                        <td>
                                            <form action="#" method="POST" class="d-flex">

                                                <a class="btn btn-info" href="#">Detail</a>
                                                <a class="btn btn-primary" href="#">Edit</a>
                                                {{-- @csrf
                                                @method('DELETE') --}}
                            {{-- <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    {{-- @endforeach --}}
                            </table>

                            {{-- {{ $mahasiswas->links(); }} --}}
                            {{-- </div>  --}}
                            <div class="card-body">
                                <livewire:balita-table theme='bootstrap-4' />
                                {{-- {{ $mahasiswas->links(); }} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('scripts')
    @livewireScripts()
@endpush

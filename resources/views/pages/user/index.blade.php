@extends('layouts.app')

@section('title', 'Halaman Data User')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/select.bootstrap4.min.css') }}">
    @livewireStyles()
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>User</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('user.index') }}">User</a></div>
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
                                <h4>Data User</h4>
                                <div class="card-header-action">

                                    <a href="#" class="btn btn-icon btn-primary icon-left"><i class="fas fa-plus"></i>
                                        Tambah</a>

                                </div>
                            </div>
                            <div class="card-body">
                                {{-- <table class="table table-bordered">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Role</th>
                                        <th>Email</th>
                                        <th width="280px">Action</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Harmoni</td>
                                        <td>Bidan</td>
                                        <td>harmoni@harmoni.com</td>
                                        <td>
                                            <form action="#" method="POST">

                                                <a class="btn btn-info" href="#">Detail</a>
                                                <a class="btn btn-primary" href="#">Edit</a>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                </table> --}}
                                <livewire:user-table theme='bootstrap-4' />
                                {{-- {{ $mahasiswas->links(); }} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- <x-modal.confirm-delete /> --}}
    </div>
@endsection
@push('scripts')
    @livewireScripts()
@endpush

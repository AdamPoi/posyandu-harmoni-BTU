@extends('layouts.app')

@section('title', 'Halaman Detail User')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail User</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('user.index') }}">User</a></div>
                    <div class="breadcrumb-item">Detail User</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Hi, {{ $user->nama }}!</h2>
                <p class="section-lead">
                    Information about yourself on this page.
                </p>

                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Nama</label>
                                        <input readonly type="text" class="form-control" value="{{ $user->nama }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-7 col-12">
                                        <label>Umur</label>
                                        <input readonly type="number" class="form-control" value="{{ $user->umur }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Role</label>
                                        <input readonly type="text" class="form-control" value="{{ $user->role }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Alamat</label>
                                        <textarea readonly class="form-control summernote-simple">{{ $user->alamat }}</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Email</label>
                                        <input readonly type="email" class="form-control" value="{{ $user->email }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <img width="150px" src="{{ asset('images/user/' . $user->profile_picture) }}">
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer text-right">
                                <a class="btn btn-primary float-left" href="{{ route('user.index') }}">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    {{-- <x-modal.confirm-delete /> --}}

    </div>
@endsection

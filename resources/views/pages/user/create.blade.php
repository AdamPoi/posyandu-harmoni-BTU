@extends('layouts.app')

@section('title', 'Halaman Tambah User')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah User</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('user.index') }}">User</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('user.create') }}">Tambah User</a></div>
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
                        <h4>Tambah User</h4>

                    </div>
                    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            @csrf
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama"
                                    class="form-control @if (old('nama')) is-valid @endif
                                @error('nama') is-invalid @enderror"
                                    value="{{ old('nama') }}">
                            </div>
                            <div class="form-group">
                                <label>Usia</label>
                                <input type="number" name="usia"
                                    class="form-control @if (old('usia')) is-valid @endif
                                @error('usia') is-invalid @enderror"
                                    value="{{ old('usia') }}">
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <select name="role"
                                    class="form-control @if (old('role')) is-valid @endif
                                @error('role') is-invalid @enderror"
                                    value="{{ old('role') }}">
                                    <option value="" disabled selected>Pilih role</option>
                                    <option value="admin">Admin</option>
                                    <option value="owner">Owner</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat"
                                    class="form-control @if (old('alamat')) is-valid @endif
                                @error('alamat') is-invalid @enderror"
                                    style="height:8rem;">{{ old('alamat') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email"
                                    class="form-control @if (old('email')) is-valid @endif
                                @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password"
                                    class="form-control @if (old('passowrd')) is-valid @endif
                                @error('password') is-invalid @enderror"
                                    value="{{ old('password') }}">
                            </div>
                            <div class="form-group">
                                <label for="profile_picture">Profil Picture</label>
                                <input type="file" id="image-input" class="form-control" required="required"
                                    name="profile_picture" value="{{ old('profile_picture') }}">
                                <img width="150px" id="image-preview" src="{{ old('profile_picture') }}">
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
    <script>
        const imageInput = document.querySelector('#image-input');
        const imagePreview = document.querySelector('#image-preview');

        imageInput.addEventListener('change', () => {
            const file = imageInput.files[0];
            const reader = new FileReader();

            reader.addEventListener('load', () => {
                imagePreview.src = reader.result;
            });

            if (file) {
                reader.readAsDataURL(file);
            } else {
                imagePreview.src = '';
            }
        });
    </script>
@endpush

@extends('layouts.app')

@section('title', 'Halaman Edit User')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit User</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('user.index') }}">User</a></div>
                    <div class="breadcrumb-item">Edit User</div>
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
                        <h4>Edit User</h4>

                    </div>
                    <form action="{{ route('user.update', $user->id_user) }}" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama"
                                    class="form-control @if (old('nama_obat')) is-valid @endif
                                @error('nama_obat') is-invalid @enderror"
                                    value="{{ old('nama_obat', $user->nama) }}">
                            </div>
                            <div class="form-group">
                                <label>Umur</label>
                                <input type="number" name="umur"
                                    class="form-control @if (old('umur')) is-valid @endif
                                @error('umur') is-invalid @enderror"
                                    value="{{ old('umur', $user->umur) }}">
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <select class="form-control" name="role"
                                    class="form-control @if (old('role')) is-valid @endif
                                @error('role') is-invalid @enderror"
                                    value="{{ old('role', $user->role) }}">
                                    <option selected>Pilih role</option>
                                    <option value="admin">Admin</option>
                                    <option value="owner">Owner</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat"
                                    class="form-control @if (old('alamat')) is-valid @endif
                                @error('alamat') is-invalid @enderror"
                                    data-height="150">{{ old('alamat', $user->alamat) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email"
                                    class="form-control @if (old('email')) is-valid @endif
                                @error('email') is-invalid @enderror"
                                    value="{{ old('email', $user->email) }}">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password"
                                    class="form-control @if (old('passowrd')) is-valid @endif
                                @error('password') is-invalid @enderror"
                                    value="{{ old('password', $user->password) }}">
                            </div>
                            <div class="form-group">
                                <label for="profile_picture">Profil Picture</label>
                                <input type="file" id="image-input" class="form-control" required="required"
                                    name="profile_picture" value="{{ old('profile_picture') }}">
                                <img width="150px" id="image-preview"
                                    src="{{ asset('images/user/' . old('profile_picture', $user->profile_picture)) }}">
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

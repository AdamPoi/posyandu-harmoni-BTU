@extends('layouts.auth')

@section('title', 'Login')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">
@endpush

@section('main')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Login</h4>
        </div>

        <div class="card-body">
            <div class="alert-msg alert alert-danger alert-dismissible fade show d-none" role="alert">
                <p>Email atau Password yang anda Masukkan tidak ditemukan</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" id="login-form" action="{{ url('login/proses') }}" class="needs-validation" novalidate="">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email"
                        class="form-control
                        @error('email')
                            is-invalid
                        @enderror"
                        name="email" tabindex="1" required autofocus>
                    <div class="invalid-feedback">Email Harus diisi
                    </div>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label for="password" class="control-label">Password</label>

                    </div>
                    <input id="password" type="password"
                        class="form-control
                        @error('password')
                            is-invalid
                        @enderror"
                        name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                        Password harus diisi
                    </div>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        Login
                    </button>
                </div>
            </form>

        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $("#login-form").on('submit', function(event) {
            event.preventDefault()
            const formData = $(this).serialize();

            $.ajax({
                url: '/api/login',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': 'application/json'
                },
                data: formData,
                success: function(response) {
                    window.location.href = '/user';
                },
                error: function(xhr) {
                    $('.alert-msg').toggleClass('d-block d-none')
                }
            })
        })
    </script>
@endpush

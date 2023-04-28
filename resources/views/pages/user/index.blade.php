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

                                    <a href="{{ route('user.create') }}" class="btn btn-icon btn-primary icon-left"><i class="fas fa-plus"></i>
                                        Tambah</a>

                                </div>
                            </div>
                            <div class="card-body">

                                <livewire:user-table theme='bootstrap-4' />

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

    {{-- <script>
        $(document).on('click', '.delete-btn', function (event) {
            event.preventDefault();
            var rowId = $(this).data('id');
            if (confirm('Are you sure you want to delete this row?')) {
                $.ajax({
                    url: '/delete/' + rowId,
                    method: 'DELETE',
                    success: function (response) {
                        $('#table').DataTable().row('[data-id="' + rowId + '"]').remove().draw();
                    },
                    error: function (response) {
                        console.log(response);
                    }
                });
            }
        });
    </script> --}}

    @livewireScripts()
@endpush

@extends('layouts.app')

@section('title', 'Halaman Data Pemeriksaan')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/select.bootstrap4.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Pemeriksaan</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('pemeriksaan.index') }}">Pemeriksaan</a></div>
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
                                <h4>Data Pemeriksaan</h4>
                                <div class="card-header-action">

                                    <a href="{{ route('pemeriksaan.create') }}" class="btn btn-icon btn-primary icon-left"><i
                                            class="fas fa-plus"></i>
                                        Tambah</a>

                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table-striped table" id="users-table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Ibu Hamil</th>
                                                <th>Tanggal</th>
                                                <th>Catatan</th>
                                                <th>Action</th>
                                            </tr>
                                            <?php $i = $paginate->firstItem() ?>
                                            @foreach ($paginate as $Pemeriksaan)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $Pemeriksaan->id_ibu_hamil }}</td>
                                                <td>{{ $Pemeriksaan->tanggal }}</td>
                                                <td>{{ $Pemeriksaan->catatan }}</td>
                                                <td>
                                                    <form action="{{ route('pemeriksaan.destroy',$Pemeriksaan->id_pemeriksaan) }}" method="POST">
                                                        <a class="btn btn-icon icon-left btn-primary" href="{{ route('pemeriksaan.show',$Pemeriksaan->id_pemeriksaan) }}">
                                                            <i class="fas fa-circle-info"></i>Show</a>
                                                            <a class="btn btn-icon icon-left btn-warning" href="{{ route('pemeriksaan.edit',$Pemeriksaan->id_pemeriksaan) }}">
                                                                <i class="fas fa-pencil-alt"></i>Edit</a>
                                                            @csrf
                                                            @method('DELETE')

                                                        <button type="submit" class="btn btn-danger btn-icon icon-left"><i class="fas fa-trash"></i>Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php $i++ ?>
                                            @endforeach
                                        </thead>
                                    </table>
                                    {{ $paginate->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@extends('layouts.app')

@section('title', 'Halaman Data Penimbangan')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/select.bootstrap4.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Penimbangan</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('penimbangan.index') }}">Penimbangan</a></div>
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
                                <h4>Data Penimbangan</h4>
                                <div class="card-header-action">

                                    <a href="{{ route('penimbangan.create') }}" class="btn btn-icon btn-primary icon-left"><i
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
                                                <th>Nama Balita</th>
                                                <th>Berat Badan</th>
                                                <th>Tinggi Badan</th>
                                                <th>Tanggal</th>
                                                <th>Action</th>
                                            </tr>
                                            <?php $i = $paginate->firstItem() ?>
                                            @foreach ($paginate as $Penimbangan)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $Penimbangan->id_balita }}</td>
                                                <td>{{ $Penimbangan->berat_badan }}</td>
                                                <td>{{ $Penimbangan->tinggi_badan }}</td>
                                                <td>{{ $Penimbangan->tanggal }}</td>
                                                <td>
                                                    <form action="{{ route('penimbangan.destroy',$Penimbangan->id_penimbangan) }}" method="POST">
                                                        <a class="btn btn-icon icon-left btn-primary" href="{{ route('penimbangan.show',$Penimbangan->id_penimbangan) }}">
                                                            <i class="fas fa-circle-info"></i>Show</a>
                                                            <a class="btn btn-icon icon-left btn-warning" href="{{ route('penimbangan.edit',$Penimbangan->id_penimbangan) }}">
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

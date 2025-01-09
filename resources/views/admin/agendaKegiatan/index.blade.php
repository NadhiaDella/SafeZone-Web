@extends('admin.app')

@section('content')
<style>
    .product-image {
        width: 65px;
        height: 65px;
        object-fit: cover;
    }
</style>

@include('components.toast')
<div class="row">

    <!-- Content Column -->
    <div class="col-lg-12 mb-4">

        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Agenda Kegiatan</h6>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <!-- Form Cari  -->
                    <form action="/dashboard/event-kegiatan" method="GET" class="d-flex mb-2 w-50">
                        <input type="text" class="form-control mr-2" placeholder="Cari Agenda.." name="search">
                        <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
                    </form>
                    <!-- Tombol Tambah User -->
                    <a href="{{ route('agenda.kegiatan.create') }}" class="btn btn-primary mb-2">
                        Tambah Agenda
                    </a>
                </div>        
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="thead-dark text-center">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Agenda</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Lokasi</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                            <tr>
                                <td scope="row" class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $data->kegiatan_name }}</td>
                                <td class="text-center">
                                    <button class="border-0" style="background: transparent;">
                                        <img class="img-thumbnail product-image" src="{{ asset('Gambar/'. $data->kegiatan_image) }}" alt="">

                                    </button>
                                </td>
                                <td class="text-center">{{ $data->kegiatan_location }}</td>
                                <td class="text-center">{{ date('d F Y', strtotime($data->tanggal)) }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <a href="{{ route('agenda.kegiatan.edit', $data->id) }}" class="btn btn-info btn-sm mr-1"><i class="bi bi-pencil-square"></i></a>
                                        <form action="{{ route('agenda.kegiatan.destroy', $data->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Untuk Hapus?')">
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                                
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
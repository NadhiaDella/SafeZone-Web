@extends('admin.app')

@section('content')
@include('components.toast')
<div class="row">

    <!-- Content Column -->
    <div class="col-lg-12 mb-4">

        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Manajemen Advokat</h6>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <!-- Form Cari User -->
                    <form action="/dashboard/manajemen-advokat" method="GET" class="d-flex mb-2 w-50">
                        <input type="text" class="form-control mr-2" placeholder="Cari Advokat.." name="search">
                        <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
                    </form>
                    <!-- Tombol Tambah User -->
                    <a href="{{ route('manajemen.advokat.create') }}" class="btn btn-primary mb-2">
                        Tambah Advokat
                    </a>
                </div>        
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="thead-dark text-center">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Title</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Email</th>
                                <th scope="col">Peran</th>
                                <th scope="col">Tanggal Regist</th>
                                <th scope="col">Active</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td scope="row" class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->advocat->title }}</td>
                                <td class="text-center">
                                    <img class="w-75" src="{{ asset('Gambar/' . $user->image) }}" alt="">
                                </td>
                                <td>{{ $user->email }}</td>
                                <td class="text-center">{{ $user->role->name }}</td>
                                <td class="text-center text-nowrap">{{ date('d F Y', strtotime($user->created_at)) }}</td>
                                <td class="text-center">
                                    <form id="status-form-{{ $user->id }}" action="{{ route('activeStatus', $user->id) }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <input 
                                            type="checkbox" 
                                            name="status" 
                                            value="1" 
                                            onchange="document.getElementById('status-form-{{ $user->id }}').submit();" 
                                            {{ $user->status ? 'checked' : '' }}>
                                    </form>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <a href="{{ route('manajemen.advokat.edit', $user->id) }}" class="btn btn-info btn-sm mr-1"><i class="bi bi-pencil-square"></i></a>
                                        <form action="{{ route('manajemen.advokat.destroy', $user->id) }}" method="POST">
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
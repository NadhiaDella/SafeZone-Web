@extends('admin.app')

@section('content')
<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data {{ $data->name }}</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('manajemen.user.update', $data->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="name" value="{{ $data->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value=" {{ $data->email }}" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Ganti Password</label>
                        <input type="text" class="form-control" id="password" name="password">
                    </div>
                    <div class="text-right">
                        <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('admin.app')

@section('content')
<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Agenda</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('agenda.kegiatan.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama">Nama Agenda</label>
                        <input type="text" class="form-control" id="nama" value="{{ $data->kegiatan_name }}" name="kegiatan_name" placeholder="Nama Agenda" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Gambar</label>
                        <input type="file" class="form-control" id="image" name="kegiatan_image">
                    </div>
                    <div class="form-group">
                        <label for="location">Lokasi</label>
                        <input type="text" class="form-control" id="location" value="{{ $data->kegiatan_location }}" name="kegiatan_location" placeholder="Masukkan Lokasi" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" value="{{ $data->tanggal }}" name="tanggal" required>
                    </div>
                    <div class="text-right">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
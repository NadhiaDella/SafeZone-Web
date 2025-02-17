<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Form Pengaduan</h1>
</div>

<div class="card shadow mb-4">
    @if ($form_pengaduan->isEmpty())
    <h2 class="text-center">Data Kosong</h2>
    @else
    <div class="card-body">
        @if (Auth::user()->role_id == 1)
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover table-sm text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pelapor</th>
                        <th>Sebagai</th>
                        <th>Email</th>
                        <th>Nama Korban</th>
                        <th>Tanggal Lapor</th>
                        <th>Nomor Telp</th>
                        <th>Jenis Kekerasan Seksual</th>
                        <th>Disabilitas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($form_pengaduan as $form)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $form->user->name }}</td>
                        <td>{{ $form->bertindak_sebagai }}</td>
                        <td>{{ $form->user->email }}</td>
                        <td>{{ $form->nama_korban }}</td>
                        <td>{{ $form->tgl_lapor }}</td>
                        <td>{{ $form->no_telp }}</td>
                        <td>{{ $form->jenis_kekerasan_seksual }}</td>
                        <td>
                            @if ($form->is_disabilitas == '0')
                            <span class="badge badge-warning">Tidak</span>
                            @else
                            <span class="badge badge-success">Iya</span>
                            @endif
                        </td>
                        <td>
                            <div class="text-nowrap d-inline-flex align-items-center">
                                <button type="button" class="btn btn-secondary btn-sm mr-1" data-toggle="modal"
                                    data-target="#exampleModal{{$form->id}}"><i class="bi bi-eye"></i></button>
                                <a href= "{{ route('report.edit-pengaduan')}}" class="btn btn-success btn-sm mr-1"><i class="bi bi-pencil-square"></i></a>
                                <form action="{{ route('report.destroy', $form->id) }}" method="post" onsubmit="return confirm('Yakin Mau Hapus ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- End Table -->

            @foreach ($form_pengaduan as $form)

            <div class="modal fade" id="exampleModal{{$form->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Informasi Lain Dari Pelapor :
                                <strong>{{ $form->user->name }}</strong>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover table-sm text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">Pelaku</th>
                                            <th scope="col">Telp Lain</th>
                                            <th scope="col">Domisili</th>
                                            <th scope="col">Deskripsi Kejadian</th>
                                            <th scope="col">Disabilitas</th>
                                            <th scope="col">Alasan Pengaduan</th>
                                            <th scope="col">Membutuhkan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $form->nama_pelaku }}</td>
                                            <td>{{ $form->no_telp_lain }}</td>
                                            <td>{{ $form->domisili }}</td>
                                            <td class="text-left">{{ $form->cerita_singkat_peristiwa }}</td>
                                            <td>
                                                @if ($form->desc_disabilitas == null)
                                                <span class="badge badge-warning">Tidak Disabilitas</span>
                                                @else
                                                {{ $form->desc_disabilitas }}
                                                @endif
                                            </td>
                                            <td>
                                                <ul class="text-left">
                                                    @foreach ($form->reasons as $data)
                                                    <li>{{ $data->name }}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td>
                                                <ul class="text-left">
                                                    @foreach ($form->needs as $data)
                                                    <li>{{ $data->name }}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('modal.pdf', $form->id) }}" class="btn btn-primary" target="_blank">Print</a>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @elseif(Auth::user()->role_id == 2)
        @if($form_pengaduan->where('user_id', Auth::user()->id)->isEmpty())
        <h2 class="text-center">Belum Ada Pengaduan</h2>
        @else
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover table-sm text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pelapor</th>
                        <th>Sebagai</th>
                        <th>Email</th>
                        <th>Nama Korban</th>
                        <th>Tanggal Lapor</th>
                        <th>Nomor Telp</th>
                        <th>Jenis Kekerasan Seksual</th>
                        <th>Disabilitas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($form_pengaduan as $form)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $form->user->name }}</td>
                        <td>{{ $form->bertindak_sebagai }}</td>
                        <td>{{ $form->user->email }}</td>
                        <td>{{ $form->nama_korban }}</td>
                        <td>{{ $form->tgl_lapor }}</td>
                        <td>{{ $form->no_telp }}</td>
                        <td>{{ $form->jenis_kekerasan_seksual }}</td>
                        <td>
                            @if ($form->is_disabilitas == '0')
                            <span class="badge badge-warning">Tidak</span>
                            @else
                            <span class="badge badge-success">Iya</span>
                            @endif
                        </td>
                        <td>
                            <div class="text-nowrap d-inline-flex align-items-center">
                                <button type="button" class="btn btn-secondary btn-sm mr-1" data-toggle="modal"
                                    data-target="#exampleModal{{$form->id}}">Etc</button>
                                <button type="button" class="btn btn-success btn-sm mr-1">Edit</button>
                                <form action="{{ route('report.destroy', $form->id) }}" method="post" onsubmit="return confirm('Yakin Mau Hapus ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Del</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- End Table -->

            @foreach ($form_pengaduan as $form)

            <div class="modal fade" id="exampleModal{{$form->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Informasi Lain Dari Pelapor :
                                <strong>{{ $form->user->name }}</strong>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover table-sm text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">Pelaku</th>
                                            <th scope="col">Telp Lain</th>
                                            <th scope="col">Domisili</th>
                                            <th scope="col">Deskripsi Kejadian</th>
                                            <th scope="col">Disabilitas</th>
                                            <th scope="col">Alasan Pengaduan</th>
                                            <th scope="col">Membutuhkan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $form->nama_pelaku }}</td>
                                            <td>{{ $form->no_telp_lain }}</td>
                                            <td>{{ $form->domisili }}</td>
                                            <td class="text-left">{{ $form->cerita_singkat_peristiwa }}</td>
                                            <td>
                                                @if ($form->desc_disabilitas == null)
                                                <span class="badge badge-warning">Tidak Disabilitas</span>
                                                @else
                                                {{ $form->desc_disabilitas }}
                                                @endif
                                            </td>
                                            <td>
                                                <ul class="text-left">
                                                    @foreach ($form->reasons as $data)
                                                    <li>{{ $data->name }}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td>
                                                <ul class="text-left">
                                                    @foreach ($form->needs as $data)
                                                    <li>{{ $data->name }}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
        @else
        <div class="card shadow mb-2">
            <div class="card-body">
                <h1 class="text-center">Anda Tidak Memiliki Akses</h1>
            </div>
        </div>
        @endif
    </div>
    
    @endif
</div>
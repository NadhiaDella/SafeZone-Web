<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Form Pengajuan Hukum</h1>
</div>

@if (Auth::user()->role_id == 1)
    <div class="card shadow mb-4">
        <div class="card-body">
            @if ($form_pengajuan_hukum->every(fn($form) => $form->status == 1))
                <h1 class="text-center">Belum Ada Pengajuan</h1>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover table-sm text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Advokat</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                                <th>Via</th>
                                <th>Status</th>
                                <!-- <th>Aksi</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($form_pengajuan_hukum as $form)
                            @if ($form->status == 0)
                            <tr>
                                <td>{{ $form->advocat->name }}</td>
                                <td>{{ $form->user->name }}</td>
                                <td>{{ $form->user->email }}</td>
                                <td>{{ $form->tanggal }}</td>
                                <td>{{ $form->waktu }}</td>
                                <td>{{ $form->via }}</td>
                                <td>
                                    <span class="badge badge-danger">Unconfirmed</span>
                                </td>
                                <!-- <td>
                                    <div class="text-nowrap d-inline-flex align-items-center">
                                        <form action="{{ route('form.updateStatusHukum', $form->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm mr-2">Confirm</button>
                                        </form>
                                    </div>
                                </td> -->
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table -->

                </div>
            @endif
        </div>
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4 pt-5">
        <h1 class="h3 mb-0 text-gray-800">Pengajuan Terkonfirmasi</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            @if ($form_pengajuan_hukum->every(fn($form) => $form->status == 0))
                <h2 class="text-center">Belum Ada Yang Terkonfirmasi</h2>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover table-sm text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                                <th>Via</th>
                                <th>Status</th>
                                <th>Waktu</th>
                                <th>Oleh</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($form_pengajuan_hukum as $form)
                            @if ($form->status == 1)
                            <tr>
                                <td>{{ $form->user->name }}</td>
                                <td>{{ $form->user->email }}</td>
                                <td>{{ $form->tanggal }}</td>
                                <td>{{ $form->waktu }}</td>
                                <td>{{ $form->via }}</td>
                                <td>
                                    <span class="badge badge-success">Confirmed</span>
                                </td>
                                <td>{{ $form->updated_at->diffForHumans() }}</td>
                                <td>{{ $form->advocat->name}}</td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table -->

                </div>
            @endif
        </div>
    </div>

@elseif(Auth::user()->role_id == 2)
<div class="card shadow mb-4">
        <div class="card-body">
            @if ($form_pengajuan_hukum->every(fn($form) => $form->user_id != Auth::user()->id))
                <h2 class="text-center">Belum Ada Pengajuan</h2>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover table-sm text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Advokat</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                                <th>Via</th>
                                <th>Status</th>
                                <th>Terkirim</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($form_pengajuan_hukum as $form)
                                <tr>
                                    <td>{{ $form->advocat->name }}</td>
                                    <td>{{ $form->user->name }}</td>
                                    <td>{{ $form->user->email }}</td>
                                    <td>{{ $form->tanggal }}</td>
                                    <td>{{ $form->waktu }}</td>
                                    <td>{{ $form->via }}</td>
                                    <td>
                                        @if($form->status == 0)
                                        <span class="badge badge-danger">Unconfirmed</span>
                                        @else
                                        <span class="badge badge-success">Confirmed</span>
                                        @endif
                                    </td>
                                    <td>{{ $form->created_at->diffForHumans() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table -->

                </div>
            @endif
        </div>
    </div>
@elseif(Auth::user()->role_id == 4)
<div class="card shadow mb-4">
        <div class="card-body">
            @if ($form_pengajuan_hukum->every(fn($form) => $form->status == 1))
                <h1 class="text-center">Belum Ada Pengajuan</h1>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover table-sm text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                                <th>Via</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($form_pengajuan_hukum as $form)
                            @if ($form->status == 0)
                            <tr>
                                <td>{{ $form->user->name }}</td>
                                <td>{{ $form->user->email }}</td>
                                <td>{{ $form->tanggal }}</td>
                                <td>{{ $form->waktu }}</td>
                                <td>{{ $form->via }}</td>
                                <td>
                                    <span class="badge badge-danger">Unconfirmed</span>
                                </td>
                                <td>
                                    <div class="text-nowrap d-inline-flex align-items-center">
                                        <form action="{{ route('form.updateStatusHukum', $form->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm mr-2">Confirm</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table -->

                </div>
            @endif
        </div>
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4 pt-5">
        <h1 class="h3 mb-0 text-gray-800">Pengajuan Terkonfirmasi</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            @if ($form_pengajuan_hukum->every(fn($form) => $form->status == 0))
                <h2 class="text-center">Belum Ada Yang Terkonfirmasi</h2>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover table-sm text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                                <th>Via</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($form_pengajuan_hukum as $form)
                            @if ($form->status == 1)
                            <tr>
                                <td>{{ $form->user->name }}</td>
                                <td>{{ $form->user->email }}</td>
                                <td>{{ $form->tanggal }}</td>
                                <td>{{ $form->waktu }}</td>
                                <td>{{ $form->via }}</td>
                                <td>
                                    <span class="badge badge-success">Confirmed</span>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table -->

                </div>
            @endif
        </div>
    </div>
@else
<div class="card shadow mb-2">
    <div class="card-body">
        <h1 class="text-center">Anda Tidak Memiliki Akses</h1>
    </div>
</div>
@endif

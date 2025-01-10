<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modal Details</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .text-left {
            text-align: left;
        }
        .badge {
            padding: 5px 10px;
            border-radius: 4px;
        }
        .badge-warning {
            background-color: #ffc107;
            color: black;
        }
    </style>
</head>
<body>
    <h2>Informasi Lain Dari Pelapor: <strong>{{ $form->user->name }}</strong></h2>
    <table>
        <thead>
            <tr>
                <th>Pelaku</th>
                <th>Telp Lain</th>
                <th>Domisili</th>
                <th>Deskripsi Kejadian</th>
                <th>Disabilitas</th>
                <th>Alasan Pengaduan</th>
                <th>Membutuhkan</th>
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
</body>
</html>

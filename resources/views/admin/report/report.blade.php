@extends('admin.app')

@section('content')

    @if (request()->is('dashboard/report/pengaduan'))

    @include('admin.report.pengaduan')

    @elseif(request()->is('dashboard/report/pengajuan-hukum'))

    @include('admin.report.pengajuan_hukum')

    @else

    @include('admin.report.pengajuan_konseling')

    @endif

@endsection
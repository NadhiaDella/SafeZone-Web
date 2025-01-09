<?php

namespace App\Http\Controllers;

use App\Models\kegiatan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $search = $request->search;
            $datas = kegiatan::where('kegiatan_name', 'like', '%' . request('search') . '%')
                ->orWhere('kegiatan_location', 'like', '%' . request('search') . '%')
                ->get();
        } else {
            $datas = kegiatan::all();
        }

        

        return view('admin.agendaKegiatan.index', compact('datas'));
    }

    public function create()
    {
        return view('admin.agendaKegiatan.create');
    }
    public function store(Request $request)
    {

        if($request->hasFile('kegiatan_image'))
        {
            $namaGambar = $request->kegiatan_name.'-'.$request->kegiatan_location.'-'.time().'.'.$request->file('kegiatan_image')->extension();
            $request->file('kegiatan_image')->move(public_path('Gambar'), $namaGambar);

        }

            kegiatan::create([
            'kegiatan_name' => $request->kegiatan_name,
            'kegiatan_location' => $request->kegiatan_location,
            'kegiatan_image' => $namaGambar,
            'tanggal' => $request->tanggal,

        ]);

        return redirect()->route('agenda.kegiatan.index')->with('status', 'Berhasil Menambahkan Agenda');
    }

    public function edit(kegiatan $id)
    {
        $data = $id;
        return view('admin.agendaKegiatan.edit', compact('data'));
    }

    public function update(Request $request, kegiatan $id)
    {

        if($request->hasFile('kegiatan_image'))
        {
            $namaGambar = $request->kegiatan_name.'-'.$request->kegiatan_location.'-'.time().'.'.$request->file('kegiatan_image')->extension();
            $lokasiFileLama = public_path('Gambar/'.$id->kegiatan_image);
            unlink($lokasiFileLama);
            $request->file('kegiatan_image')->move(public_path('Gambar'), $namaGambar);

        }else{

            $namaGambar = $id->kegiatan_image;
        }

        $id->update([
            'kegiatan_name' => $request->kegiatan_name,
            'kegiatan_location' => $request->kegiatan_location,
            'kegiatan_image' => $namaGambar,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('agenda.kegiatan.index')->with('status', 'Berhasil Meng-update Agenda');
    }

    public function destroy(kegiatan $id)
    {
        $lokasiFile = public_path('Gambar/'.$id->kegiatan_image);
        unlink($lokasiFile);

        $id->delete();
        return redirect()->route('agenda.kegiatan.index')->with('status', 'Berhasil Menghapus Agenda');
    }

}

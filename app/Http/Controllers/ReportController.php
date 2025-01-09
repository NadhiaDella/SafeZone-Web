<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index()
    {
        $form_pengaduan = [];
        $form_pengajuan_hukum = [];
        $form_pengajuan_konseling = [];

        $id = Auth::user()->id;

        if(Auth::user()->role_id == 1){

            //Admin
            $form_pengaduan = Form::where('form_type_id', 1)->with('user', 'reasons', 'needs')->get();
            $form_pengajuan_hukum = Form::where('form_type_id', 2)->with('user')->get();
            $form_pengajuan_konseling = Form::where('form_type_id', 3)->with('user')->get();

        }elseif(Auth::user()->role_id == 2){

            //Guest
            $form_pengaduan = Form::where(['form_type_id' => 1, 'user_id' => $id])->with('user', 'reasons', 'needs')->get();
            $form_pengajuan_hukum = Form::where(['form_type_id' => 2,'user_id' => $id])->with('user', 'advocat')->get();
            $form_pengajuan_konseling = Form::where(['form_type_id' => 3,'user_id' => $id])->with('user', 'doctor')->get();

        }elseif(Auth::user()->role_id == 3){

            //Advokat
            $form_pengajuan_konseling = Form::where(['form_type_id' => 3,'doctor_id' => Auth::user()->id])->with('user')->get();

        }else{

            //Doctor
            $form_pengajuan_hukum = Form::where([ 'form_type_id' => 2,'advocat_id' => Auth::user()->id,])->with('user')->get();
        }

        $compacts = ['form_pengaduan', 'form_pengajuan_hukum', 'form_pengajuan_konseling'];

        return view('admin.report.report', compact($compacts));
    }

    // // public function update(Request $request, $id)
    // // {
    // //     // Temukan user berdasarkan ID
    // //     $form = Form::findOrFail($id);

    // //     // Perbarui data user
    // //     $form->update([
    // //         'name' => $request->name,
    // //         'bertindak_sebagai'=> $request->bertindak_sebagai,
    // //         'email' => $request->email,
    // //         'nama_korban'=> $request->nama_korban,

    // //     ]);

    //     // Redirect dengan pesan sukses
    //     return redirect()->route('manajemen.user')->with('status', 'Berhasil Diperbarui');;
    // }
}

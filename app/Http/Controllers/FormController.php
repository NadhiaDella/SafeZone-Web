<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\form_reasonComplainers;
use App\Models\form_whatUNeed;
use App\Models\reasonComplainers;
use App\Models\User;
use App\Models\whatUNeed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{

    public function form()
    {
        $reasoncomplainer = reasonComplainers::all();
        $whatuneed = whatUNeed::all();
        return view('Pages.form', compact('reasoncomplainer', 'whatuneed'));
    }

    public function form2(Request $request)
    {
        if($request->is('form/pengajuan-hukum')){
            $data = '4';
            $relation = 'advocat';
        }else{
            $data = '3';
            $relation = 'doctor';
        }
        
        $users = User::where('role_id', $data)->with($relation)->get();
        return view('Pages.form2', compact('users'));
    }

    public function store(Request $request)
    {
        //dd($request->all());

        if (Auth::check()) {

            if ($request->nama_korban == null) {
                $data = Auth::user()->name;
            } else {
                $data = $request->nama_korban;
            }

            $form = Form::create([
                'user_id' => Auth::user()->id,
                'form_type_id' => $request->form_type_id,
                'nama_korban' => $data,
                'bertindak_sebagai' => $request->bertindak_sebagai,
                'tgl_lapor' => $request->tgl_lapor,
                'no_telp' => $request->no_telp,
                'no_telp_lain' => $request->no_telp_lain,
                'domisili' => $request->domisili,
                'jenis_kekerasan_seksual' => $request->jenis_kekerasan_seksual,
                'cerita_singkat_peristiwa' => $request->cerita_singkat_peristiwa,
                'is_disabilitas' => filter_var($request->is_disabilitas, FILTER_VALIDATE_BOOLEAN),
                'desc_disabilitas' => $request->desc_disabilitas,
                'nama_pelaku' => $request->nama_pelaku,
            ]);

            if ($request->has('reasoncomplainer')) {
                foreach ($request->reasoncomplainer as $reasonId) {
                    form_reasonComplainers::create([
                        'form_id' => $form->id,
                        'reasonComplainer_id' => $reasonId,
                    ]);
                }
            }

            if ($request->has('whatuneed')) {
                foreach ($request->whatuneed as $needId) {
                    form_whatUNeed::create([
                        'form_id' => $form->id,
                        'whatuneed_id' => $needId,
                    ]);
                }
            }

            return redirect('/form')->with('status', 'Informasi Berhasil Di Simpan');
        } else {

            return redirect()->route('login');
        }
    }

    public function store_hukum(Request $request)
    {
        //dd($request->all());
        Form::create([
            'user_id' => Auth::user()->id,
            'advocat_id' => $request->advocat_id,
            'form_type_id' => 2,
            'via' => $request->via ?? "Video Call",
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'status' => false 
        ]);

        return redirect('/')->with('status', 'Pengajuan Berhasil');
        
    }
    
    public function store_konseling(Request $request)
    {
        //dd($request->all());
        Form::create([
            'user_id' => Auth::user()->id,
            'doctor_id' => $request->doctor_id,
            'form_type_id' => 3,
            'via' => $request->via,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'status' => false 
        ]);

        return redirect('/')->with('status', 'Pengajuan Berhasil');
    }

    public function updateStatusKonseling($id)
    {
        $form = Form::findOrFail($id);

        $form->status = true;
        $form->save();

        return redirect()->back()->with('status', 'Status updated successfully.');
    }

    public function updateStatusHukum($id)
    {
        $form = Form::findOrFail($id);

        $form->status = true;
        $form->save();

        return redirect()->back()->with('status', 'Status updated successfully.');
    }

    public function destroy($id)
    {
        // Find the item by ID
        $item = Form::find($id);

        if ($item) {
            // Delete the item
            $item->delete();

            // Redirect or return a response
            return redirect()->route('dashboard.report')->with('success', 'Item deleted successfully.');
        } else {
            return redirect()->route('dashboard.report')->with('error', 'Item not found.');
        }
    }
}

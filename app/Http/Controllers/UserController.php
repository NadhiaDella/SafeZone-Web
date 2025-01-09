<?php

namespace App\Http\Controllers;

use App\Models\Advocat;
use App\Models\Doctor;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('role_id', 2);
    
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')->orWhere('email', 'like', '%' . $search . '%');
            });
        }
    
        $users = $query->get();
    
        return view('admin.manajemenUser.index', compact('users'));
    }
    
    public function create()
    {   
        $roles = Role::all();
        return view('admin.manajemenUser.create', compact('roles'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => 2,
            'password' => Hash::make($request->password)
        ];

        User::create($data);

        return redirect()->route('manajemen.user')->with('status', 'Berhasil Ditambah');
    }

    public function edit($id)
    {
        $data = User::find($id);
        return view("admin.manajemenUser.edit", compact('data'));
    }

    public function update(Request $request, $id)
    {
        // Temukan user berdasarkan ID
        $user = User::findOrFail($id);

        // Simpan password lama jika tidak ada password baru
        $password = $user->password;
        if ($request->password != null) {
            $password = bcrypt($request->password); // Hash password baru
        }

        // Perbarui data user
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('manajemen.user')->with('status', 'Berhasil Diperbarui');;
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('manajemen.user')->with('status', 'Berhasil Dihapus');
    }

    //konselor
    public function indexKonselor(Request $request)
    {
        $users = User::where('role_id', 3)->get();
    
        return view('admin.manajemenKonselor.index', compact('users'));
    }

    public function createKonselor()
    {
        return view('admin.manajemenKonselor.create');
    }

    public function storeKonselor(Request $request)
    {
        if($request->hasFile('foto') && $request->hasFile('cv'))
        {
            $namaFoto = $request->name.'-konselor-foto-'.time().'.'.$request->file('foto')->extension();
            $namaCV = $request->name.'-konselor-foto-cv-'.time().'.'.$request->file('cv')->extension();
            $request->file('foto')->move(public_path('Gambar'), $namaFoto);
            $request->file('cv')->move(public_path('Gambar'), $namaCV);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'description' => $request->deskripsi,
            'image' => $namaFoto, 
            'cv_image' => $namaCV,
            'role_id' => 3,
            'password' => Hash::make($request->password)
        ]);

        Doctor::create([
            'user_id' => $user->id,
            'title' => $request->title,
        ]);
        
        return redirect()->route('manajemen.konselor.index')->with('status', 'Berhasil Ditambah');
        
    }

    public function editKonselor(User $id)
    {
        return view('admin.manajemenKonselor.edit', compact('id'));
    }

    public function updateKonselor(User $id, Request $request)
    {
        $password = $id->password;
        $namaFoto = $id->image;
        $namaCV = $id->cv_image;

        if($request->has('password')){
            $password = bcrypt($request->password);
        }

        if($request->hasFile('foto')){
            $namaFoto = $request->name.'-konselor-foto-'.time().'.'.$request->file('foto')->extension();
            $request->file('foto')->move(public_path('Gambar'), $namaFoto);
            unlink(public_path('Gambar/'. $id->image));
            
        }
        
        if($request->hasFile('cv')){
            $namaCV = $request->name.'-konselor-foto-cv-'.time().'.'.$request->file('cv')->extension();
            $request->file('cv')->move(public_path('Gambar'), $namaCV);
            unlink(public_path('Gambar/'. $id->cv_image));

        }

        $id->update([
            'name' => $request->name,
            'email' => $request->email,
            'description' => $request->deskripsi,
            'password' => $password,
            'image' => $namaFoto,
            'cv_image' => $namaCV,
        ]);

        Doctor::where('user_id', $id->id)->update([
            'title' => $request->title
        ]);

        return redirect()->route('manajemen.konselor.index')->with('status', 'Berhasil DiUpdate');
    }
    
    public function destroyKonselor(User $id)
    {
        $lokasiFileFoto = public_path('Gambar/'.$id->image);
        $lokasiFileCV = public_path('Gambar/'.$id->cv_image);
        unlink($lokasiFileFoto);
        unlink($lokasiFileCV);

        $id->delete();

        return redirect()->route('manajemen.konselor.index')->with('status', 'Berhasil Dihapus');
    }    

    //advokat
    public function indexAdvokat(Request $request)
    {
        $users = User::where('role_id', 4)->get();
    
        return view('admin.manajemenAdvokat.index', compact('users'));
    }

    public function createAdvokat()
    {   
        return view('admin.manajemenAdvokat.create');
    }

    public function storeAdvokat(Request $request)
    {
        if($request->hasFile('foto') && $request->hasFile('cv'))
        {
            $namaFoto = $request->name.'-advokat-foto-'.time().'.'.$request->file('foto')->extension();
            $namaCV = $request->name.'-advokat-foto-cv-'.time().'.'.$request->file('cv')->extension();
            $request->file('foto')->move(public_path('Gambar'), $namaFoto);
            $request->file('cv')->move(public_path('Gambar'), $namaCV);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'description' => $request->deskripsi,
            'image' => $namaFoto, 
            'cv_image' => $namaCV,
            'role_id' => 4,
            'password' => Hash::make($request->password)
        ]);

        Advocat::create([
            'user_id' => $user->id,
            'title' => $request->title,
        ]);
        
        return redirect()->route('manajemen.advokat.index')->with('status', 'Berhasil Ditambah');
        
    }

    public function editAdvokat(User $id)
    {
        return view('admin.manajemenAdvokat.edit', compact('id'));
    }

    public function updateAdvokat(User $id, Request $request)
    {
        $password = $id->password;
        $namaFoto = $id->image;
        $namaCV = $id->cv_image;

        if($request->has('password')){
            $password = bcrypt($request->password);
        }

        if($request->hasFile('foto')){
            $namaFoto = $request->name.'-advokat-foto-'.time().'.'.$request->file('foto')->extension();
            $request->file('foto')->move(public_path('Gambar'), $namaFoto);
            unlink(public_path('Gambar/'. $id->image));
            
        }
        
        if($request->hasFile('cv')){
            $namaCV = $request->name.'-advokat-foto-cv-'.time().'.'.$request->file('cv')->extension();
            $request->file('cv')->move(public_path('Gambar'), $namaCV);
            unlink(public_path('Gambar/'. $id->cv_image));

        }

        $id->update([
            'name' => $request->name,
            'email' => $request->email,
            'description' => $request->deskripsi,
            'password' => $password,
            'image' => $namaFoto,
            'cv_image' => $namaCV,
        ]);

        Advocat::where('user_id', $id->id)->update([
            'title' => $request->title
        ]);

        return redirect()->route('manajemen.advokat.index')->with('status', 'Berhasil DiUpdate');
    }
    
    public function destroyAdvokat(User $id)
    {
        $lokasiFileFoto = public_path('Gambar/'.$id->image);
        $lokasiFileCV = public_path('Gambar/'.$id->cv_image);
        unlink($lokasiFileFoto);
        unlink($lokasiFileCV);

        $id->delete();

        return redirect()->route('manajemen.advokat.index')->with('status', 'Berhasil Dihapus');
    }

    public function activeStatus(User $id)
    {
        //dd($request->all());
        $max = 5;
        $currentValue = User::where('role_id', $id->role_id)->where('status', 1)->count();

        if($id->status == 1){
            $id->update([
                'status' => 0
            ]);
            return back()->with('status', 'Status berhasil diperbarui!');
        }else{
            
            if($currentValue < $max){
                $id->update([
                    'status' => 1,
                ]);
                return back()->with('status', 'Status berhasil diperbarui!');
                
            }else{
                return back()->with('status', 'Total Active Maksimum!');
    
            }
        }



    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Advocat;
use App\Models\Doctor;
use App\Models\kegiatan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    public function index()
    {
        $events = kegiatan::where('tanggal', '>=', Carbon::today())
                ->orderBy('tanggal', 'asc')
                ->paginate(5);
        $doctors = User::where('status', 1)->where('role_id', 3)->with('doctor')->get();
        $advocats = User::where('status', 1)->where('role_id', 4)->with('advocat')->get();
        return view('Pages.index', compact('doctors','advocats', 'events'));
    }

    public function show_hukum($id)
    {
        $advocat = Advocat::findOrFail($id);

        return view('Pages.show_form_hukum', compact('advocat'));
    }
    public function show_konsel($id)
    {

        $doctor = Doctor::findOrFail($id);

        return view('Pages.show_form_konsel', compact('doctor'));

    }
}

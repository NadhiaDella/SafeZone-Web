<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\form_whatUNeed;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $total_pengadu = Form::where('form_type_id', 1)->count();
        $total_saksi = Form::where('bertindak_sebagai', 'Saksi')->count();
        $total_korban = Form::where('bertindak_sebagai', 'Korban')->count();
        $konseling_psikologis = form_whatUNeed::where('whatuneed_id', 1)->count();
        $konseling_rohani = form_whatUNeed::where('whatuneed_id', 2)->count();
        $bantuan_hukum = form_whatUNeed::where('whatuneed_id', 3)->count();
        $bantuan_medis = form_whatUNeed::where('whatuneed_id', 4)->count();
        $tidak_butuh = form_whatUNeed::where('whatuneed_id', 5)->count();

        // Pemgambilan Data untuk PIE CHART
        $korban = round(($total_korban/$total_pengadu) * 100, 2);
        $saksi = round(($total_saksi/$total_pengadu) * 100, 2);
        $chart_data = [$korban, $saksi];
        
        return view('admin.dashboard.index', compact(
            'total_pengadu',
            'total_korban', 
            'total_saksi',
            'konseling_psikologis',
            'konseling_rohani',
            'bantuan_hukum',
            'bantuan_medis',
            'tidak_butuh',
            'chart_data'
        ));
    }
}

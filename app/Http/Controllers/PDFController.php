<?php

namespace App\Http\Controllers;
use App\Models\Form; // Replace with your actual model
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function generateModalPDF($id)
    {
        $form = Form::with(['user', 'reasons', 'needs'])->findOrFail($id);

        $pdf = Pdf::loadView('pdf.modal', compact('form'))
                  ->setPaper('a4', 'portrait'); // Adjust paper size/orientation if needed

        return $pdf->stream('modal-details.pdf'); // Change to ->download('filename.pdf') for download
    }
}

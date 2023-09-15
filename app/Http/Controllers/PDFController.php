<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PDFController extends Controller
{
    public function downloadPDF()
    {
        // Logika untuk membuat PDF dan mengunduhnya
        $pdf = PDF::loadView('skripsi'); // Ganti 'pdf.template' dengan nama view Anda

        return $pdf->download('skripsi.pdf');
    }
}

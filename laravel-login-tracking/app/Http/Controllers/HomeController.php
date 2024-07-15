<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Exports\LoginsExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf; //  PDF

class HomeController extends Controller
{
    public function index()
    {
        $logins = Login::where('user_id', auth()->id())->get();
        return view('home', compact('logins'));
    }

    public function exportExcel()
    {
        return Excel::download(new LoginsExport, 'logins.xlsx');
    }

    public function exportPdf()
    {
        $logins = Login::where('user_id', auth()->id())->get();
        $totalLogins = $logins->count(); 
        $pdf = PDF::loadView('pdf.logins', compact('logins', 'totalLogins')); 
        return $pdf->download('logins.pdf');
    }
}

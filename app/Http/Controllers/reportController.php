<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Pengaduan;
class reportController extends Controller
{
	public function pengaduan()
	{
		$pengaduan = Pengaduan::join('masyarakat','masyarakat.id','pengaduan.masyarakat_id')
            ->select('pengaduan.*','fullname')
            ->get();
	    $pdf = PDF::loadView('petugas.pages.report.report', compact('pengaduan'));
	    return $pdf->download('RDF_datapengaduan.pdf');
	}
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\SuratModel;
use App\Models\Takah;
use App\Exports\SuratExport;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        if(!$request->session()->get('LoggedIn')) {
            return redirect('login');
        }

        $tgl1 = $request->tanggal1;
        $tgl2 = $request->tanggal2;
        $owner = $request->pembuat;

        $surat = null;
        $no = 0;

        if($tgl1 || $owner) {
            if($tgl1 && $tgl2) {
                $surat = SuratModel::whereBetween('tanggal', [$tgl1, $tgl2])->get();
            }
            if($owner) {
                $surat = SuratModel::where('pembuat', $owner)->get();
            }
            if($tgl1 && $tgl2 && $owner) {
                $surat = SuratModel::whereBetween('tanggal', [$tgl1, $tgl2])
                                    ->where('pembuat', $owner)->get();
            }
        }

        return view('pages.report', compact('surat', 'no', 'tgl1', 'tgl2', 'owner'));
    }

    public function export(Request $request)
    {
        if(!$request->session()->get('LoggedIn')) {
            return redirect('login');
        }

        return Excel::download(new SuratExport($request->tanggal1, $request->tanggal2, $request->pembuat), 'Report_Penomoran_Surat.xlsx');
    }
}

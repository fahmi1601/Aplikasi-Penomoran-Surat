<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Session;
use App\Models\SuratModel;
use App\Models\Takah;

class SuratController extends Controller
{
    public function index(Request $request)
    {
        if(!$request->session()->get('LoggedIn')) {
            return redirect('login');
        }
        
        $no = 0;
        $surat = SuratModel::orderBy('id', 'desc')->get();
        return view('pages.mysurat', compact('surat', 'no'));
    }

    public function create(Request $request)
    {
        if(!$request->session()->get('LoggedIn')) {
            return redirect('login');
        }

        $takah = Takah::All();
        return view('pages.mysurat_create', compact('takah'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'takah' => 'required',
            'kepada' => 'required',
            'perihal' => 'required'
        ]);

        $check = SuratModel::orderBy('id', 'desc')->take(1)->first();
        if($check->count() == 0) {
            $next = 1;
        }else{
            $next = $check->nomor_surat + 1;
        }

        $surat = new SuratModel;
        $surat->nomor_surat = $next;
        $surat->id_takah = $request->takah;
        $surat->tahun = date('Y');
        $surat->tanggal = date('Y-m-d');
        $surat->kepada = $request->kepada;
        $surat->perihal = $request->perihal;
        $surat->tembusan = $request->tembusan;
        $surat->keterangan = $request->keterangan;
        $surat->pembuat = Session::get('nik');

        $surat->save();
        return redirect('/mysurat')->with('pesan', 'Data penomoran surat berhasil disimpan');
    }

    public function edit(Request $request, $id)
    {
        if(!$request->session()->get('LoggedIn')) {
            return redirect('login');
        }
        
        $takah = Takah::All();
        $surat = SuratModel::find($id);
        return view('pages.mysurat_edit', compact('surat', 'takah'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'takah' => 'required',
            'kepada' => 'required',
            'perihal' => 'required'
        ]);

        $surat = SuratModel::find($id);
        $surat->id_takah = $request->takah;
        $surat->kepada = $request->kepada;
        $surat->perihal = $request->perihal;
        $surat->tembusan = $request->tembusan;
        $surat->keterangan = $request->keterangan;

        $surat->update();
        return redirect('/mysurat')->with('pesan', 'Data penomoran surat berhasil disimpan');
    }
}

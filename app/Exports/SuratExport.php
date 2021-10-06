<?php

namespace App\Exports;

use App\Models\SuratModel;
use App\Models\Takah;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
//use Maatwebsite\Excel\Concerns\FromCollection;

class SuratExport implements FromView
{
    /**
    @return \Illuminate\Support\Collection
    
    public function collection()
    {
        return SuratModel::all();
    }
    */

    use Exportable;

    protected $tgl1;
    protected $tgl2;
    protected $owner;

    function __construct($tgl1, $tgl2, $owner) {
        $this->tgl1 = $tgl1;
        $this->tgl2 = $tgl2;
        $this->owner = $owner;
    }

    public function view(): View
    {
        if($this->tgl1 || $this->owner) {
            if($this->tgl1 && $this->tgl2) {
                $surat = SuratModel::whereBetween('tanggal', [$this->tgl1, $this->tgl2])->get();
            }
            if($this->owner) {
                $surat = SuratModel::where('pembuat', $this->owner)->get();
            }
            if($this->tgl1 && $this->tgl2 && $this->owner) {
                $surat = SuratModel::whereBetween('tanggal', [$this->tgl1, $this->tgl2])
                                    ->where('pembuat', $this->owner)->get();
            }
        }

        return view('export.surat', ['surats' => $surat]);
    }

}

<?php

namespace App\Exports;

use App\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class KompetensiAuditorExport implements FromView
{

    public function searchName(string $nama)
    {
        $this->nama = $nama;

        return $this;
    }

    public function view(): View
    {
        $data = User::whereHas('kompetensi_auditors')
                ->where('nama', 'LIKE', '%' . $this->nama .'%')
                ->with('kompetensi_auditors')
                ->orderBy('nama')->get();

        return view('pages.laporan.kompetensi.excel', compact(['data']));
    }
}

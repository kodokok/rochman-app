<?php

namespace App\Http\Controllers;

use App\KompetensiAuditor;
use App\User;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function temuanaudit()
    {
        return view('pages.laporan.temuanaudit.index');
    }

    public function kompetensi()
    {
        $users = User::with('roles')->pluck('nama', 'id');
        $data = KompetensiAuditor::with('user')->get();

        $data->groupBy('user.nama')->toArray();

        return view('pages.laporan.kompetensi.index', compact(['users', 'data']));
    }

    public function temuanauditPreview(Request $request)
    {
        $data = null;
        return view('pages.laporan.temuanaudit.preview', compact(['data']));
    }

    public function kompetensiData(Request $request)
    {
        // $data = KompetensiAuditor::with('user')->get();
        $data = User::whereHas('kompetensi_auditors')
            ->with('kompetensi_auditors')
            ->orderBy('nama')->get();

        return response()->json(['data'=> $data], 200);
    }
}

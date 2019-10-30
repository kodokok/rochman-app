<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function temuanaudit()
    {
        return view('pages.laporan.temuanaudit');
    }
}

<?php

namespace App\Http\Controllers;

// use App\KompetensiAuditor;

use App\Departemen;
use App\Exports\KompetensiAuditorExport;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use PDF;
use Excel;

class LaporanController extends Controller
{
    public function index()
    {
        return view('pages.laporan.index');
    }

    public function kompetensiShow()
    {
        return view('pages.laporan.kompetensi.form');
    }

    public function kompetensiPrint(Request $request)
    {
        $res = [];
        $filepath = '';
        $filename = '';

        $data = User::whereHas('kompetensi_auditors')
            ->where('nama', 'LIKE', "%$request->filter_nama%")
            ->with('kompetensi_auditors')
            ->orderBy('nama')->get();

        if (!$data->isEmpty()) {
            $filepath = Storage::disk('public')->path('pdf/');
            $filename = 'kompetensi_' . now()->format('YmdHis') . '.pdf';

            $pdf = PDF::loadView('pages.laporan.kompetensi.pdf', compact(['data']));
            $pdf->setOptions([
                'footer-right' => 'Page [page] of [toPage]',
                'footer-font-size' => 7
            ]);

            $pdf->save($filepath . $filename);
            $res = [
                'url' => route('laporan.pdf', $filename)
            ];
        } else {
            $res = [
                'url' => '',
                'message' => 'Data tidak ditemukan "' . $request->filter_nama . '"'
            ];
        }

        return response()->json($res, 200);
    }


    public function temuanauditShow()
    {
        return view('pages.laporan.temuanaudit.form');
    }

    public function temuanauditPrint(Request $request)
    {
        $dateFrom = $request['dateFrom'] ? Carbon::parse($request['dateFrom'])->format('Y-m-d') : null;
        $dateTo = $request['dateTo'] ? Carbon::parse($request['dateTo'])->format('Y-m-d') : null;
        $data = Departemen::query();
        $week = null;

        if ($dateFrom != null || $dateTo != null) {
            $data = $data->whereHas('auditplans', function($q) use ($dateFrom, $dateTo){
                $q->whereBetween('tanggal', [$dateFrom, $dateTo]);
            });
            $week = !empty($dateTo) ? Carbon::parse($dateTo)->format('w') :
                !empty($dateFrom) ? Carbon::parse($dateFrom)->format('w') : '';
        } else {
            $data = $data->has('auditplans');
        }

        $data = $data->with('auditplans', 'auditplans.temuanAudits', 'auditplans.temuanAudits.klausul')->get();
        $res = [];

        if (!$data->isEmpty()) {
            $filepath = Storage::disk('public')->path('pdf/');
            $filename = 'temuanaudit_' . now()->format('YmdHis') . '.pdf';

            $pdf = PDF::loadView('pages.laporan.temuanaudit.pdf', compact(['data', 'week']));
            $pdf->setOptions([
                'footer-right' => 'Page [page] from [toPage]',
                'footer-font-size' => 8
            ]);
            $pdf->save($filepath . $filename);

            $res = [
                'url' => route('laporan.pdf', $filename)
            ];

        } else {
            $res = [
                'url' => '',
                'message' => 'Data tidak ditemukan untuk minggu ke-' . $week
            ];
        }

        return response()->json($res, 200);
    }

    public function getPDF($filename)
    {
        // KompetensiAuditor
        $filepath = Storage::disk('public')->path('pdf/');
        return response()->file($filepath . $filename)->deleteFileAfterSend(true);
    }

    public function getExcel($filename)
    {
        // KompetensiAuditor
        $filepath = Storage::disk('public')->path('excel/');
        return response()->download($filepath . $filename);
    }
}

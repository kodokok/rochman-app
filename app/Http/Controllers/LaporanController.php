<?php

namespace App\Http\Controllers;

// use App\KompetensiAuditor;

use App\Departemen;
use App\Exports\KompetensiAuditorExport;
use App\User;
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
        $rules = [
            'filter_nama' => 'nullable'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors(),
            ]);
        }

        $res = [];
        $filepath = '';
        $filename = '';

        if ($request->has('output') && $request->output == 'pdf') {
            $data = User::whereHas('kompetensi_auditors')
                ->where('nama', 'LIKE', "%$request->filter_nama%")
                ->with('kompetensi_auditors')
                ->orderBy('nama')->get();

            $filepath = Storage::disk('public')->path('pdf/');
            $filename = 'kompetensi_' . now()->format('YmdHis') . '.pdf';

            $pdf = PDF::loadView('pages.laporan.kompetensi.pdf', compact(['data']));
            $pdf->setOptions([
                'footer-right' => 'Page [page] from [topage]',
                'footer-font-size' => 8
            ]);
            $pdf->save($filepath . $filename);

            $res = [
                'url' => route('laporan.pdf', $filename)
            ];
        } else {
            $filepath = 'excel/';
            $filename = 'kompetensi_' . now()->format('YmdHis') . '.xlsx';
            $excel = Excel::store((new KompetensiAuditorExport)->searchName($request->filter_nama), $filepath . $filename, 'public');

            $res = [
                'url' => route('laporan.excel', $filename)
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

        if ($dateFrom != null || $dateTo != null) {
            $data = $data->whereHas('auditplans', function($q) use ($dateFrom, $dateTo){
                $q->whereBetween('tanggal', [$dateFrom, $dateTo]);
            });
        } else {
            $data = $data->has('auditplans');
        }

        $data = $data->with('auditplans', 'auditplans.temuanAudits', 'auditplans.temuanAudits.klausul')->get();

        $filepath = Storage::disk('public')->path('pdf/');
        $filename = 'temuanaudit_' . now()->format('YmdHis') . '.pdf';

        if ($request->has('output') && $request->output == 'pdf') {
            $pdf = PDF::loadView('pages.laporan.temuanaudit.pdf', compact(['data']));
            $pdf->setOptions([
                'footer-right' => 'Page [page] from [topage]',
                'footer-font-size' => 8
            ]);
            $pdf->save($filepath . $filename);

            $res = [
                'url' => route('laporan.pdf', $filename)
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

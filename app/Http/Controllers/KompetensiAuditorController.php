<?php

namespace App\Http\Controllers;

use App\KompetensiAuditor;
use App\User;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KompetensiAuditorController extends Controller
{
    protected $auditorRoles = ['auditor','auditor_lead','admin'];

    public function index()
    {
        return view('pages.kompetensi.index');
    }

    public function create()
    {
        $model = new KompetensiAuditor();
        $auditor = User::role($this->auditorRoles)->pluck('nama', 'id');

        return view('pages.kompetensi.form', compact(['model','auditor']));
    }

    public function store(Request $request)
    {
        $rules = [
            'user_id' => 'required',
            'nilai' => 'nullable|integer',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors(),
            ]);
        }

        KompetensiAuditor::create($request->all());

        return response()->json(['success' => 'success'], 200);
    }

    public function edit(KompetensiAuditor $kompetensi)
    {
        $model = $kompetensi;

        // dd($model->tanggal_pelatihan);
        $auditor = User::role($this->auditorRoles)->pluck('nama', 'id');

        return view('pages.kompetensi.form', compact(['model','auditor']));
    }

    public function update(Request $request, KompetensiAuditor $kompetensi)
    {
        $rules =  [
            'user_id' => 'required',
            'nilai' => 'nullable|integer'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors(),
            ]);
        }

        $kompetensi->update([
            'user_id' => $request->user_id,
            'pelatihan' => $request->pelatihan,
            'nilai' => $request->nilai,
        ]);

        return response()->json(['success' => 'success'], 200);
    }

    public function destroy(KompetensiAuditor $kompetensi)
    {
        try {
            $kompetensi->delete();

            session()->flash('message', 'Data berhasil dihapus!');
            session()->flash('alert-type', 'success');
        } catch (\Illuminate\Database\QueryException $e) {
            session()->flash('message', 'Data tidak bisa dihapus!');
            session()->flash('alert-type', 'error');
        }

        $redirect_to = ['redirect_to' => route('kompetensi.index')];
        return response()->json($redirect_to);
    }

    public function datatable()
    {
        $model = KompetensiAuditor::all();
        // dd($model);
        return DataTables::of($model)
            ->addColumn('auditor', function($model) {
                return $model->user->nama;
            })
            ->addColumn('action', function ($model) {
                return view('layouts.partials._action', [
                    'model' => $model,
                    'url_show' => null,
                    'url_edit' => route('kompetensi.edit', $model->id),
                    'url_destroy' => route('kompetensi.destroy', $model->id),
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}

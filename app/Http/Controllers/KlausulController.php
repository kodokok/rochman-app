<?php

namespace App\Http\Controllers;

use App\Klausul;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class KlausulController extends Controller
{
    public function index()
    {
        return view('pages.klausul.index');
    }

    public function create()
    {
        return view('pages.klausul.form', compact(['klausul']));
    }

    public function store(Request $request)
    {
        $rules = [
            'objektif_audit' => 'required|string|max:50',
            'nama' => 'required|string|max:150|unique:klausul,nama',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors(),
            ]);
        }

        Klausul::create($request->all());

        return response()->json(['success' => 'success'], 200);
    }

    public function edit(Klausul $klausul)
    {
        return view('pages.klausul.form', compact(['klausul']));
    }

    public function update(Request $request, Klausul $klausul)
    {
        // dd($request->all());
        $rules = [
            'objektif_audit' => 'required|string|max:50',
            'nama' => 'required|string|max:150|unique:klausul,nama,' . $klausul->id,
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors(),
            ]);
        }

        $klausul->update([
            'objektif_audit' => $request->objektif_audit,
            'nama' => $request->nama,
        ]);

        return response()->json(['success' => 'success'], 200);
    }

    public function destroy(Klausul $klausul)
    {
        $klausul->delete();
    }

    public function datatable()
    {
        $klausul = Klausul::all();
        // dd($klausul->kadept->id);
        return DataTables::of($klausul)
            ->addColumn('action', function ($klausul) {
                return view('partials.table-action.klausul', [
                    'klausul' => $klausul,
                    'url_show' => null,
                    'url_edit' => route('klausul.edit', $klausul->id),
                    'url_destroy' => route('klausul.destroy', $klausul->id),
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}

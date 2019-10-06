<?php

namespace App\Http\Controllers;

use App\Klausul;
use Illuminate\Http\Request;
use DataTables;

class KlausulController extends Controller
{
    public function index()
    {
        return view('pages.klausul.index');
    }

    public function create()
    {
        $klausul = new Klausul();
        return view('pages.klausul.form', compact(['klausul']));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'objektif_audit' => 'required|string|max:50',
            'nama' => 'required|string|max:50|unique:klausul,nama',
        ]);

        $klausul = Klausul::create($request->all());

        return $klausul;
    }

    public function edit(Klausul $klausul)
    {
        return view('pages.klausul.form', compact(['klausul']));
    }

    public function update(Request $request, Klausul $klausul)
    {
        $this->validate($request, [
            'objektif_audit' => 'required|string|max:50',
            'nama' => 'required|string|max:150|unique:klausul,nama,' . $klausul->id,
        ]);

        $klausul->update($request->all());
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

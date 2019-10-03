<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departemen;
use DataTables;
use App\User;

class DepartemenController extends Controller
{
    public function index()
    {
        return view('pages.departemen.index');
    }

    public function create()
    {
        $departemen = new Departemen();
        $kadept = User::pluck('nama','id')->all();;
        return view('pages.departemen.form', compact(['departemen','kadept']));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kode' => 'required|alpha_dash|max:10|unique:departemen,kode',
            'nama' => 'required|string|max:50|unique:departemen,nama',
        ]);

        $departemen = Departemen::create($request->all());

        return $departemen;
    }

    public function edit(Departemen $departemen)
    {
        $kadept = User::pluck('nama','id')->all();
        return view('pages.departemen.form', compact(['departemen', 'kadept']));
    }

    public function update(Request $request, Departemen $departemen)
    {
        $this->validate($request, [
            'kode' => 'required|alpha_dash|max:40|unique:departemen,kode,' . $departemen->id,
            'nama' => 'required|string|max:40|unique:departemen,nama,' . $departemen->id,
        ]);

        $departemen->update($request->all());
    }

    public function destroy(Departemen $departemen)
    {
        $departemen->delete();
    }

    public function datatable()
    {
        $departemen = Departemen::with('kadept')->get();
        return DataTables::of($departemen)
            ->addColumn('kadept', function($departemen) {
                return $departemen ? $departemen->kadept->nama : '';
            })
            ->addColumn('action', function ($departemen) {
                return view('partials.table-action.departemen', [
                    'departemen' => $departemen,
                    'url_show' => null,
                    'url_edit' => route('departemen.edit', $departemen->id),
                    'url_destroy' => route('departemen.destroy', $departemen->id),
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}

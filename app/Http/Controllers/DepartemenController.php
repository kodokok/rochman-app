<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departemen;
use DataTables;
use App\User;
use Illuminate\Support\Facades\Validator;

class DepartemenController extends Controller
{
    public function index()
    {
        return view('pages.departemen.index');
    }

    public function create()
    {
        $departemen = new Departemen();
        $kadept = User::role(['kadept', 'direksi'])->pluck('nama', 'id');
        return view('pages.departemen.form', compact(['departemen','kadept']));
    }

    public function store(Request $request)
    {
        $rules = [
            'kode' => 'required|alpha_dash|max:10|unique:departemen,kode',
            'nama' => 'required|string|max:50|unique:departemen,nama',
            'kadept_user_id' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors(),
            ]);
        }

        Departemen::create($request->all());

        return response()->json(['success' => 'success'], 200);
    }

    public function edit(Departemen $departemen)
    {
        $kadept = User::role(['kadept', 'direksi'])->pluck('nama', 'id');
        return view('pages.departemen.form', compact(['departemen', 'kadept']));
    }

    public function update(Request $request, Departemen $departemen)
    {
        $rules = [
            'kode' => 'required|alpha_dash|max:40|unique:departemen,kode,' . $departemen->id,
            'nama' => 'required|string|max:40|unique:departemen,nama,' . $departemen->id,
            'kadept_user_id' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors(),
            ]);
        }

        $departemen->update($request->all());

        return response()->json(['success' => 'success'], 200);
    }

    public function destroy(Departemen $departemen)
    {
        try {
            $departemen->delete();

            session()->flash('message', 'Data berhasil dihapus!');
            session()->flash('alert-type', 'success');
        } catch (\Illuminate\Database\QueryException $e) {
            session()->flash('message', 'Data tidak bisa dihapus!');
            session()->flash('alert-type', 'error');
        }

        $redirect_to = ['redirect_to' => route('departemen.index')];
        return response()->json($redirect_to);
    }

    public function kadept($id)
    {
        $departemen = Departemen::with('kadept')->find($id);
        return $departemen->kadept->nama;
    }

    public function datatable()
    {
        $departemen = Departemen::with('kadept')->get();
        // dd($departemen->kadept->id);
        return DataTables::of($departemen)
            ->addColumn('kadept', function($departemen) {
                return $departemen->kadept->nama;
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

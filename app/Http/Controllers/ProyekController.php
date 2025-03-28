<?php

namespace App\Http\Controllers;

use App\Models\ProyekModel;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
    public function index()
    {
        $proyek = ProyekModel::select('*')
            ->get();
        return view('proyek.proyek', ['proyek' => $proyek]);
    }
    public function tambahproyek()
    {
        return view('proyek.tambahproyek');
    }
    public function insertproyek(Request $request)
    {

        ProyekModel::create($request->all());
        return redirect('/proyek')->with('success', 'Data berhasil ditambahkan');
    }
    public function tampilproyek($id)
    {
        $proyek = ProyekModel::find($id);
        return view('proyek.editproyek', compact('proyek'));
    }
    public function updateproyek(Request $request, $id)
    {
        $proyek = ProyekModel::find($id);
        $proyek->update($request->all());
        return redirect('/proyek')->with('success', 'Data berhasil diedit');
    }
    public function deleteproyek($id)
    {
        $proyek = ProyekModel::find($id);
        $proyek->delete();
        return redirect('/proyek')->with('success', 'Data berhasil dihapus');
    }
}

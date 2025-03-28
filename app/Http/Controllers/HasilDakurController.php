<?php

namespace App\Http\Controllers;

use App\Models\BiodataModel;
use App\Models\HasilDakurModel;
use App\Models\ProyekModel;
use App\Models\QualityControlModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HasilDakurController extends Controller
{
    public function index(Request $request)
    {
        $proyekId = $request->input('proyek_id');
        $hasildakur = HasilDakurModel::with(['biodata.quality.proyek'])
            ->when($proyekId, function ($query) use ($proyekId) {
                return $query->where('proyek_id', $proyekId);
            })
            ->get();
        $proyeks = ProyekModel::all();

        return view('hasildakur.hasildakur', compact('hasildakur', 'proyeks', 'proyekId'));
    }
    public function tambahhasildakur()
    {
        $terdaftar = HasilDakurModel::pluck('biodata_id')->toArray();


        $hasildakurbiodata = BiodataModel::whereNotIn('id', $terdaftar)->get();
        $hasildakurquality = QualityControlModel::all();
        $hasildakurproyek = ProyekModel::all();
        return view('hasildakur.tambahhasildakur', compact('hasildakurquality', 'hasildakurbiodata', 'hasildakurproyek'));
    }
    public function inserthasildakur(Request $request)
    {

        HasilDakurModel::create($request->all());
        return redirect('/hasildakur')->with('success', 'Data berhasil ditambahkan');
    }
    public function tampilhasildakur($id)
    {
        $hasildakur = HasilDakurModel::find($id);

        return view('hasildakur.edithasildakur', compact('hasildakur'));
    }
    public function updatehasildakur(Request $request, $id)
    {
        $hasildakur = HasilDakurModel::find($id);
        $hasildakur->update($request->all());
        return redirect('/hasildakur')->with('success', 'Data berhasil diedit');
    }
    public function deletehasildakur($id)
    {
        $hasildakur = HasilDakurModel::find($id);
        $hasildakur->delete();
        return redirect('/hasildakur')->with('success', 'Data berhasil dihapus');
    }
    public function deleteSelected(Request $request)
    {
        $ids = $request->input('selected_projects'); // Ambil ID yang dipilih

        if ($ids) {
            HasilDakurModel::whereIn('id', $ids)->delete();
            return response()->json(['message' => 'Proyek yang dipilih berhasil dihapus!']);
        }

        return response()->json(['message' => 'Tidak ada proyek yang dipilih!'], 400);
    }
    public function frindex()
    {
        $terdaftar = HasilDakurModel::pluck('biodata_id')->toArray();
        $hasildakurbiodata = BiodataModel::whereNotIn('id', $terdaftar)->get();
        $hasildakurquality = QualityControlModel::all();
        $hasildakurproyek = ProyekModel::all();
        return view('tampilandepan.dakur', compact('hasildakurbiodata', 'hasildakurquality', 'hasildakurproyek'));
    }
    public function insertfrdakur(Request $request)
    {
        HasilDakurModel::create($request->all());
        return redirect('/')->with('success', 'Data berhasil ditambahkan');
    }
    public function manual()
    {
        $terdaftar = HasilDakurModel::pluck('biodata_id')->toArray();
        $hasildakurbiodata = BiodataModel::whereNotIn('id', $terdaftar)->get();
        $hasildakurquality = QualityControlModel::all();
        $hasildakurproyek = ProyekModel::all();
        return view('tampilandepan.ukurmanual', compact('hasildakurbiodata', 'hasildakurquality', 'hasildakurproyek'));
    }
    public function insertmanual(Request $request)
    {
        DB::beginTransaction();
        try {

            $biodata = BiodataModel::create([
                'nama' => $request->nama,
                'satker' => $request->satker,
                'jabatan' => $request->jabatan,
                'pangkat' => $request->pangkat
            ]);


            HasilDakurModel::create(array_merge(
                $request->all(),
                ['biodata_id' => $biodata->id]
            ));

            DB::commit();
            return redirect('manual')->with('success', 'Data berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('manual')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function print($id)
    {

        $data = HasilDakurModel::findOrFail($id);
        return view('hasildakur.print', compact('data'));
    }
    public function printSelected(Request $request)
    {
        $ids = $request->input('selected_projects');

        if (!$ids) {
            return back()->with('error', 'Tidak ada proyek yang dipilih!');
        }

        $data = HasilDakurModel::with(['proyek', 'biodata', 'quality'])
            ->whereIn('id', $ids)
            ->get();

        return view('hasildakur.printselected', compact('data'));
    }
}

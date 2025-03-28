<?php

namespace App\Http\Controllers;

use App\Models\QualityControlModel;
use Illuminate\Http\Request;

class QualityControlContoller extends Controller
{
    public function index()
    {
          $quality = QualityControlModel::select('*')
            ->get();
        return view('qualitycontrol.qualitycontrol', ['quality' => $quality]);
    }
    public function tambahquality()
    {
        return view('qualitycontrol.tambahquality');
    }
    public function insertquality(Request $request)
    {

        QualityControlModel::create($request->all());
        return redirect('/qualitycontrol')->with('success', 'Data berhasil ditambahkan');
    }
    public function tampilquality($id)
    {
        $quality = QualityControlModel::find($id);
        return view('qualitycontrol.editquality', compact('quality'));
    }
    public function updatequality(Request $request, $id)
    {
        $quality = QualityControlModel::find($id);
        $quality->update($request->all());
        return redirect('/qualitycontrol')->with('success', 'Data berhasil diedit');
    }
      public function deletequality($id)
    {
        $quality = QualityControlModel::find($id);
        $quality->delete();
        return redirect('/qualitycontrol')->with('success', 'Data berhasil dihapus');
    }
}

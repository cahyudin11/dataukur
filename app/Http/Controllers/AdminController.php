<?php

namespace App\Http\Controllers;

use App\Models\BiodataModel;
use App\Models\HasilDakurModel;
use App\Models\ProyekModel;
use App\Models\QualityControlModel;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('template.main');
    }
    public function dashboard()
    {
        $jumlahbiodata = BiodataModel::count();
        $jumlahqc = QualityControlModel::count();
        $jumlahdakur = HasilDakurModel::count();
        $jumlahproyek = ProyekModel::count();
        $jumlahUser = User::where('role', 'user')->where('is_approved', 1)->count();
        $jumlahAdmin = User::where('role', 'admin')->where('is_approved', 1)->count();
        $totalPengguna = User::where('is_approved', 1)->count();
        return view('admin.dashboard', compact('jumlahbiodata', 'jumlahqc', 'jumlahdakur', 'jumlahproyek', 'jumlahUser', 'jumlahAdmin', 'totalPengguna'));
    }
    public function deleteapprove($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/users')->with('success', 'Data berhasil dihapus');
    }
}

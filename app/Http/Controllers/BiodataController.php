<?php

namespace App\Http\Controllers;

use App\Models\BiodataModel;
use App\Models\QualityControlModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\BiodataImport;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class BiodataController extends Controller
{
    public function index(Request $request)
    {
        
    $allSatker = BiodataModel::pluck('satker')->unique();

    $query = BiodataModel::query();
    if ($request->filled('satker')) {
        $query->where('satker', $request->satker);
    }

    $biodata = $query->get();

    return view('biodata.biodata', compact('biodata', 'allSatker'));
    }
    public function tambahbiodata()
    {
        $quality = QualityControlModel::all();
        return view('biodata.tambahbiodata', compact('quality'));
    }
    public function insertbiodata(Request $request)
    {
        $data = $request->all();
        $photoFileName = null;
        $signatureFileName = null;

        if ($request->filled('photo')) {
            $photo_parts = explode(";base64,", $request->photo);
            if (isset($photo_parts[1])) {
                $photo_base64 = base64_decode($photo_parts[1]);
                $photoFileName = 'photo_' . time() . '.jpg';
                Storage::put('public/photos/' . $photoFileName, $photo_base64);
            }
        }

        if ($request->filled('signed')) {
            $signature_parts = explode(";base64,", $request->signed);
            if (isset($signature_parts[1])) {
                $signature_base64 = base64_decode($signature_parts[1]);
                $signatureFileName = 'signature_' . time() . '.png';
                Storage::put('public/signatures/' . $signatureFileName, $signature_base64);
            }
        }

        BiodataModel::create(array_merge(
            $request->except(['photo', 'signed']),
            [
                'photo' => $photoFileName ?? null,
                'signature' => $signatureFileName ?? null,
            ]
        ));

        return redirect('/biodata')->with('success', 'Data berhasil ditambahkan');
    }
    public function tampilbiodata($id)
    {
        $biodata = BiodataModel::find($id);
        return view('biodata.editbiodata', compact('biodata'));
    }
    public function updatebiodata(Request $request, $id)
    {
        $biodata = BiodataModel::findOrFail($id);

        $folderPath = storage_path('app/public/signatures/');

        if (!file_exists($folderPath)) {
            mkdir($folderPath, 0777, true);
        }

        $fileName = $biodata->signature;

        if ($request->signed) {
            if ($biodata->signature) {
                $oldFilePath = $folderPath . $biodata->signature;
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }

            $image_parts = explode(";base64,", $request->signed);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);

            $fileName = uniqid() . '.' . $image_type;
            $filePath = $folderPath . $fileName;

            file_put_contents($filePath, $image_base64);
        }


        $biodata->update(array_merge($request->all(), ['signature' => $fileName]));
        return redirect('/biodata')->with('success', 'Data berhasil diedit');
    }
    public function delete($id)
    {
        $biodata = BiodataModel::find($id);
        if ($biodata->signature) {
            Storage::delete('public/signatures/' . $biodata->signature);
        }
        $biodata->delete();
        return redirect('/biodata')->with('success', 'Data berhasil dihapus');
    }
    public function frindex()
    {
        $quality = QualityControlModel::all();
        return view('tampilandepan.biodatadepan', compact('quality'));
    }

    public function insertfrbiodata(Request $request)
    {

        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'photo' => 'nullable|string',
            'signed' => 'nullable|string',
        ]);

        $photoFileName = null;
        $signatureFileName = null;

        if (!empty($request->photo)) {
            $photo_parts = explode(";base64,", $request->photo);
            $photo_base64 = base64_decode($photo_parts[1]);
            $photoFileName = 'photo_' . time() . '.jpg';
            Storage::put('public/photos/' . $photoFileName, $photo_base64);
        }

        if (!empty($request->signed)) {
            $signature_parts = explode(";base64,", $request->signed);
            $signature_base64 = base64_decode($signature_parts[1]);
            $signatureFileName = 'signature_' . time() . '.png';
            Storage::put('public/signatures/' . $signatureFileName, $signature_base64);
        }


        BiodataModel::create(array_filter([
            'nama' => $validatedData['nama'],
            'photo' => $photoFileName,
            'signature' => $signatureFileName,
        ]));

        return response()->json(['success' => true, 'message' => 'Data berhasil disimpan!']);
    }
    
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv|max:2048'
        ]);
    
        try {
            
            $file = $request->file('file');

            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file->getPathname());
            $sheet = $spreadsheet->getActiveSheet();
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
    
            if ($highestRow < 2) { 
                return redirect()->back()->with('error', 'File Excel kosong atau tidak memiliki data yang valid.');
            }
    
            Excel::import(new BiodataImport, $file);
            return redirect()->back()->with('success', 'Data berhasil diimport!');
    
        } catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
            return redirect()->back()->with('error', 'Format file tidak valid: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengimpor data: ' . $e->getMessage());
        }
    }
}

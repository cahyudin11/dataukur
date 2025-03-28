<?php

namespace App\Imports;

use App\Models\Biodata;
use App\Models\BiodataModel;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BiodataImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new BiodataModel([
            'satker'        => trim($row['satker']),
            'nama'          => trim($row['nama']),
            'jabatan'       => trim($row['jabatan']),
            'pangkat'       => trim($row['pangkat']),
            'tinggi_badan'  => trim($row['tinggibadan']),
            'berat_badan'   => trim($row['beratbadan']),
            'tipe_pakaian'  => trim($row['tipepakaian']),
        ]);
    }
}

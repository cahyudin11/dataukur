<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data Rinci Ukuran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background: white;
        }

        .container {
            width: 21cm;
            max-width: 100%;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .image-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }

        .form-group {
            text-align: center;
            border: 1px solid #ddd;
            padding: 8px;
            border-radius: 5px;
            background: #f9f9f9;
        }

        .form-group img {
            max-width: 100px;
            height: auto;
            display: block;
            margin: 0 auto 5px;
        }

        .form-group label {
            font-weight: bold;
            font-size: 12px;
        }

        .form-control {
            width: 90%;
            font-size: 12px;
            padding: 5px;
        }

        .button-container {
            position: absolute;
            top: 20px;
            left: 20px;
            display: flex;
            gap: 10px;
        }


        .print-btn:hover {
            background: #18a106;
        }

        @media print {
            .button-container {
                display: none;
            }

            body {
                margin: 0;
            }

            .container {
                width: 100%;
                max-width: 100%;
                padding: 0;
            }

            .biodata {
                margin-bottom: 20px;
                padding: 10px;
                border: 1px solid #ddd;
                border-radius: 5px;
                background: #f9f9f9;
            }

            .biodata {
                background: #f4f4f4;
                padding: 15px;
                border: 1px solid #ddd;
                border-radius: 8px;
                margin-bottom: 15px;
                box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
            }

            .biodata p {
                margin: 5px 0;
                font-size: 14px;
            }

            .biodata strong {
                color: #333;
                font-size: 14px;
            }

            .signature {
                position: fixed;
                bottom: 20px;
                right: 10px;
                text-align: right;
            }

            .signature img {
                max-width: 100px;
                /* Sesuaikan ukuran tanda tangan */
                height: 100px;
            }

            .signature p {
                font-style: italic;
                color: #666;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>DATA RINCI UKURAN</h2>
        <div class="biodata">
            <p><strong>Proyek :</strong> {{ $data->proyek->nama_proyek }}</p>
            <p><strong>Nama :</strong> {{ $data->biodata->nama }}</p>
            <p><strong>Satker :</strong> {{ $data->biodata->satker }}</p>
            <p><strong>Jabatan :</strong> {{ $data->biodata->jabatan }}</p>
            <p><strong>Pangkat :</strong> {{ $data->biodata->pangkat }}</p>
            <p><strong>NRP:</strong> {{ $data->biodata->nrp }}</p>
            <p><strong>Tipe Pakaian:</strong> {{ $data->biodata->tipe_pakaian }}</p>
            <p><strong>Tanggal Pengukuran:</strong> {{ $data->biodata->tanggal }}</p>
        </div>
        <div class="image-container">
            <div class="form-group">
                <label>Panjang Baju</label>
                <img src="{{ asset('fotokur/panjang_baju.png') }}" alt="Panjang Baju">
                <input
                    value="{{ $data->panjang_baju !== null ? (fmod($data->panjang_baju, 1) == 0 ? intval($data->panjang_baju) : $data->panjang_baju). ' cm' : '' }}"
                    disabled>
            </div>
            <div class="form-group">
                <label>Lingkar Leher</label>
                <img src="{{ asset('fotokur/lingkar_leher.png') }}" alt="Lingkar Leher">
                <input
                    value="{{ $data->lingkar_leher !== null ? (fmod($data->lingkar_leher, 1) == 0 ? intval($data->lingkar_leher) : $data->lingkar_leher). ' cm'  : '' }}"
                    disabled>
            </div>
            <div class="form-group">
                <label>Lingkar Bahu</label>
                <img src="{{ asset('fotokur/lebar_bahu.png') }}" alt="Lebar Bahu">
                <input
                    value="{{ $data->lebar_bahu !== null ? (fmod($data->lebar_bahu, 1) == 0 ? intval($data->lebar_bahu) : $data->lebar_bahu). ' cm'  : '' }}"
                    disabled>
            </div>
            <div class="form-group">
                <label>Lengan Panjang /Pendek</label>
                <img src="{{ asset('fotokur/panjang_lengan.png') }}" alt="Panjang Lengan">
                <input
                    value="{{ $data->panjang_lenganpan !== null ? (fmod($data->panjang_lenganpan, 1) == 0 ? intval($data->panjang_lenganpan) : $data->panjang_lenganpan). ' cm'  : '' }}"
                    disabled>
                <input
                    value="{{ $data->panjang_lenganpen !== null ? (fmod($data->panjang_lenganpen, 1) == 0 ? intval($data->panjang_lenganpen) : $data->panjang_lenganpen). ' cm'  : '' }}"
                    disabled>
            </div>
            <div class="form-group">
                <label>Lingkar Ketiak /Sikut /Ujung
                    Lengan</label>
                <img src="{{ asset('fotokur/lingkar_ketiak.png') }}" alt="Lingkar Ketiak">
                <input
                    value="{{ $data->lingkar_ketiak !== null ? (fmod($data->lingkar_ketiak, 1) == 0 ? intval($data->lingkar_ketiak) : $data->lingkar_ketiak). ' cm'  : '' }}"
                    disabled>
                <input
                    value="{{ $data->sikut !== null ? (fmod($data->sikut, 1) == 0 ? intval($data->sikut) : $data->sikut). ' cm'  : '' }}"
                    disabled>
                <input
                    value="{{ $data->ujung_lengan !== null ? (fmod($data->ujung_lengan, 1) == 0 ? intval($data->ujung_lengan) : $data->ujung_lengan). ' cm'  : '' }}"
                    disabled>
            </div>
            <div class="form-group">
                <label>Lebar Dada</label>
                <img src="{{ asset('fotokur/lebar_dada.png') }}" alt="Lebar Dada">
                <input
                    value="{{ $data->lebar_dada !== null ? (fmod($data->lebar_dada, 1) == 0 ? intval($data->lebar_dada) : $data->lebar_dada). ' cm'  : '' }}"
                    disabled>
            </div>
            <div class="form-group">
                <label>Lingkar Badan</label>
                <img src="{{ asset('fotokur/lingkar_badan.png') }}" alt="Lingkar Badan">
                <input
                    value="{{ $data->lingkar_badan !== null ? (fmod($data->lingkar_badan, 1) == 0 ? intval($data->lingkar_badan) : $data->lingkar_badan). ' cm'  : '' }}"
                    disabled>
            </div>
            <div class="form-group">
                <label>Lingkar Perut</label>
                 <img src="{{ asset('fotokur/lingkar_perut.png') }}" alt="Lingkar Perut">
                <input
                    value="{{ $data->lingkar_perut !== null ? (fmod($data->lingkar_perut, 1) == 0 ? intval($data->lingkar_perut) : $data->lingkar_perut). ' cm'  : '' }}"
                    disabled>
            </div>
            <div class="form-group">
                <label>Lingkar Pinggang</label>
                <img src="{{ asset('fotokur/lingkar_pinggang.png') }}" alt="Lingkar Pinggang">
                <input
                    value="{{ $data->lingkar_pinggang !== null ? (fmod($data->lingkar_pinggang, 1) == 0 ? intval($data->lingkar_pinggang) : $data->lingkar_pinggang). ' cm'  : '' }}"
                    disabled>
            </div>
            <div class="form-group">
                <label>Lingkar Pinggul</label>
                <img src="{{ asset('fotokur/lingkar_pinggul.png') }}" alt="Lingkar Pinggul">
                <input
                    value="{{ $data->lingkar_pinggul !== null ? (fmod($data->lingkar_pinggul, 1) == 0 ? intval($data->lingkar_pinggul) : $data->lingkar_pinggul). ' cm'  : '' }}"
                    disabled>
            </div>
            <div class="form-group">
                <label>Lingkar Pinggang /Lingkar
                    Pinggul Celana</label>
                <img src="{{ asset('fotokur/lingkar_pinggangcel.png') }}" alt="Lingkar_pinggang">
                <input
                    value="{{ $data->lingkar_pinggangcel !== null ? (fmod($data->lingkar_pinggangcel, 1) == 0 ? intval($data->lingkar_pinggangcel) : $data->lingkar_pinggangcel). ' cm'  : '' }}"
                    disabled>
                <input
                    value="{{ $data->lingkar_pinggulcel !== null ? (fmod($data->lingkar_pinggulcel, 1) == 0 ? intval($data->lingkar_pinggulcel) : $data->lingkar_pinggulcel). ' cm'  : '' }}"
                    disabled>
            </div>
            <div class="form-group">
                <label>Panjang Celana</label>
                <img src="{{ asset('fotokur/panjang_celana.png') }}" alt="Panjang Celana">
                <input
                    value="{{ $data->panjang_celana !== null ? (fmod($data->panjang_celana, 1) == 0 ? intval($data->panjang_celana) : $data->panjang_celana). ' cm'  : '' }}"
                    disabled>
            </div>
            <div class="form-group">
                <label>Lingkar Lutut /Lingkar
                    Kaki</label>
                <img src="{{ asset('fotokur/lingkar_lutut.png') }}" alt="Lingkar Lutut">
                <input
                    value="{{ $data->lingkar_lutut !== null ? (fmod($data->lingkar_lutut, 1) == 0 ? intval($data->lingkar_lutut) : $data->lingkar_lutut). ' cm'  : '' }}"
                    disabled>
                <input
                    value="{{ $data->lingkar_kaki !== null ? (fmod($data->lingkar_kaki, 1) == 0 ? intval($data->lingkar_kaki) : $data->lingkar_kaki). ' cm'  : '' }}"
                    disabled>
            </div>
            <div class="form-group">
                <label>Tinggi Kruis /Lebar Paha</label>
                <img src="{{ asset('fotokur/tinggi_kruis.png') }}" alt="Tinggi Kruis">
                <input
                    value="{{ $data->tinggi_kruis !== null ? (fmod($data->tinggi_kruis, 1) == 0 ? intval($data->tinggi_kruis) : $data->tinggi_kruis). ' cm'  : '' }}"
                    disabled>
                <input
                    value="{{ $data->lebar_paha !== null ? (fmod($data->lebar_paha, 1) == 0 ? intval($data->lebar_paha) : $data->lebar_paha). ' cm'  : '' }}"
                    disabled>
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <textarea class="form-control" rows="5" disabled style="height:auto; overflow:hidden;">{{ $data->keterangan }}</textarea>
            </div>
            <div class="signature">
                <p><strong>Tanda Tangan</strong></p>
                @if ($data->biodata->signature)
                    <img src="{{ asset('storage/signatures/' . $data->biodata->signature) }}" alt="Signature">
                    <p>{{ $data->biodata->nama }}</p>
                @else
                    <p>Tanda tangan belum tersedia.</p>
                @endif
            </div>
        </div>
        <div class="button-container">
            <a href="{{ url('hasildakur') }}" class="btn btn-secondary">Kembali</a>
            <button class="print-btn btn btn-success" onclick="window.print()">Print Data Rinci Ukuran</button>
        </div>
    </div>
</body>

</html>

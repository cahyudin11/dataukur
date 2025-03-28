<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Rinci Ukuran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tambahkan di <head> -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .text-center {
            text-align: center;
            margin-bottom: 20px;
        }

        .image-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            justify-items: center;
        }

        .form-group {
            text-align: center;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 8px;
            background-color: #f9f9f9;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 100%;
        }

        .form-group img {
            max-width: 100%;
            height: auto;
            width: 200px;
            margin-bottom: 5px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            font-size: 14px;
        }

        .form-control {
            width: 80%;
            padding: 6px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            margin: 0 auto;
            margin-bottom: 10px;
        }

        .submit-button {
            text-align: center;
            margin-top: 20px;
        }

        .submit-button button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #448f60;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .submit-button button:hover {
            background-color: #12a73f;
        }

        @media (max-width: 768px) {
            .image-container {
                grid-template-columns: repeat(2, 1fr);
                /* 2 kolom untuk layar kecil */
            }
        }

        @media (max-width: 480px) {
            .image-container {
                grid-template-columns: 1fr;
                /* 1 kolom untuk layar sangat kecil */
            }
        }

        .mb-3 {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
            color: #333;
            font-size: 14px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: all 0.3s ease-in-out;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .select2 {
            width: 100% !important;
            border-radius: 5px;
        }

        option {
            padding: 10px;
        }

        /* Styling tambahan untuk mempercantik dropdown */
        select {
            appearance: none;
            background-color: #fff;
            cursor: pointer;
            padding: 10px;
        }

        select:focus {
            outline: none;
        }

        /* Hover efek untuk dropdown */
        option:hover {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="text-center">DATA RINCI UKURAN</h2>
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $message }}
            </div>
            <script>
                setTimeout(function() {
                    document.querySelector('.alert').remove();
                }, 3000);
            </script>
        @endif
        <form action="/insertfrdakur" method="POST">
            @csrf
            <div class="container">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Proyek</label>
                    <select class="form-control select2" size="width="100%;" name="proyek_id" id="proyek_id">
                        <option disabled value selected>Pilih Proyek</option>
                        @foreach ($hasildakurproyek as $pro)
                            <option value="{{ $pro->id }}">{{ $pro->nama_proyek }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Pilih Biodata</label>
                    <select class="form-control select2" name="biodata_id" id="biodata_id" required>
                        <option disabled selected value="">Cari dan Pilih Biodata</option>
                        @foreach ($hasildakurbiodata as $data)
                            <option value="{{ $data->id }}">{{ $data->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Quality Control</label>
                    <select class="form-control select2" name="quality_id" id="quality_id">
                        <option disabled selected value="">Pilih Quality Control</option>
                        @foreach ($hasildakurquality as $qua)
                            <option value="{{ $qua->id_kua }}">{{ $qua->nama_kua }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="image-container">
                <div class="form-group">
                    <label>Panjang Baju</label>
                    <img src="{{ asset('fotokur/panjang_baju.png') }}" alt="Ilustrasi Panjang Baju">
                    <input step="0.01" type="number" name="panjang_baju" class="form-control" id="panjang_baju"
                        aria-describedby="emailHelp" placeholder="Panjang Baju">
                </div>
                <div class="form-group">
                    <label>Lingkar Leher</label>
                    <img src="{{ asset('fotokur/lingkar_leher.png') }}" alt="Ilustrasi lingkar leher">
                    <input step="0.01" type="number" name="lingkar_leher" class="form-control" id="lingkar_leher"
                        aria-describedby="emailHelp" placeholder="lingkar Leher">
                </div>
                <div class="form-group">
                    <label>Lebar Bahu</label>
                    <img src="{{ asset('fotokur/lebar_bahu.png') }}" alt="Ilustrasi lebar bahu">
                    <input step="0.01" type="number" name="lebar_bahu" class="form-control" id="lebar_bahu"
                        aria-describedby="emailHelp" placeholder="Lebar Bahu">
                </div>
                <div class="form-group">
                    <label>Lengan Panjang /Pendek</label>
                    <img src="{{ asset('fotokur/panjang_lengan.png') }}" alt="Ilustrasi Panjang Lengan">
                    <input step="0.01" type="number" name="panjang_lenganpan" class="form-control"
                        id="panjang_lenganpan" aria-describedby="emailHelp" placeholder="Panjang">
                    <input step="0.01" type="number" name="panjang_lenganpen" class="form-control"
                        id="panjang_lenganpen" aria-describedby="emailHelp" placeholder="Pendek">
                </div>
                <div class="form-group">
                    <label>Lingkar Ketiak /Sikut /Ujung
                        Lengan</label>
                    <img src="{{ asset('fotokur/lingkar_ketiak.png') }}" alt="Ilustrasi Lingkar Ketiak">
                    <input step="0.01" type="number" name="lingkar_ketiak" class="form-control" id="lingkar_ketiak"
                        aria-describedby="emailHelp" placeholder="Lingkar Ketiak">
                    <input step="0.01" type="number" name="sikut" class="form-control" id="sikut"
                        aria-describedby="emailHelp" placeholder="Sikut">
                    <input step="0.01" type="number" name="ujung_lengan" class="form-control" id="ujung_lengan"
                        aria-describedby="emailHelp" placeholder="Lingkar Ujung Lengan">
                </div>
                <div class="form-group">
                    <label>Lebar Dada</label>
                    <img src="{{ asset('fotokur/lebar_dada.png') }}" alt="Ilustrasi Lebar Dada">
                    <input step="0.01" type="number" name="lebar_dada" class="form-control" id="lebar_dada"
                        aria-describedby="emailHelp" placeholder="Lebar Dada">
                </div>
                <div class="form-group">
                    <label>Lingkar Badan</label>
                    <img src="{{ asset('fotokur/lingkar_badan.png') }}" alt="Ilustrasi Lingkar Badan">
                    <input step="0.01" type="number" name="lingkar_badan" class="form-control"
                        id="lingkar_badan" aria-describedby="emailHelp" placeholder="Lingkar Badan">
                </div>
                <div class="form-group">
                    <label>Lingkar Perut</label>
                    <img src="{{ asset('fotokur/lingkar_perut.png') }}" alt="Ilustrasi Lingkar Perut">
                    <input step="0.01" type="number" name="lingkar_perut" class="form-control"
                        id="lingkar_perut" aria-describedby="emailHelp" placeholder="Lingkar Perut">
                </div>
                <div class="form-group">
                    <label>Lingkar Pinggang</label>
                    <img src="{{ asset('fotokur/lingkar_pinggang.png') }}" alt="Ilustrasi Lingkar Pinggang">
                    <input step="0.01" type="number" name="lingkar_pinggang" class="form-control"
                        id="lingkar_pinggang" aria-describedby="emailHelp" placeholder="Lingkar Pinggang">
                </div>
                <div class="form-group">
                    <label>Lingkar Pinggul</label>
                    <img src="{{ asset('fotokur/lingkar_pinggul.png') }}" alt="Ilustrasi Lingkar Pinggul">
                    <input step="0.01" type="number" name="lingkar_pinggul" class="form-control"
                        id="lingkar_pinggul" aria-describedby="emailHelp" placeholder="Lingkar Pinggul">
                </div>
                <div class="form-group">
                    <label>Lingkar Pinggang /Lingkar
                        Pinggul Celana</label>
                    <img src="{{ asset('fotokur/lingkar_pinggangcel.png') }}"
                        alt="Ilustrasi Lingkar Pinggang Celana">
                    <input step="0.01" type="number" name="lingkar_pinggangcel" class="form-control"
                        id="lingkar_pinggangcel" aria-describedby="emailHelp" placeholder="Linggkar Pinggang Celana">
                    <input step="0.01" type="number" name="lingkar_pinggulcel" class="form-control"
                        id="lingkar_pinggulcel" aria-describedby="emailHelp" placeholder="Lingkar Pinggul Celana">
                </div>
                <div class="form-group">
                    <label>Panjang Celana</label>
                    <img src="{{ asset('fotokur/panjang_celana.png') }}" alt="Ilustrasi Panjang Celana">
                    <input step="0.01" type="number" name="panjang_celana" class="form-control"
                        id="panjang_celana" aria-describedby="emailHelp" placeholder="Panjang Celana">
                </div>
                <div class="form-group">
                    <label>Lingkar Lutut /Lingkar
                        Kaki</label>
                    <img src="{{ asset('fotokur/lingkar_lutut.png') }}" alt="Ilustrasi Lingkar Lutut">
                    <input step="0.01" type="number" name="lingkar_lutut" class="form-control"
                        id="lingkar_lutut" aria-describedby="emailHelp" placeholder="Lingkar Lutut">
                    <input step="0.01" type="number" name="lingkar_kaki" class="form-control" id="lingkar_kaki"
                        aria-describedby="emailHelp" placeholder="Lingkar Kaki">
                </div>
                <div class="form-group">
                    <label>Tinggi Kruis /Lebar Paha</label>
                    <img src="{{ asset('fotokur/tinggi_kruis.png') }}" alt="Ilustrasi Tinggi Kruis">
                    <input step="0.01" type="number" name="tinggi_kruis" class="form-control" id="tinggi_kruis"
                        aria-describedby="emailHelp" placeholder="Tinggi Kruis">
                    <input step="0.01" type="number" name="lebar_paha" class="form-control" id="lebar_paha"
                        aria-describedby="emailHelp" placeholder="Lebar Paha">
                </div>
                <div class="form-group">
                    <label for="keterangan" class="form-label d-block">Keterangan Pakaian</label>
                    <textarea name="keterangan" class="form-control" id="keterangan" rows="3" placeholder="Masukan Keterangan"></textarea>
                </div>
            </div>
            <div class="container mt-4">
                <div class="row justify-content-center text-center g-3">
                    <div class="col-md-6 col-12">
                        <button type="submit" class="btn btn-success w-100 py-2">Tambah Data</button>
                    </div>
                    <div class="col-md-6 col-12">
                        <a href="{{ route('frbiodata') }}" class="btn btn-secondary w-100 py-2">Tambah Biodata</a>
                    </div>
                    <div class="col-md-6 col-12">
                        <a href="{{ route('manual') }}" class="btn btn-primary w-100 py-2">Pengukuran
                            Manual</a>
                    </div>
                    <div class="col-md-6 col-12">
                        <a href="{{ route('logout') }}" class="btn btn-danger w-100 py-2">Keluar</a>
                    </div>
                </div>
            </div>





    </div>
    <!-- Tambahkan sebelum </body> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            console.log("jQuery dan Select2 sudah dimuat");
            $('#biodata_id').select2({
                placeholder: "Cari Biodata...",
                allowClear: true,
                width: '100%'
            });
        });
    </script>
</body>

</html>

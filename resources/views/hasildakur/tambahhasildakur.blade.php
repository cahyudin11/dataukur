@extends('template.main')
@section('judulatas', 'Dakur')
@section('judul', 'Tambah Dakur')
@section('judulkanan')
    <a href="{{ route('hasildakur') }}" class="text-decoration-none">Data</a>
@endsection
@section('subjudulkanan', 'Tambah Dakur')

@section('konten')

    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="/inserthasildakur" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Proyek</label>
                                    <select class="form-control select2" size="width="100%;" name="proyek_id"
                                        id="proyek_id" required>
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
                                    <select class="form-control select2" size="width="100%;" name="quality_id"
                                        id="quality_id" required>
                                        <option disabled value selected>Pilih Quality Control</option>
                                        @foreach ($hasildakurquality as $qua)
                                            <option value="{{ $qua->id_kua }}">{{ $qua->nama_kua }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="panjang_baju" class="form-label d-block">Panjang Baju</label>
                                    <img src="{{ asset('fotokur/panjang_baju.png') }}" alt="Ilustrasi Panjang Baju"
                                        width="150" class="mb-2">
                                    <input step="0.01" type="number" name="panjang_baju" class="form-control mt-2"
                                        id="panjang_baju" aria-describedby="emailHelp" placeholder="Panjang Baju">
                                </div>
                                <div class="mb-3">
                                    <label for="lingkar_leher" class="form-label d-block">Lingkar Leher</label>
                                    <img src="{{ asset('fotokur/lingkar_leher.png') }}" alt="Ilustrasi lingkar leher"
                                        width="150" class="mb-2">
                                    <input step="0.01" type="number" name="lingkar_leher" class="form-control"
                                        id="lingkar_leher" aria-describedby="emailHelp" placeholder="lingkar Leher">
                                </div>
                                <div class="mb-3">
                                    <label for="lebar_bahu" class="form-label d-block">Lebar Bahu</label>
                                    <img src="{{ asset('fotokur/lebar_bahu.png') }}" alt="Ilustrasi lebar bahu"
                                        width="150" class="mb-2">
                                    <input step="0.01" type="number" name="lebar_bahu" class="form-control"
                                        id="lebar_bahu" aria-describedby="emailHelp" placeholder="Lebar Bahu">
                                </div>
                                <div class="mb-3">
                                    <label for="panjang_lengan" class="form-label d-block">Panjang Lengan </label>
                                    <img src="{{ asset('fotokur/panjang_lengan.png') }}" alt="Ilustrasi Panjang Lengan"
                                        width="150" class="mb-2">
                                    <input step="0.01" type="number" name="panjang_lenganpan" class="form-control"
                                        id="panjang_lenganpan" aria-describedby="emailHelp"
                                        placeholder="Panjang Lengan (panjang)">
                                </div>
                                <div class="mb-3">
                                    <input step="0.01" type="number" name="panjang_lenganpen" class="form-control"
                                        id="panjang_lenganpen" aria-describedby="emailHelp"
                                        placeholder="Panjang Lengan (pendek)">
                                </div>
                                <div class="mb-3">
                                    <label for="lingkar_ketiak" class="form-label d-block">Lingkar Ketiak /Sikut /Ujung
                                        Lengan</label>
                                    <img src="{{ asset('fotokur/lingkar_ketiak.png') }}" alt="Ilustrasi Lingkar Ketiak"
                                        width="150" class="mb-2">
                                    <input step="0.01" type="number" name="lingkar_ketiak" class="form-control"
                                        id="lingkar_ketiak" aria-describedby="emailHelp" placeholder="Lingkar Ketiak">
                                </div>
                                <div class="mb-3">
                                    <input step="0.01" type="number" name="sikut" class="form-control"
                                        id="sikut" aria-describedby="emailHelp" placeholder="Lingkar Sikut">
                                </div>
                                <div class="mb-3">
                                    <input step="0.01" type="number" name="ujung_lengan" class="form-control"
                                        id="ujung_lengan" aria-describedby="emailHelp"
                                        placeholder="Lingkar Ujung Lengan">
                                </div>
                                <div class="mb-3">
                                    <label for="lebar_dada" class="form-label d-block">Lebar Dada</label>
                                    <img src="{{ asset('fotokur/lebar_dada.png') }}" alt="Ilustrasi Lebar Dada"
                                        width="150" class="mb-2">
                                    <input step="0.01" type="number" name="lebar_dada" class="form-control"
                                        id="lebar_dada" aria-describedby="emailHelp" placeholder="Lebar Dada">
                                </div>
                                <div class="mb-3">
                                    <label for="lingkar_badan" class="form-label d-block">Lingkar Badan</label>
                                    <img src="{{ asset('fotokur/lingkar_badan.png') }}" alt="Ilustrasi Lingkar Badan"
                                        width="150" class="mb-2">
                                    <input step="0.01" type="number" name="lingkar_badan" class="form-control"
                                        id="lingkar_badan" aria-describedby="emailHelp" placeholder="Lingkar Badan">
                                </div>
                                <div class="mb-3">
                                    <label for="lingkar_perut" class="form-label d-block">Lingkar Perut</label>
                                    <img src="{{ asset('fotokur/lingkar_perut.png') }}" alt="Ilustrasi Lingkar Perut"
                                        width="150" class="mb-2">
                                    <input step="0.01" type="number" name="lingkar_perut" class="form-control"
                                        id="lingkar_perut" aria-describedby="emailHelp" placeholder="Lingkar Perut">
                                </div>
                                <div class="mb-3">
                                    <label for="lingkar_pinggang" class="form-label d-block">Lingkar Pinggang</label>
                                    <img src="{{ asset('fotokur/lingkar_pinggang.png') }}"
                                        alt="Ilustrasi Lingkar Pinggang" width="150" class="mb-2">
                                    <input step="0.01" type="number" name="lingkar_pinggang" class="form-control"
                                        id="lingkar_pinggang" aria-describedby="emailHelp"
                                        placeholder="Lingkar Pinggang">
                                </div>
                                <div class="mb-3">
                                    <label for="lingkar_pinggul" class="form-label d-block">Lingkar Pinggul</label>
                                    <img src="{{ asset('fotokur/lingkar_pinggul.png') }}" alt="Ilustrasi Lingkar Pinggul"
                                        width="150" class="mb-2">
                                    <input step="0.01" type="number" name="lingkar_pinggul" class="form-control"
                                        id="lingkar_pinggul" aria-describedby="emailHelp" placeholder="Lingkar Pinggul">
                                </div>
                                <div class="mb-3">
                                    <label for="linggar_pinggangcel" class="form-label d-block">Lingkar Pinggang /Lingkar
                                        Pinggul Celana</label>
                                    <img src="{{ asset('fotokur/lingkar_pinggangcel.png') }}"
                                        alt="Ilustrasi Lingkar Pinggang Celana" width="150" class="mb-2">
                                    <input step="0.01" type="number" name="lingkar_pinggangcel" class="form-control"
                                        id="lingkar_pinggangcel" aria-describedby="emailHelp"
                                        placeholder="Linggkar Pinggang Celana">
                                </div>
                                <div class="mb-3">
                                    <input step="0.01" type="number" name="lingkar_pinggulcel" class="form-control"
                                        id="lingkar_pinggulcel" aria-describedby="emailHelp"
                                        placeholder="Lingkar Pinggul Celana">
                                </div>
                                <div class="mb-3">
                                    <label for="panjang_celana" class="form-label d-block">Panjang Celana</label>
                                    <img src="{{ asset('fotokur/panjang_celana.png') }}" alt="Ilustrasi Panjang Celana"
                                        width="150" class="mb-2">
                                    <input step="0.01" type="number" name="panjang_celana" class="form-control"
                                        id="panjang_celana" aria-describedby="emailHelp" placeholder="Panjang Celana">
                                </div>
                                <div class="mb-3">
                                    <label for="lingkar_lutut" class="form-label d-block">Lingkar Lutut /Lingkar
                                        Kaki</label>
                                    <img src="{{ asset('fotokur/lingkar_lutut.png') }}" alt="Ilustrasi Lingkar Lutut"
                                        width="150" class="mb-2">
                                    <input step="0.01" type="number" name="lingkar_lutut" class="form-control"
                                        id="lingkar_lutut" aria-describedby="emailHelp" placeholder="Lingkar Lutut">
                                </div>
                                <div class="mb-3">
                                    <input step="0.01" type="number" name="lingkar_kaki" class="form-control"
                                        id="lingkar_kaki" aria-describedby="emailHelp" placeholder="Lingkar Kaki">
                                </div>
                                <div class="mb-3">
                                    <label for="tinggi_kruis" class="form-label d-block">Tinggi Kruis /Lebar Paha</label>
                                    <img src="{{ asset('fotokur/tinggi_kruis.png') }}" alt="Ilustrasi Tinggi Kruis"
                                        width="150" class="mb-2">
                                    <input step="0.01" type="number" name="tinggi_kruis" class="form-control"
                                        id="tinggi_kruis" aria-describedby="emailHelp" placeholder="Tinggi Kruis">
                                </div>
                                <div class="mb-3">
                                    <input step="0.01" type="number" name="lebar_paha" class="form-control"
                                        id="lebar_paha" aria-describedby="emailHelp" placeholder="Lebar Paha">
                                </div>
                                <div class="mb-3">
                                    <label for="keterangan" class="form-label d-block">Keterangan Pakaian</label>
                                    <textarea name="keterangan" class="form-control" id="keterangan" rows="3" placeholder="Masukan Keterangan"></textarea>
                                </div>
                                <button type="submit" class="btn btn-success">Tambah</button>
                                <a href="{{ url('hasildakur') }}" class="btn btn-secondary">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var canvas = document.getElementById("signature-pad");
                var signatureInput = document.getElementById("signature");
                var clearButton = document.getElementById("clear-signature");
                var signaturePad = new SignaturePad(canvas, {
                    minWidth: 1,
                    maxWidth: 3,
                    penColor: "black",
                    backgroundColor: "white"
                });

                function updateSignatureInput() {
                    if (!signaturePad.isEmpty()) {
                        signatureInput.value = signaturePad.toDataURL("image/png");
                    } else {
                        signatureInput.value = "";
                    }
                }
                signaturePad.addEventListener("endStroke", updateSignatureInput);
                clearButton.addEventListener("click", function() {
                    signaturePad.clear();
                    updateSignatureInput();
                });
            });
        </script>
        <style>
            #sig-container {
                border: 2px dashed #ccc;
                width: 100%;
                height: 200px;
                position: relative;
                background-color: white;
            }

            #signature-pad {
                width: 100%;
                height: 100%;
                touch-action: none;
            }
        </style>

    </body>
@endsection

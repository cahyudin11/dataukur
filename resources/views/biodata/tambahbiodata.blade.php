@extends('template.main')
@section('judulatas', 'Biodata')
@section('judul', 'Tambah Biodata')
@section('judulkanan')
    <a href="{{ route('biodata') }}" class="text-decoration-none">Data</a>
@endsection
@section('subjudulkanan', 'Tambah Biodata')

@section('konten')

    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="/insertbiodata" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Kesatuan/Satker</label>
                                    <input type="text" name="satker" class="form-control" id="satker"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama</label>
                                    <input type="text" name="nama" class="form-control" id="nama"
                                        aria-describedby="emailHelp" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Jabatan</label>
                                    <input type="text" name="jabatan" class="form-control" id="jabatan"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Pangkat</label>
                                    <input type="text" name="pangkat" class="form-control" id="pangkat"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">NRP</label>
                                    <input type="number" name="nrp" class="form-control" id="nrp"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Berat Badan (kg)</label>
                                    <input type="number" name="berat_badan" class="form-control" id="berat_badan"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Tinggi Badan (cm)</label>
                                    <input type="number" name="tinggi_badan" class="form-control" id="tinggi_badan"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control" id="tanggal"
                                        aria-describedby="emailHelp" value="{{ date('Y-m-d') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="tipe_pakaian" class="form-label">Tipe Pakaian</label>
                                    <select class="form-control" id="tipe_pakaian" name="tipe_pakaian">
                                        <option value="">-- Pilih Jenis Pakaian --</option>
                                        <option value="Pria">PRIA</option>
                                        <option value="wanita">WANITA</option>
                                        <option value="wanita hijab">WANITA HIJAB</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label>Tambah Tanda Tangan</label>
                                    <br />
                                    <div id="sig-container">
                                        <canvas id="signature-pad"></canvas>
                                    </div>
                                    <br />
                                    <button type="button" id="clear-signature" class="btn btn-danger btn-sm">Hapus</button>
                                    <textarea id="signature" name="signed" style="display: none"></textarea>
                                    <br /><br />
                                </div>
                                <button type="submit" class="btn btn-success">Tambah</button>
                                <a href="{{ url('biodata') }}" class="btn btn-secondary">Kembali</a>
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

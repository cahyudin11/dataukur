@extends('template.main')
@section('judulatas', 'Biodata')
@section('judul', 'Edit Biodata')
@section('judulkanan')
    <a href="{{ route('biodata') }}" class="text-decoration-none">Data</a>
@endsection
@section('subjudulkanan', 'Edit Biodata')

@section('konten')

    <div class="card">
        <div class="card-body">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="/updatebiodata/{{ $biodata->id }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Kesatuan/Satker</label>
                                        <input type="text" name="satker" class="form-control" id="satker"
                                            aria-describedby="emailHelp" value="{{ $biodata->satker }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Nama</label>
                                        <input type="text" name="nama" class="form-control" id="nama"
                                            aria-describedby="emailHelp" value="{{ $biodata->nama }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Jabatan</label>
                                        <input type="text" name="jabatan" class="form-control" id="satker"
                                            aria-describedby="emailHelp" value="{{ $biodata->jabatan }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Pangkat</label>
                                        <input type="text" name="pangkat" class="form-control" id="satker"
                                            aria-describedby="emailHelp" value="{{ $biodata->pangkat }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">NRP</label>
                                        <input type="number" name="nrp" class="form-control" id="satker"
                                            aria-describedby="emailHelp" value="{{ $biodata->nrp }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Berat Badan (kg)</label>
                                        <input type="number" name="berat_badan" class="form-control" id="satker"
                                            aria-describedby="emailHelp" value="{{ $biodata->berat_badan }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Tinggi Badan (cm)</label>
                                        <input type="number" name="tinggi_badan" class="form-control" id="tinggi_badan"
                                            aria-describedby="emailHelp" value="{{ $biodata->tinggi_badan }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Tanggal Pengukuran</label>
                                        <input type="date" name="tanggal" class="form-control" id="tanggal"
                                            aria-describedby="emailHelp" value="{{ $biodata->tanggal }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="tipe_pakaian" class="form-label">Tipe Pakaian</label>
                                        <select class="form-control" id="tipe_pakaian" name="tipe_pakaian">
                                            <option value="">-- Pilih Tipe Pakaian --</option>
                                            <option value="pria"
                                                {{ $biodata->tipe_pakaian == 'pria' ? 'selected' : '' }}>PRIA</option>
                                            <option value="wanita"
                                                {{ $biodata->tipe_pakaian == 'wanita' ? 'selected' : '' }}>WANITA</option>
                                            <option value="wanita hijab"
                                                {{ $biodata->tipe_pakaian == 'wanita hijab' ? 'selected' : '' }}>WANITA
                                                HIJAB</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Ubah Tanda Tangan</label>
                                        <br />
                                        <div id="sig-container">
                                            <canvas id="signature-pad"></canvas>
                                        </div>
                                        <br />
                                        <button type="button" id="clear-signature"
                                            class="btn btn-danger btn-sm">Hapus</button>
                                        <textarea id="signature" name="signed" style="display: none"></textarea>
                                        <br /><br />
                                        @if ($biodata->signature)
                                            <p>Preview tanda tangan sebelumnya:</p>
                                            <img id="signature-preview"
                                                src="{{ asset('storage/signatures/' . $biodata->signature) }}"
                                                width="200">
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary">Edit Biodata</button>
                                    <a href="{{ url('biodata') }}" class="btn btn-secondary">Kembali</a>
                                </form>
                            </div>
                        </div>
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

            // Hapus tanda tangan
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
            /* Mencegah scrolling saat menggambar */
        }
    </style>
@endsection

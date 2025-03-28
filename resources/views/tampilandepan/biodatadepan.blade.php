<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Rinci Ukuran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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

        .lanjut-button {
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

            }
        }

        @media (max-width: 480px) {
            .image-container {
                grid-template-columns: 1fr;

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


        select {
            appearance: none;
            background-color: #fff;
            cursor: pointer;
            padding: 10px;
        }

        select:focus {
            outline: none;
        }


        option:hover {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="text-center">PENGISIAN BIODATA PENGUKURAN</h2>
        <form id="saveForm" action="/insertfrbiodata" method="POST">
            @csrf
            <div class="container">
                <div class="image-container">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Kesatuan/Satker</label>
                        <input type="text" name="satker" class="form-control" id="satker"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Jabatan</label>
                        <input type="text" name="jabatan" class="form-control" id="jabatan"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Pangkat</label>
                        <input type="text" name="pangkat" class="form-control" id="pangkat"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">NRP</label>
                        <input type="number" name="nrp" class="form-control" id="nrp"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Berat Badan (kg)</label>
                        <input type="number" name="berat_badan" class="form-control" id="berat_badan"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Tinggi Badan (cm)</label>
                        <input type="number" name="tinggi_badan" class="form-control" id="tinggi_badan"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" id="tanggal"
                            aria-describedby="emailHelp" value="{{ date('Y-m-d') }}">
                    </div>
                    <div class="form-group">
                        <label for="tipe_pakaian" class="form-label">Tipe Pakaian</label>
                        <select class="form-control" id="tipe_pakaian" name="tipe_pakaian">
                            <option value="">-- Pilih Jenis Pakaian --</option>
                            <option value="Pria">PRIA</option>
                            <option value="wanita">WANITA</option>
                            <option value="wanita hijab">WANITA HIJAB</option>
                        </select>
                    </div>
                    <div class="form-group">
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
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <button type="submit" id="saveButton" class="btn btn-success w-100 me-2">Simpan Data</button>
                    <div id="nextButtonContainer" style="display: none;">
                        <a href="{{ route('frdakur') }}" class="btn btn-primary w-100">Lanjut</a>
                    </div>
                    <a href="{{ route('frdakur') }}" class="btn btn-secondary w-100 ms-2">Kembali</a>
                </div>


            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById("saveForm").addEventListener("submit", function(event) {
            event.preventDefault();
            let formData = new FormData(this);
            let saveButton = document.getElementById("saveButton");
            let namaInput = document.getElementById("nama").value.trim();


            if (namaInput === "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Nama harus diisi!',
                });
                return;
            }

            saveButton.disabled = true;

            fetch(this.action, {
                    method: "POST",
                    body: formData,
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value,
                        "Accept": "application/json"
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: data.message,
                            showConfirmButton: false,
                            timer: 2000
                        });

                        document.getElementById("nextButtonContainer").style.display = "block";
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Terjadi kesalahan, coba lagi!',
                    });
                })
                .finally(() => {
                    saveButton.disabled = false;
                });
        });
    </script>

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
</body>

</html>

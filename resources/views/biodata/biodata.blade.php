@extends('template.main')
@section('judulatas', 'Biodata')
@section('judul', 'Biodata')
@section('judulkanan', 'Admin')
@section('subjudulkanan', 'Biodata')

@section('konten')
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
    @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $message }}
        </div>
        <script>
            setTimeout(function() {
                document.querySelector('.alert').remove();
            }, 3000);
        </script>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="card shadow p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0">Data Biodata</h5>
                    <a href="{{ route('tambahbiodata') }}" class="btn btn-success">
                        <i class="fas fa-plus"></i> Tambah Data
                    </a>
                </div>

                <form action="{{ route('biodata.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="file" class="form-label">Upload File Excel</label>
                        <input type="file" name="file" id="file" class="form-control">
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>
                                        @if ($error == 'The file field is required.')
                                            File wajib diunggah.
                                        @elseif ($error == 'The file must be a file of type: xlsx, csv.')
                                            File harus berformat .xlsx atau .csv.
                                        @elseif ($error == 'The file may not be greater than 2048 kilobytes.')
                                            Ukuran file tidak boleh lebih dari 2MB.
                                        @else
                                            {{ $error }}
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <button type="submit" class="btn btn-primary ">
                        <i class="fas fa-upload"></i> Upload
                    </button>
                </form>
                @if(count($allSatker) > 0)
                <div class="d-flex justify-content-end mb-3">
                    <div class="card shadow-sm border rounded p-3" style="width: 300px;">
                        <h6 class="fw-bold text-center mb-2"><i class="fas fa-filter"></i> Filter Berdasarkan Satker</h6>
                        <form action="{{ route('biodata') }}" method="GET">
                            <label for="satker" class="form-label">Pilih Satker:</label>
                            <select name="satker" id="satker" class="form-select" onchange="this.form.submit()">
                                <option value="">-- Semua Satker --</option>
                                @foreach ($allSatker as $satker)
                                    @if($satker)  
                                        <option value="{{ $satker }}" {{ request('satker') == $satker ? 'selected' : '' }}>
                                            {{ $satker }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </form>
                    </div>
                </div>
                @endif
            </div>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Kesatuan/Satker</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Pangkat</th>
                        <th>NRP</th>
                        <th>Berat Badan (kg)</th>
                        <th>Tinggi Badan (cm)</th>
                        <th>Tanggal Pengukuran</th>
                        <th>Tipe Pakaian</th>
                        <th>Tanda Tangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($biodata as $bio)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $bio->satker }}</td>
                            <td>{{ $bio->nama }}</td>
                            <td>{{ $bio->jabatan }}</td>
                            <td>{{ $bio->pangkat }}</td>
                            <td>{{ $bio->nrp }}</td>
                            <td>{{ $bio->berat_badan }}</td>
                            <td>{{ $bio->tinggi_badan }}</td>
                            <td>{{ $bio->tanggal }}</td>
                            <td>{{ $bio->tipe_pakaian }}</td>
                            <td>
                                @if ($bio->signature)
                                    <img src="{{ asset('storage/signatures/' . $bio->signature) }}" alt="Signature"
                                        width="200">
                                @else
                                    <p>Tanda tangan belum tersedia.</p>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex gap-4">
                                    <a href="/tampilbiodata/{{ $bio->id }}" class="btn btn-primary">Edit</a>
                                    <form id="delete-form-{{ $bio->id }}" action="{{ route('delete', $bio->id) }}"
                                        method="GET">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger"
                                            onclick="confirmDelete({{ $bio->id }})">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: "Apakah Anda yakin?",
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
@endsection

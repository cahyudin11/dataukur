@extends('template.main')
@section('judulatas', 'Proyek')
@section('judul', 'Tambah Proyek')
@section('judulkanan')
    <a href="{{ route('proyek') }}" class="text-decoration-none">Data</a>
@endsection
@section('subjudulkanan', 'Tambah Proyek')

@section('konten')

    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="/insertproyek" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Proyek</label>
                                    <input type="text" name="nama_proyek" class="form-control" id="nama_proyek"
                                        aria-describedby="emailHelp" required>
                                </div>
                                <button type="submit" class="btn btn-success">Tambah</button>
                                <a href="{{ url('proyek') }}" class="btn btn-secondary">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection

@extends('template.main')
@section('judulatas', 'Proyek')
@section('judul', 'Edit Proyek')
@section('judulkanan')
    <a href="{{ route('proyek') }}" class="text-decoration-none">Data</a>
@endsection
@section('subjudulkanan', 'Edit Proyek')

@section('konten')

    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="/updateproyek/{{ $proyek->id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama</label>
                                    <input type="text" name="nama_proyek" class="form-control" id="nama_proyek"
                                        aria-describedby="emailHelp" value="{{ $proyek->nama_proyek }}" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Edit</button>
                                <a href="{{ url('proyek') }}" class="btn btn-secondary">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection

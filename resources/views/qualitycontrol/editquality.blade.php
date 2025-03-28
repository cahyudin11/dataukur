@extends('template.main')
@section('judulatas', 'Quality')
@section('judul', 'Edit Quality')
@section('judulkanan')
    <a href="{{ route('qualitycontrol') }}" class="text-decoration-none">Data</a>
@endsection
@section('subjudulkanan', 'Edit Quality')

@section('konten')

    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="/updatequality/{{ $quality->id_kua }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama</label>
                                    <input type="text" name="nama_kua" class="form-control" id="nama_kua"
                                        aria-describedby="emailHelp" value="{{ $quality->nama_kua }}" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Edit</button>
                                <a href="{{ url('qualitycontrol') }}" class="btn btn-secondary">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection

@extends('template.main')
@section('judulatas', 'Proyek')
@section('judul', 'Proyek')
@section('judulkanan', 'Admin')
@section('subjudulkanan', 'Proyek')

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
    <div class="card">
        <div class="card-body">
            <a href="{{ route('tambahproyek') }}"><button class="btn btn-success">Tambah</button></a>
            <table id="example2" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="50px">Nomor</th>
                        <th>Nama Proyek</th>
                        <th width="100px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($proyek as $pro)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pro->nama_proyek }}</td>
                            <td>
                                <div class="d-flex gap-4">
                                    <a href="/tampilproyek/{{ $pro->id }}" class="btn btn-primary">Edit</a>

                                    <form id="delete-form-{{ $pro->id }}"
                                        action="{{ route('deleteproyek', $pro->id) }}" method="GET">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger"
                                            onclick="confirmDelete({{ $pro->id }})">Hapus</button>
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
                text: "Data yang berkaitan dengan Proyek yang dipilih akan terhapus termasuk pada hasil data ukur!",
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

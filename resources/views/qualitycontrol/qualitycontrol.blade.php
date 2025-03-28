@extends('template.main')
@section('judulatas', 'Quality Control')
@section('judul', 'Quality Control')
@section('judulkanan', 'Admin')
@section('subjudulkanan', 'Quality')

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
            <a href="{{ route('tambahquality') }}"><button class="btn btn-success">Tambah</button></a>
            <table id="example2" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="50px">Nomor</th>
                        <th>Nama Qc</th>
                        <th width="100px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($quality as $qua)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $qua->nama_kua }}</td>
                            <td>
                                <div class="d-flex gap-4">
                                    <a href="/tampilquality/{{ $qua->id_kua }}" class="btn btn-primary">Edit</a>

                                    <form id="delete-form-{{ $qua->id_kua }}"
                                        action="{{ route('deletequality', $qua->id_kua) }}" method="GET">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger"
                                            onclick="confirmDelete({{ $qua->id_kua }})">Hapus</button>
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
                text: "Data yang berkaitan dengan QC yang dipilih akan terhapus termasuk pada hasil data ukur!",
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

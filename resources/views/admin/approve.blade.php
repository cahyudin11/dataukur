@extends('template.main')
@section('judulatas', 'User')
@section('judul', 'Approve User')
@section('judulkanan')
    <a href="{{ route('dashboard') }}" class="text-decoration-none">Data</a>
@endsection
@section('subjudulkanan', ' User')

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
            <table id="example2" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="50px">Nomor</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th width="100px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('usersapprove', ['id' => $user->id]) }}" 
                                       class="btn btn-success btn-sm d-flex align-items-center me-3">
                                        <i class="fas fa-check-circle me-1"></i> Konfirmasi
                                    </a>
                            
                                    <a href="{{ route('deleteapprove', ['id' => $user->id]) }}" 
                                       class="btn btn-danger btn-sm d-flex align-items-center"
                                       onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?');">
                                        <i class="fas fa-trash-alt me-1"></i> Hapus
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

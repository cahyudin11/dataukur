@extends('template.main')
@section('judulatas', 'Profile')
@section('judul', 'Profile')
@section('judulkanan')
    <a href="{{ route('dashboard') }}" class="text-decoration-none">Data</a>
@endsection
@section('subjudulkanan', 'Profile')

@section('konten')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('profileupdate') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="text-center mb-3">
                    @if ($user->photo)
                        <img src="{{ asset('storage/photos/' . $user->photo) }}" class="rounded-circle"
                            style="width: 120px; height: 120px; object-fit: cover;">
                    @else
                        <img src="{{ asset('default-avatar.png') }}" class="rounded-circle"
                            style="width: 120px; height: 120px; object-fit: cover;">
                    @endif
                </div>

                <div class="form-group">
                    <label>Upload Foto Profil</label>
                    <input type="file" name="photo" class="form-control">
                    @error('photo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}"
                        required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}"
                        required>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Password Baru (Opsional)</label>
                    <input type="password" name="password" class="form-control">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Perbaharui Profil</button>
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection

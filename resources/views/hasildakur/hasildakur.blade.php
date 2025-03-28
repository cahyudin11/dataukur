@extends('template.main')
@section('judulatas', 'Hasil Ukur')
@section('judul', 'Data Hasil Ukur')
@section('judulkanan', 'Data')
@section('subjudulkanan', 'Hasil Ukur')



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
            <div class="d-flex justify-content-end mb-3">
                <div class="card shadow-sm border rounded p-3" style="width: 300px;">
                    <h6 class="fw-bold text-center mb-2"><i class="fas fa-filter"></i> Filter Berdasarkan Proyek</h6>
                    <form action="{{ route('hasildakur') }}" method="GET">
                        <label for="proyek" class="form-label">Pilih Proyek:</label>
                        <select name="proyek_id" id="proyek" class="form-select" onchange="this.form.submit()">
                            <option value="">-- Semua Proyek --</option>
                            @foreach ($proyeks as $proyek)
                                <option value="{{ $proyek->id }}" {{ $proyek->id == $proyekId ? 'selected' : '' }}>
                                    {{ $proyek->nama_proyek }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                </div>
            </div>
            <a href="{{ route('tambahhasildakur') }}"><button class="btn btn-success">Tambah</button></a>
            <a href="#" id="deleteSelectedLink"><button class="btn btn-danger">Hapus yang Dipilih</button></a>
            <a href="#" id="printSelectedLink"><button class="btn btn-secondary">Print Yang diPilih</button></a>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Pilih<input type="checkbox" id="checkAll"></th>
                        <th>Proyek</th>
                        <th>Nama</th>
                        <th>Tipe Pakaian</th>
                        <th>Satker</th>
                        <th>Jabatan</th>
                        <th>Pangkat</th>
                        <th>NRP</th>
                        <th>Pengukur</th>
                        <th>Tinggi Badan</th>
                        <th>Berat Badan</th>
                        <th>Panjang Baju</th>
                        <th>Lingkar Leher</th>
                        <th>Lebar Bahu</th>
                        <th>Panjang Lengan (panjang)</th>
                        <th>Panjang Lengan (pendek)</th>
                        <th>Lingkar Ketiak</th>
                        <th>Lingkar Sikut</th>
                        <th>Lingkar Ujung Lengan</th>
                        <th>Lebar Dada</th>
                        <th>Lingkar Badan</th>
                        <th>Lingkar Perut</th>
                        <th>Lingkar Pinggang</th>
                        <th>Lingkar Pinggul</th>
                        <th>Lingkar Pinggang Celana</th>
                        <th>Lingkar Pinggul Celana</th>
                        <th>Panjang Celana</th>
                        <th>Lingkar Lutut</th>
                        <th>Lingkar Kaki</th>
                        <th>Tinggi Kruis</th>
                        <th>Lebar Paha</th>
                        <th>Keterangan</th>
                        <th>Tanggal Pengukuran</th>
                        <th>Tanda Tangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hasildakur as $dakur)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <input type="checkbox" class="rowCheckbox" name="selected_projects[]"
                                    value="{{ $dakur->id }}">
                            </td>
                            </td>
                            <td>{{ $dakur->proyek->nama_proyek }}</td>
                            <td>{{ $dakur->biodata->nama }}</td>
                            <td>{{ $dakur->biodata->tipe_pakaian }}</td>
                            <td>{{ $dakur->biodata->satker }}</td>
                            <td>{{ $dakur->biodata->jabatan }}</td>
                            <td>{{ $dakur->biodata->pangkat }}</td>
                            <td>{{ $dakur->biodata->nrp }}</td>
                            <td>{{ $dakur->quality->nama_kua }}</td>
                            <td>{{ $dakur->biodata->tinggi_badan }}</td>
                            <td>{{ $dakur->biodata->berat_badan }}</td>
                            <td>{{ $dakur->panjang_baju !== null ? (fmod($dakur->panjang_baju, 1) == 0 ? intval($dakur->panjang_baju) : $dakur->panjang_baju) : '' }}

                            </td>
                            <td>{{ $dakur->lingkar_leher !== null ? (fmod($dakur->lingkar_leher, 1) == 0 ? intval($dakur->lingkar_leher) : $dakur->lingkar_leher) : '' }}
                            </td>
                            <td>{{ $dakur->lebar_bahu !== null ? (fmod($dakur->lebar_bahu, 1) == 0 ? intval($dakur->lebar_bahu) : $dakur->lebar_bahu) : '' }}
                            </td>
                            <td>{{ $dakur->panjang_lenganpan !== null ? (fmod($dakur->panjang_lenganpan, 1) == 0 ? intval($dakur->panjang_lenganpan) : $dakur->panjang_lenganpan) : '' }}
                            </td>
                            <td>{{ $dakur->panjang_lenganpen !== null ? (fmod($dakur->panjang_lenganpen, 1) == 0 ? intval($dakur->panjang_lenganpen) : $dakur->panjang_lenganpen) : '' }}
                            </td>
                            <td>{{ $dakur->lingkar_ketiak !== null ? (fmod($dakur->lingkar_ketiak, 1) == 0 ? intval($dakur->lingkar_ketiak) : $dakur->lingkar_ketiak) : '' }}
                            </td>
                            <td>{{ $dakur->sikut !== null ? (fmod($dakur->sikut, 1) == 0 ? intval($dakur->sikut) : $dakur->sikut) : '' }}
                            </td>
                            <td>{{ $dakur->ujung_lengan !== null ? (fmod($dakur->ujung_lengan, 1) == 0 ? intval($dakur->ujung_lengan) : $dakur->ujung_lengan) : '' }}
                            </td>
                            <td>{{ $dakur->lebar_dada !== null ? (fmod($dakur->lebar_dada, 1) == 0 ? intval($dakur->lebar_dada) : $dakur->lebar_dada) : '' }}
                            </td>
                            <td>{{ $dakur->lingkar_badan !== null ? (fmod($dakur->lingkar_badan, 1) == 0 ? intval($dakur->lingkar_badan) : $dakur->lingkar_badan) : '' }}
                            </td>
                            <td>{{ $dakur->lingkar_perut !== null ? (fmod($dakur->lingkar_perut, 1) == 0 ? intval($dakur->lingkar_perut) : $dakur->lingkar_perut) : '' }}
                            </td>
                            <td>{{ $dakur->lingkar_pinggang !== null ? (fmod($dakur->lingkar_pinggang, 1) == 0 ? intval($dakur->lingkar_pinggang) : $dakur->lingkar_pinggang) : '' }}
                            </td>
                            <td>{{ $dakur->lingkar_pinggul !== null ? (fmod($dakur->lingkar_pinggul, 1) == 0 ? intval($dakur->lingkar_pinggul) : $dakur->lingkar_pinggul) : '' }}
                            </td>
                            <td>{{ $dakur->lingkar_pinggangcel !== null ? (fmod($dakur->lingkar_pinggangcel, 1) == 0 ? intval($dakur->lingkar_pinggangcel) : $dakur->lingkar_pinggangcel) : '' }}
                            </td>
                            <td>{{ $dakur->lingkar_pinggulcel !== null ? (fmod($dakur->lingkar_pinggulcel, 1) == 0 ? intval($dakur->lingkar_pinggulcel) : $dakur->lingkar_pinggulcel) : '' }}
                            </td>
                            <td>{{ $dakur->panjang_celana !== null ? (fmod($dakur->panjang_celana, 1) == 0 ? intval($dakur->panjang_celana) : $dakur->panjang_celana) : '' }}
                            </td>
                            <td>{{ $dakur->lingkar_lutut !== null ? (fmod($dakur->lingkar_lutut, 1) == 0 ? intval($dakur->lingkar_lutut) : $dakur->lingkar_lutut) : '' }}
                            </td>
                            <td>{{ $dakur->lingkar_kaki !== null ? (fmod($dakur->lingkar_kaki, 1) == 0 ? intval($dakur->lingkar_kaki) : $dakur->lingkar_kaki) : '' }}
                            </td>
                            <td>{{ $dakur->tinggi_kruis !== null ? (fmod($dakur->tinggi_kruis, 1) == 0 ? intval($dakur->tinggi_kruis) : $dakur->tinggi_kruis) : '' }}
                            </td>
                            <td>{{ $dakur->lebar_paha !== null ? (fmod($dakur->lebar_paha, 1) == 0 ? intval($dakur->lebar_paha) : $dakur->lebar_paha) : '' }}
                            </td>
                            <td>{{ $dakur->keterangan }}</td>
                            <td>{{ $dakur->biodata->tanggal }}</td>
                            <td>
                                @if ($dakur->biodata->signature)
                                    <img src="{{ asset('storage/signatures/' . $dakur->biodata->signature) }}"
                                        alt="Signature" width="200">
                                @else
                                    <p>Tanda tangan belum tersedia.</p>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex gap-4">
                                    <a href="/tampilhasildakur/{{ $dakur->id }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('printdakur', $dakur->id) }}" class="btn btn-secondary">Print</a>
                                    <form id="delete-form-{{ $dakur->id }}"
                                        action="{{ route('deletehasildakur', $dakur->id) }}" method="GET">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger"
                                            onclick="confirmDelete({{ $dakur->id }})">Hapus</button>
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
        document.getElementById('checkAll').addEventListener('click', function(e) {
            let checkboxes = document.querySelectorAll('input[name="selected_projects[]"]');
            checkboxes.forEach(checkbox => checkbox.checked = e.target.checked);
        });
    </script>
    <script>
        document.getElementById('printSelectedLink').addEventListener('click', function(event) {
            event.preventDefault();

            let selected = [];
            document.querySelectorAll('input[name="selected_projects[]"]:checked').forEach(checkbox => {
                selected.push(checkbox.value);
            });

            if (selected.length === 0) {
                alert("Pilih setidaknya satu proyek untuk dicetak!");
                return;
            }

            let form = document.createElement('form');
            form.method = 'POST';
            form.action = "{{ route('projects.printSelected') }}"; 

            let csrfInput = document.createElement('input');
            csrfInput.type = 'hidden';
            csrfInput.name = '_token';
            csrfInput.value = "{{ csrf_token() }}";
            form.appendChild(csrfInput);

            selected.forEach(id => {
                let input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'selected_projects[]';
                input.value = id;
                form.appendChild(input);
            });

            document.body.appendChild(form);
            form.submit();
        });
    </script>

    <script>
        document.getElementById('deleteSelectedLink').addEventListener('click', function(event) {
            event.preventDefault();
            let selected = [];
            document.querySelectorAll('input[name="selected_projects[]"]:checked').forEach(checkbox => {
                selected.push(checkbox.value);
            });

            if (selected.length === 0) {
                alert("Pilih setidaknya satu proyek untuk dihapus!");
                return;
            }

            if (!confirm("Yakin ingin menghapus proyek yang dipilih?")) return;

            fetch("{{ route('projects.deleteSelected') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        selected_projects: selected
                    })
                })
                .then(response => response.json())
                .then(data => {
                    alert(data.message);
                    location.reload();
                })
                .catch(error => console.error("Error:", error));
        });
    </script>
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

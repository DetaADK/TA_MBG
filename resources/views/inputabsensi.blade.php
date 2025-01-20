<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Input Absensi') }}
        </h2>
    </x-slot>

    <div class="p-4">

        <!-- Menampilkan pesan sukses jika ada -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Dropdown untuk filter kelas -->
        <form method="GET" class="mb-4" action="{{ route('attendance.create') }}">
            <div class="form-group">
                <label for="filter_kelas" class="mb-2">Filter Kelas</label>
                <select name="kelas" id="filter_kelas" class="form-control" onchange="this.form.submit()">
                    <option value="">Pilih Kelas</option>
                    @foreach ($kelasList as $kelas)
                        <option value="{{ $kelas }}" {{ request('kelas') == $kelas ? 'selected' : '' }}>{{ $kelas }}</option>
                    @endforeach
                </select>
            </div>
        </form>

        <!-- Hanya tampilkan form jika kelas sudah dipilih -->
        @if (count($students) > 0)
            <form action="{{ route('attendance.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Menampilkan daftar siswa -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Tanggal</th>
                            <th>Status Izin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->kelas }}</td>

                                <!-- Input untuk absensi per siswa -->
                                <td>
                                    <input type="date" name="attendance[{{ $student->id }}][date]" class="form-control attendance-date" value="{{ date('Y-m-d') }}">
                                </td>

                                <!-- Dropdown Status Kehadiran -->
                                <td>
                                    <select name="attendance[{{ $student->id }}][status]" class="form-control attendance-status" data-student-id="{{ $student->id }}">
                                        <option value="Hadir">Hadir</option>
                                        <option value="Tidak Hadir">Tidak Hadir</option>
                                    </select>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Tombol submit -->
                <button type="submit" class="btn btn-primary">Simpan Absensi</button>
            </form>
        @else
            <!-- Jika kelas belum dipilih atau tidak ada siswa -->
            <p>Silakan pilih kelas terlebih dahulu untuk mengisi absensi.</p>
        @endif

        <!-- Script untuk menyamakan input tanggal dan menampilkan file izin -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Dapatkan semua elemen input tanggal
                const dateInputs = document.querySelectorAll('.attendance-date');
                
                // Tambahkan event listener ke setiap input
                dateInputs.forEach(input => {
                    input.addEventListener('change', function() {
                        // Dapatkan nilai dari input tanggal yang diubah
                        const newDate = this.value;
                        
                        // Perbarui semua input tanggal dengan nilai yang baru
                        dateInputs.forEach(otherInput => {
                            otherInput.value = newDate;
                        });
                    });
                });

                // Tampilkan input file izin hanya jika status "Izin" dipilih
                const statusSelects = document.querySelectorAll('.attendance-status');
                statusSelects.forEach(select => {
                    select.addEventListener('change', function() {
                        const studentId = this.getAttribute('data-student-id');
                        const izinFileInput = document.getElementById('izin-file-' + studentId);
                        
                        if (this.value === 'Izin') {
                            izinFileInput.style.display = 'block';
                        } else {
                            izinFileInput.style.display = 'none';
                        }
                    });
                });
            });
        </script>
    </div>
</x-app-layout>

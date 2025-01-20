<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Absensi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <!-- Form Filter -->
                <form method="GET" action="{{ route('attendance.index') }}" class="border p-4 rounded bg-light shadow-sm">
                    <div class="row g-3 align-items-center">
                        <!-- Filter Kelas -->
                        <div class="col-md-6">
                            <label for="name_starts_with" class="form-label">Filter Kelas:</label>
                            <select name="name_starts_with" id="name_starts_with" class="form-select" onchange="this.form.submit()">
                                <option value="">Pilih Kelasmu</option>
                                @foreach($kelasList as $kelas)
                                    <option value="{{ $kelas }}" {{ request('name_starts_with') == $kelas ? 'selected' : '' }}>
                                        {{ $kelas }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <!-- Filter Tanggal -->
                        <div class="col-md-6">
                            <label for="date" class="form-label">Filter Tanggal:</label>
                            <input type="date" name="date" id="date" class="form-control" value="{{ request('date') }}" onchange="this.form.submit()">
                        </div>
                    </div>
                </form>

                @php
                    // Mengelompokkan absensi berdasarkan tanggal
                    $groupedByDate = [];
                    foreach ($users as $user) {
                        if ($user->attendance) {
                            foreach ($user->attendance as $attendance) {
                                $groupedByDate[$attendance->date][] = [
                                    'id' => $attendance->id,
                                    'name' => $user->name,
                                    'kelas' => $user->kelas,
                                    'status' => $attendance->status,
                                ];
                            }
                        }
                    }
                @endphp

                <div class="container mt-5">
                    <div class="row">
                        <div class="col-md-12 ">
                            @foreach ($groupedByDate as $date => $attendances)
                                <!-- Tampilkan tanggal di luar tabel -->
                                <h3 class="mb-2 mt-4">Tanggal: {{ $date }}</h3>

                                <div class="card border-0 shadow-lg rounded">
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr class="">
                                                    <th scope="col">NAMA</th>
                                                    <th scope="col">KELAS</th>
                                                    <th scope="col">KETERANGAN</th>
                                                    <th scope="col" class="text-center" style="width: 20%">BUKTI IZIN</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($attendances as $attendance)
                                                <tr>
                                                    <td>{{ $attendance['name'] }}</td>
                                                    <td>{{ $attendance['kelas'] }}</td>
                                                    <td>{{ $attendance['status'] }}</td>
                                                    <td class="text-center">
                                                        @if(in_array($attendance['status'], ['Sakit', 'Izin','sakit', 'izin']))
                                                            <!-- Tampilkan tombol SHOW jika status adalah Sakit, Izin, atau Alpha -->
                                                            <a href="{{ route('show', $attendance['id']) }}" class="btn btn-sm btn-dark">SHOW</a>
                                                        @else
                                                            <!-- Kosong jika status 'Hadir' -->
                                                            -
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>                                        
                                        </table>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showEvidence(name) {
            // Di sini Anda bisa mengarahkan pengguna ke bukti izin (bisa berupa modal atau halaman baru)
            alert('Menampilkan bukti izin untuk ' + name);
        }
    </script>
</x-app-layout>

    
    
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Rekap Absensi</title>
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Rekap Absensi</h2>
        <h4>Nama: {{ $users->name }}</h4>

        <form method="GET" action="{{ route('showsiswa', ['id' => $users->id]) }}" class="mb-3">
            <div class="row">
                <div class="col">
                    <label for="month" class="form-label">Bulan</label>
                    <select name="month" id="month" class="form-select">
                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}" {{ request('month') == $i ? 'selected' : '' }}>
                                {{ \Carbon\Carbon::create()->month($i)->format('F') }}
                            </option>
                        @endfor
                    </select>
                </div>
                <div class="col">
                    <label for="year" class="form-label">Tahun</label>
                    <select name="year" id="year" class="form-select">
                        @foreach (range(2024, 2030) as $year)
                            <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>{{ $year }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col d-flex align-items-end">
                    <button type="submit" class="btn btn-success">Filter</button>
                </div>
            </div>
        </form>
        

        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($attendance as $item)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($item->date)->format('d-m-Y') }}</td>
                        <td class="
                            @if(strtolower($item->status) == 'sakit') 
                                bg-primary text-white
                            @elseif(strtolower($item->status) == 'hadir') 
                                bg-success text-white
                            @elseif(strtolower($item->status) == 'tidak hadir') 
                                bg-danger text-white
                            @elseif(strtolower($item->status) == 'izin') 
                                bg-warning text-dark
                            @endif
                            px-4 py-2 rounded">
                            {{ $item->status }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="text-center">Tidak ada data absensi untuk bulan ini</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Tombol Kembali -->
        <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Kembali</a>
    </div>
</body>
</html>

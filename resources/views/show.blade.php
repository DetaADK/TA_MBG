<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2>{{ $attendance->user->name }}</h2>
                    <p>Tanggal: {{ $attendance->date }}</p>
                    <p>Status: {{ $attendance->status }}</p>

                    @if ($attendance->foto && $attendance->foto !== 'noimage.png')
                        <img src="{{ Storage::url($attendance->foto) }}" alt="Foto Bukti Izin" class="img-fluid" width="500">
                    @else
                        <p>Belum ada bukti tidak masuk.</p>
                    @endif


                    <br>
                    <a href="{{ route('attendance.index') }}">
                        <button type="submit" class="btn btn-primary">Kembali</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
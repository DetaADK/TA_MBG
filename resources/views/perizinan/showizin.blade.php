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
                    <h2>{{ $perizinan->user->name }}</h2>
                    <p>Tanggal: {{ $perizinan->date }}</p>
                    <p>Status: {{ $perizinan->status }}</p>
                    <img src="{{ Storage::url($perizinan->foto) }}" alt="Foto Bukti Izin" class="img-fluid" width="500">

                    <br>    
                    <a href="{{ route('perizinan.index') }}">
                        <button type="submit" class="btn btn-primary">Kembali</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

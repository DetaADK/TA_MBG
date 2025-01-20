<x-app-layout>
    <div class="container my-5">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Data Izin') }}
            </h2>
        </x-slot>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                    <form class="mb-4" method="GET" action="{{ route('perizinan.index') }}">
                        <input type="text" name="nama" placeholder="Cari Nama" value="{{ request()->input('nama') }}">
                        <button type="submit" class="btn btn-primary" >Cari</button>
                    </form>
                    <table class="table table-bordered table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Nama User</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataPerizinan as $perizinan)
                            <tr>
                                <td>{{ $perizinan->user->name ?? 'Tidak ada' }}</td>
                                <td>{{ $perizinan->date }}</td>
                                <td>{{ $perizinan->status }}</td>
                                <td>
                                    <a href="{{ route('perizinan.showizin', $perizinan['id']) }}" class="btn btn-sm btn-dark">SHOW</a>
                                </td>
                                <td>
                                    <!-- Form Hapus dan Pindah -->
                                    @if(auth()->user()->usertype === 'admin')   
                                        <form action="{{ route('perizinan.pindahkanFoto', $perizinan->id) }}" method="POST" class="d-inline me-2">
                                            @csrf
                                            <button type="submit" class="btn btn-warning">Pindah ke absen</button>
                                        </form>     
                                        <form action="{{ route('perizinan.destroy', $perizinan['id']) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>     
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>                                               
                    </table>
                    {{ $dataPerizinan->links() }}
                </div>
            </div>
        </div>        
    </div>
</x-app-layout>

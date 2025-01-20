<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="container mt-5">
                    <h3 class="mb-4">Daftar User dan Statistik Absensi</h3>

                    <div class="row">
                        @foreach ($users as $user)
                            <div class="col-md-4 mb-4">
                                <a href="{{ route('showsiswa', $user->id) }}" style="text-decoration: none;">
                                    <div class="card text-black" style="cursor: pointer;">
                                        <div class="card-header">
                                            {{ $user->name }}
                                        </div>
                                        <div class="card-body">
                                            <p><strong>Jumlah Izin:</strong> {{ $user->jumlahIzin }}</p>
                                            <p><strong>Jumlah Sakit:</strong> {{ $user->jumlahSakit }}</p>
                                            <p><strong>Jumlah Alpha:</strong> {{ $user->jumlahAlpha }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                        {{ $users->links() }}
                </div>               
            </div>
        </div>
    </div>
</x-app-layout>

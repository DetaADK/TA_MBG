<x-app-layout>
    <div class="container my-5">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Input Izin') }}
            </h2>
        </x-slot>

        <!-- Menampilkan pesan sukses jika data berhasil disimpan -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Menampilkan error jika ada kesalahan validasi -->
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('/perizinan/store') }}" method="POST" enctype="multipart/form-data" class="border p-4 rounded bg-light shadow-sm">
            @csrf

            <div class="mb-3">
                <label for="user_id" class="form-label">Nama User:</label>
                <select name="user_id" class="form-select" id="userSelect" required>
                    <option value="">Pilih User</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>     
                <x-input-error :messages="$errors->get('user_id')" class="mt-2" />           
            </div>            

            <div class="mb-3">
                <label for="date" class="form-label">Tanggal:</label>
                <input type="date" name="date" class="form-control" required>
                <x-input-error :messages="$errors->get('date')" class="mt-2" />
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status:</label>
                <input type="text" name="status" class="form-control" required>
                <x-input-error :messages="$errors->get('status')" class="mt-2" />
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto:</label>
                <input type="file" name="foto" class="form-control">
                <x-input-error :messages="$errors->get('foto')" class="mt-2" />
            </div>

            <div>
                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
            </div>
        </form>
    </div>
</x-app-layout>

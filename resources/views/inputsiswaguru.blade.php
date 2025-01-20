<x-app-layout>
    <div class="container my-5">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Input Siswa dan Guru') }}
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

        
        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data" class="border p-4 rounded bg-light shadow-sm">
            @csrf
    
            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- NISN -->
            <div class="mt-4">
                <x-input-label for="nisn" :value="__('NISN')" />
                <x-text-input id="nisn" class="block mt-1 w-full" type="text" name="nisn" :value="old('nisn')" required autofocus autocomplete="nisn" />
                <x-input-error :messages="$errors->get('nisn')" class="mt-2" />
            </div>

            <!-- Kelas -->
            <div class="mt-4">
                <x-input-label for="kelas" :value="__('Kelas')" />
                <x-text-input id="kelas" class="block mt-1 w-full" type="text" name="kelas" :value="old('kelas')" required autofocus autocomplete="kelas" />
                <x-input-error :messages="$errors->get('kelas')" class="mt-2" />
            </div>

            <!-- Jenis Kelamin -->
            <div class="mt-4">
                <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" />
                <select id="jenis_kelamin" name="jenis_kelamin" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                    <option value="" disabled {{ old('jenis_kelamin') == '' ? 'selected' : '' }}>Pilih Jenis Kelamin</option>
                    <option value="Laki_laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
                <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2" />
            </div>
            
            <!-- Alamat -->
            <div class="mt-4">
                <x-input-label for="alamat" :value="__('Alamat')" />
                <x-text-input id="alamat" class="block mt-1 w-full" type="text" name="alamat" :value="old('alamat')" required autofocus autocomplete="alamat" />
                <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
            </div>

            <!--  Usertype -->
            <div class="mt-4">
                <x-input-label for="usertype" :value="__('User Type')" />
                <select id="usertype" name="usertype" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                    <option value="" disabled {{ old('') == '' ? 'selected' : '' }}>Pilih Type</option>
                    <option value="admin" {{ old('usertype') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="user" {{ old('usertype') == 'user' ? 'selected' : '' }}>User</option>
                </select>
                <x-input-error :messages="$errors->get('usertype')" class="mt-2" />
            </div>            
    
            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
    
            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
    
                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
    
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
    
            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
    
                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />
    
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
    
            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </form>
    </div>
</x-app-layout>

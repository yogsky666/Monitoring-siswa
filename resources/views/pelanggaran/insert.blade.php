@extends('layouts.app')

@section('content')
    <div class="w-full px-6 py-6 mx-auto">
        <!-- Card -->
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">

                    <!-- Card Header -->
                    <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6 class="text-blue-700 text-xl font-bold">Tambah Data Pelanggaran</h6>
                    </div>

                    <!-- Form -->
                    <form action="{{ route('pelanggaran.store') }}" method="POST" class="flex-auto p-6 space-y-6">
                        @csrf

                        <!-- KODE SISWA -->
                        <div>
                            <label for="kode_siswa" class="block mb-2 text-sm font-bold text-gray-700">NISN</label>
                            <input type="text" name="kode_siswa" id="kode_siswa"
                                class="focus:shadow-primary-outline text-sm focus:border-blue-500 block w-xl rounded-lg border border-gray-300 bg-white p-3 leading-5 text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:ring"
                                placeholder="Masukkan NISN" required value="{{ old('kode_siswa') }}">
                            @error('nisn')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <br>
                        <div>
                            <label for="id_sanksi" class="block mb-2 text-sm font-bold text-gray-700">KODE
                                PELANGGARAN</label>
                            <input type="text" name="id_sanksi" id="id_sanksi"
                                class="focus:shadow-primary-outline text-sm focus:border-blue-500 block w-xl rounded-lg border border-gray-300 bg-white p-3 leading-5 text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:ring"
                                placeholder="Kode Pelanggar" required value="{{ old('id_sanksi') }}">
                            @error('nisn')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-4">
                            <button type="submit"
                                class="inline-block w-2xs px-6 py-3 text-xs font-bold text-white uppercase transition-all ease-in duration-150 bg-blue-500 hover:bg-blue-600 rounded-lg shadow-md hover:shadow-lg focus:outline-none focus:ring">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

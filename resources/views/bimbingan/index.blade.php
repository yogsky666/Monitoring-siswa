@extends('layouts.app')

@section('content')
    <div class="w-full px-6 py-6 mx-auto">
        <!-- table 1 -->

        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div
                        class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex justify-between items-center">

                        <!-- Tombol Input Pelanggaran -->
                        <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow hover:shadow-md transition duration-150 ease-in-out focus:outline-none focus:ring"
                            href="{{ route('bimbingan.create') }}">
                            Input Bimbingan
                        </a>

                    </div>
                    <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6 class="dark:text-white">{{ $judul }}</h6>
                    </div>
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-0 overflow-x-auto">
                            <table
                                class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500 min-w-[120px]">
                                <thead class="align-bottom">
                                    <tr>
                                        <th
                                            class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            NO</th>
                                        <th
                                            class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            NISN</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            NAMA</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            DESKRIPSI BIMBINGAN</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            POINT BIMBINGAN</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            WAKTU BIMBINGAN</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bimbingan as $b)
                                        <tr>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <div class="flex justify-center items-center h-full">
                                                    <h6 class="mb-0 text-sm leading-normal dark:text-white">
                                                        {{ $loop->iteration }}
                                                    </h6>
                                                </div>
                                            </td>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <div class="flex justify-center items-center h-full">
                                                    <h6 class="mb-0 text-sm leading-normal dark:text-white">
                                                        {{ $b->siswa->nisn ?? '-' }}
                                                    </h6>
                                                </div>
                                            </td>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <div class="flex justify-left items-center h-full">
                                                    <h6 class="mb-0 text-sm leading-normal dark:text-white">
                                                        {{ $b->siswa->user->nama ?? '-' }}
                                                    </h6>
                                                </div>
                                            </td>
                                            <td
                                                class="p-2 text-left align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <div class="flex justify-left items-center h-full">
                                                    <h6 class="mb-0 text-sm leading-normal dark:text-white">
                                                        {{ $b->introspeksi->desk_introspeksi ?? '-' }}
                                                    </h6>
                                                </div>
                                            </td>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <div class="flex justify-center items-center h-full">
                                                    <h6 class="mb-0 text-sm leading-normal dark:text-white">
                                                        {{ $b->introspeksi->point_introspeksi ?? '-' }}
                                                    </h6>
                                                </div>
                                            </td>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <div class="flex justify-center items-center h-full">
                                                    <h6 class="mb-0 text-sm leading-normal dark:text-white">
                                                        {{ Carbon\Carbon::parse($b->created_at)->translatedFormat('d M Y, H:i') }}
                                                    </h6>
                                                </div>
                                            </td>
                                            <td
                                                class="p-2 text-center align-middle bg-blue border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <form action="{{ route('bimbingan.destroy', $b->id) }}" method="POST"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="inline-block px-3 py-1 text-xs font-semibold text-white bg-blue-500 rounded">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="flex justify-between items-center mt-6 ml-4">
                            <div>
                                <p class="text-sm text-gray-600">
                                    Showing <span class="font-medium">1</span> to <span class="font-medium">10</span> of
                                    <span class="font-medium">20</span> results
                                </p>
                            </div>
                            <nav class="flex space-x-2">
                                <a href="#"
                                    class="px-3 py-2 rounded-md text-sm font-medium text-gray-600 hover:bg-blueGray-100 focus:outline-none">
                                    Previous
                                </a>
                                <a href="#"
                                    class="px-3 py-2 rounded-md text-sm font-medium bg-lightBlue-600 text-blue shadow-md">
                                    1
                                </a>
                                <a href="#"
                                    class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-blueGray-100 focus:outline-none">
                                    2
                                </a>
                                <a href="#"
                                    class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-blueGray-100 focus:outline-none">
                                    3
                                </a>
                                <a href="#"
                                    class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-blueGray-100 focus:outline-none">
                                    Next
                                </a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @include('layouts.footer')
    </div>
@endsection

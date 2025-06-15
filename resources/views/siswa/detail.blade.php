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

                        <div class="relative flex items-left md:ml-6 md:pr-4">
                            <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow hover:shadow-md transition duration-150 ease-in-out focus:outline-none focus:ring"
                                href="{{ route('siswa.create') }}">
                                Input Siswa
                            </a>
                            <a class="ml-4 bg-slate-700 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow hover:shadow-md transition duration-150 ease-in-out focus:outline-none focus:ring"
                                href="javascript:void(0)" onclick="window.print();">
                                Cetak Kelas
                            </a>
                        </div>

                        <form action="" method="GET" class="flex space-x-4 items-right">
                            <div class="flex items-center md:ml-auto md:pr-4">
                                <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease">
                                    <span
                                        class="text-sm ease leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
                                        <i class="fas fa-search"></i>
                                    </span>
                                    <input type="text"
                                        class="pl-9 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow"
                                        placeholder="Cari disini.." />
                                </div>
                                <select name="kelas" id="kelas"
                                    class="ml-4 border border-gray-300 rounded px-3 py-2 text-sm dark:bg-slate-850 dark:text-white">
                                    <option value="">Semua Kelas</option>
                                    @foreach ($kelasList as $id_kelas => $kode_kelas)
                                        <option value="{{ $id_kelas }}"
                                            {{ request('kelas') == $kode_kelas ? 'selected' : '' }}>
                                            {{ $kode_kelas }}
                                        </option>
                                    @endforeach
                                </select>
                                <button type="submit"
                                    class="ml-6 bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded">Cari</button>
                            </div>
                        </form>
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
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            NO</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            NISN</th>
                                        <th
                                            class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            NAMA SISWA</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            KELAS</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            TOTAL PELANGGARAN</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            TOTAL PERBAIKAN</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            JUMLAH TOTAL</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($siswa as $s)
                                        <tr>
                                            <td
                                                class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent text-center">
                                                <div class="flex justify-center items-center h-full">
                                                    <h6 class="mb-0 text-sm leading-normal dark:text-white">
                                                        {{ $loop->iteration }}
                                            </td>
                                            <td
                                                class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent text-center">
                                                <div class="flex justify-center items-center h-full">
                                                    <h6 class="mb-0 text-sm leading-normal dark:text-white">
                                                        {{ $s->nisn }}
                                                    </h6>
                                                </div>
                                            </td>
                                            <td
                                                class="p-2 text-left align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <div class="flex justify-left items-center h-full">
                                                    <h6 class="mb-0 text-sm leading-normal dark:text-white">
                                                        {{ $s->user->nama ?? '-' }}
                                                    </h6>
                                                </div>
                                            </td>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <div class="flex justify-center items-center h-full">
                                                    <h6 class="mb-0 text-sm leading-normal dark:text-white">
                                                        {{ $s->kelas->kode_kelas ?? '-' }}
                                                    </h6>
                                                </div>
                                            </td>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <div class="flex justify-center items-center h-full">
                                                    <h6 class="mb-0 text-sm leading-normal dark:text-white">
                                                        {{ $s->total_point_pelanggar ?? 0 }}
                                                    </h6>
                                                </div>
                                            </td>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <div class="flex justify-center items-center h-full">
                                                    <h6 class="mb-0 text-sm leading-normal dark:text-white">
                                                        {{ $s->total_point_perbaikan ?? 0 }}
                                                    </h6>
                                                </div>
                                            </td>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <div class="flex justify-center items-center h-full">
                                                    <h6 class="mb-0 text-sm leading-normal dark:text-white">
                                                        {{ ($s->total_point_pelanggar ?? 0) - ($s->total_point_perbaikan ?? 0) }}
                                                    </h6>
                                                </div>
                                            </td>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <a href="javascript:;"
                                                    class="inline-block px-3 py-1 text-xs font-semibold text-white bg-blue-500 rounded">
                                                    Edit
                                                </a>
                                                <a href="javascript:;"
                                                    class="inline-block px-3 py-1 text-xs font-semibold text-red bg-red-500 rounded">
                                                    Delete
                                                </a>
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

        @include('layouts.footer')
    </div>
@endsection

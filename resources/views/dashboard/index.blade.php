@extends('layouts.app')

@section('content')
    <div class="w-full px-6 py-6 mx-auto mt overflow-y-hidden">
        <!-- row 1 -->
        <div class="flex flex-wrap -mx-3">
            <!-- card1 -->
            <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <div>
                                    <p
                                        class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">
                                        Jumlah <br>Siswa</p>
                                    <h5 class="mb-2 font-bold dark:text-white">{{ $totalSiswa }}</h5>
                                </div>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div
                                    class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-blue-500 to-violet-500">
                                    <i class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- card2 -->
            <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <div>
                                    <p
                                        class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">
                                        Jumlah <br>Kelas</p>
                                    <h5 class="mb-2 font-bold dark:text-white">{{ $totalKelas }}</h5>
                                </div>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div
                                    class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-red-600 to-orange-600">
                                    <i class="ni leading-none ni-world text-lg relative top-3.5 text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- card3 -->
            <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <div>
                                    <p
                                        class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">
                                        Total Pelanggar</p>
                                    <h5 class="mb-2 font-bold dark:text-white">{{ $totalPelanggar }}</h5>
                                </div>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div
                                    class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-emerald-500 to-teal-400">
                                    <i class="ni leading-none ni-paper-diploma text-lg relative top-3.5 text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- card4 -->
            <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/4">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <div>
                                    <p
                                        class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">
                                        Total Point Pelanggaran</p>
                                    <h5 class="mb-2 font-bold dark:text-white">{{ $totalPointPelanggar }}</h5>
                                </div>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div
                                    class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-orange-500 to-yellow-500">
                                    <i class="ni leading-none ni-cart text-lg relative top-3.5 text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- cards row 2 -->
        <div class="flex flex-wrap mt-6 -mx-3 mb-8">
            <div class="w-full max-w-full px-3 mt-0 lg:w-7/12 lg:flex-none">
                <div
                    class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                    <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
                        <h6 class="capitalize dark:text-white">Sales overview</h6>
                        <p class="mb-0 text-sm leading-normal dark:text-white dark:opacity-60">
                            <i class="fa fa-arrow-up text-emerald-500"></i>
                            <span class="font-semibold">4% more</span> in 2021
                        </p>
                    </div>
                    <div class="flex-auto p-4">
                        <div>
                            <canvas id="chart-line" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full max-w-full px-3 lg:w-5/12 lg:flex-none">
                <div slider class="relative w-full h-full overflow-hidden rounded-2xl">
                    <!-- slide 1 -->
                    <div slide class="absolute w-full h-full transition-all duration-500">
                        <img class="object-cover h-full" src="./assets/img/carousel-1.jpg" alt="carousel image" />
                        <div class="block text-start ml-12 left-0 bottom-0 absolute right-[15%] pt-5 pb-5 text-white">
                            <div
                                class="inline-block w-8 h-8 mb-4 text-center text-black bg-white bg-center rounded-lg fill-current stroke-none">
                                <i class="top-0.75 text-xxs relative text-slate-700 ni ni-camera-compact"></i>
                            </div>
                            <h5 class="mb-1 text-white">Get started with Argon</h5>
                            <p class="dark:opacity-80">There’s nothing I really wanted to do in life that I wasn’t able to
                                get good at.</p>
                        </div>
                    </div>

                    <!-- slide 2 -->
                    <div slide class="absolute w-full h-full transition-all duration-500">
                        <img class="object-cover h-full" src="./assets/img/carousel-2.jpg" alt="carousel image" />
                        <div class="block text-start ml-12 left-0 bottom-0 absolute right-[15%] pt-5 pb-5 text-white">
                            <div
                                class="inline-block w-8 h-8 mb-4 text-center text-black bg-white bg-center rounded-lg fill-current stroke-none">
                                <i class="top-0.75 text-xxs relative text-slate-700 ni ni-bulb-61"></i>
                            </div>
                            <h5 class="mb-1 text-white">Faster way to create web pages</h5>
                            <p class="dark:opacity-80">That’s my skill. I’m not really specifically talented at anything
                                except for the ability to learn.</p>
                        </div>
                    </div>

                    <!-- slide 3 -->
                    <div slide class="absolute w-full h-full transition-all duration-500">
                        <img class="object-cover h-full" src="./assets/img/carousel-3.jpg" alt="carousel image" />
                        <div class="block text-start ml-12 left-0 bottom-0 absolute right-[15%] pt-5 pb-5 text-white">
                            <div
                                class="inline-block w-8 h-8 mb-4 text-center text-black bg-white bg-center rounded-lg fill-current stroke-none">
                                <i class="top-0.75 text-xxs relative text-slate-700 ni ni-trophy"></i>
                            </div>
                            <h5 class="mb-1 text-white">Share with us your design tips!</h5>
                            <p class="dark:opacity-80">Don’t be afraid to be wrong because you can’t learn anything from a
                                compliment.</p>
                        </div>
                    </div>

                    <!-- Control buttons -->
                    <button btn-next
                        class="absolute z-10 w-10 h-10 p-2 text-lg text-white border-none opacity-50 cursor-pointer hover:opacity-100 far fa-chevron-right active:scale-110 top-6 right-4"></button>
                    <button btn-prev
                        class="absolute z-10 w-10 h-10 p-2 text-lg text-white border-none opacity-50 cursor-pointer hover:opacity-100 far fa-chevron-left active:scale-110 top-6 right-16"></button>
                </div>
            </div>
        </div>

        <!-- cards row 3 -->

        <div class="p-4 pb-0 rounded-t-4 bg-white shadow dark:shadow-gray-800">
            <div class="p-0 overflow-x-auto">
                <h6 class="mb-0 dark:text-white">Pelanggar Terbanyak</h6>
                <table
                    class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500 min-w-[120px]">
                    <thead class="align-bottom">
                        <tr>
                            <th
                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                NO</th>
                            <th
                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                NISN</th>
                            <th
                                class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                NAMA SISWA</th>
                            <th
                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                KELAS</th>
                            <th
                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                TOTAL KESELURUHAN</th>
                            <th
                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelanggarTerbanyak as $s)
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
                                </td>
                                <td
                                    class="p-2 text-left align-left bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                    <div class="flex justify-left items-center h-full">
                                        <h6 class="mb-0 text-sm leading-normal dark:text-white">
                                            {{ $s->user->nama ?? '-' }}
                                </td>
                                <td
                                    class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                    <div class="flex justify-center items-center h-full">
                                        <h6 class="mb-0 text-sm leading-normal dark:text-white">
                                            {{ $s->kelas->kode_kelas ?? '-' }}
                                </td>
                                <td
                                    class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                    <div class="flex justify-center items-center h-full">
                                        <h6 class="mb-0 text-sm leading-normal dark:text-white">
                                            {{ $s->total_point_keseluruhan }}
                                </td>
                                <td
                                    class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                    <div class="flex justify-center items-center h-full">
                                        <h6 class="mb-0 text-sm leading-normal dark:text-white">
                                            @php
                                                $status = $s->desc_point_pelanggar;
                                            @endphp
                                            @if ($status == 'Siswa Bermasalah')
                                                <span
                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-700 dark:text-red-100">
                                                    {{ $status }}
                                                </span>
                                            @elseif ($status == 'Perlu Perhatian')
                                                <span
                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-700 dark:text-yellow-100">
                                                    {{ $status }}
                                                </span>
                                            @elseif ($status == 'Masih Aman')
                                                <span
                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-700 dark:text-green-100">
                                                    {{ $status }}
                                                </span>
                                            @else
                                                <span
                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-100">
                                                    {{ $status }}
                                                </span>
                                            @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <br>
        <br>

        <!-- Footer -->
        <footer class="pt-4">
            <div class="w-full px-6 mx-auto">
                <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
                    <div class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
                        <div class="text-sm leading-normal text-center text-slate-500 lg:text-left">
                            ©
                            <script>
                                document.write(new Date().getFullYear() + ",");
                            </script>
                            made with <i class="fa fa-heart"></i> by
                            <a href="https://www.creative-tim.com" class="font-semibold text-slate-700 dark:text-white"
                                target="_blank">Creative
                                Tim</a>
                            for a better web.
                        </div>
                    </div>
                    <div class="w-full max-w-full px-3 mt-0 shrink-0 lg:w-1/2 lg:flex-none">
                        <ul class="flex flex-wrap justify-center pl-0 mb-0 list-none lg:justify-end">
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com"
                                    class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-in-out text-slate-500"
                                    target="_blank">Creative Tim</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/presentation"
                                    class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-in-out text-slate-500"
                                    target="_blank">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://creative-tim.com/blog"
                                    class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-in-out text-slate-500"
                                    target="_blank">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/license"
                                    class="block px-4 pt-0 pb-1 pr-0 text-sm font-normal transition-colors ease-in-out text-slate-500"
                                    target="_blank">License</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer -->
    </div>
@endsection

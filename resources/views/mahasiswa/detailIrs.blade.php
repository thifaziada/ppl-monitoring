@extends('layout.main')

@section('content')
<div class="container mx-auto mb-4">
    <h1 class="text-2xl mb-10 pt-4">Status IRS Terbarumu, <span class="text-blue-500">{{ $mahasiswa->nama }}</span></h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-8">
        <!-- First Card -->
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" style="border-radius: 10px;">
            <h2 class="text-xl font-semibold mb-4">Masukkan Laporan IRSmu.</h2>

           
        <form action="{{ route('entryIrs_mahasiswa') }}" method="POST" enctype="multipart/form-data">
            @csrf

            
            <div class="mb-4 pt-10">
                
                <label for="smst_aktif" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Semester</label>
                <select id="smst_aktif" name="smst_aktif" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                @error('smst_aktif') border-red-500 @enderror">

                @error('smst_aktif')
                    <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                @enderror

                    <option value="" disabled selected >--Pilih Semester Aktif--</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                </select>
            </div>

            <div class="mb-6">
                <label for="jumlah_sks" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah SKS</label>
                <input type="number" id="jumlah_sks" name="jumlah_sks" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                @error('jumlah_sks') border-red-500 @enderror">

                @error('jumlah_sks')
                    <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">     
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="berkas_irs">Upload scan IRS</label>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                @error('berkas_irs') border-red-500 @enderror" aria-describedby="berkas_irs_help" id="berkas_irs" name = "berkas_irs" type="file">
                <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="berkas_irs_help"></div>
                @error('berkas_irs')
                    <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                @enderror

            </div>
            <div class="flex">
                <div class="ml-auto mt-10 pt-10">
                    <button type="submit" class="bg-gradient-to-r from-blue-500 to-blue-700 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan Laporan</button>
                </div>
                </div>
        </form>
        </div>


        <!-- Second Card -->
        <div class=" shadow-md rounded px-8 pt-6 pb-8 mb-4" style="border-radius: 10px;">
                    <div class="bg-white relative shadow rounded-lg w-5/6 md:w-5/6  lg:w-4/6 xl:w-3/6 mx-auto">
                       
                        
                        <div class="mt-20">
                            <h1 class="font-bold text-center text-3xl text-gray-900 pt-10">IRS</h1>
                            <p class="text-center text-sm text-gray-400 font-medium">{{ $mahasiswa->nama }}</p>
                            <p class="text-center text-sm text-gray-400">{{ $mahasiswa->NIM }}</p>
                            <p>
                                <span>
                                    
                                </span>
                            </p>
                            


                            <div class="my-5 px-6">
                                @if(!$irsNull)
                                    @if ($irs->persetujuan == 'Sudah Disetujui')
                                    <div class="text-gray-200 block rounded-lg text-center font-medium leading-6 px-6 py-3 bg-gray-900 hover:bg-black hover:text-white">Connect with <span class="font-bold">@pantazisoft</span></div>
                                    @else
                                    <div class="p-2 bg-gradient-to-r from-red-500 to-red-700 text-white text-xs" style="border-radius: 10px;">
                                        <h2 class="text-sm  text-center">Belum Disetujui</h2>
                                        </div> 
                                    @endif
                                @else
                                <div class="p-2 bg-gradient-to-r from-purple-500 to-purple-700 text-white text-xs" style="border-radius: 10px;">
                                    <h2 class="text-sm  text-center">Mohon Isi Irs terlebih dahulu</h2>
                                    </div> 
                                @endif
                               
                            </div>
        
                            <div class="w-full">
                                <h3 class="font-medium text-gray-900 text-left px-6">Detail</h3>
                                <div class="mt-5 w-full flex flex-col items-center overflow-hidden text-sm">
                                    <a href="#" class="w-full border-t border-gray-100 text-gray-600 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                                        <img src="https://avatars0.githubusercontent.com/u/35900628?v=4" alt="" class="rounded-full h-6 shadow-md inline-block mr-2">
                                            {{$irs->smst_aktif}}
                                            <span class="text-gray-500 text-xs">Semester Aktif</span>
                                    </a>
        
                                    <a href="#" class="w-full border-t border-gray-100 text-gray-600 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                                        <img src="https://avatars0.githubusercontent.com/u/35900628?v=4" alt="" class="rounded-full h-6 shadow-md inline-block mr-2">
                                            {{$irs->jumlah_sks}}
                                            <span class="text-gray-500 text-xs">Jumlah SKS yang di ambil.</span>
                                    </a>
                                    <a href="#" class="w-full border-t border-gray-100 text-gray-600 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                                            <span class="text-gray-500 text-xs">--</span>
                                    </a>
        
                                  
                                    
                                </div>
                            </div>
                        </div>
           
            </div>
        </div>
    </div>
</div>
@endsection
@extends('user.layouts.app')
@section('content')
<div class="flex justify-center">
    <h1 class="bg-gradient-to-r from-indigo-600 to-pink-500 p-2 text-white font-semibold text-2xl rounded-lg mt-10">Daftarkan Diri Anda</h1>
</div>
<div class="flex container justify-around my-14">
    <form action="" method="POST"  class=" bg-white p-5 rounded-xl border-4 shadow-slate-500 shadow-xl border-cyan-500 shadow-slate-500">
        <h1 class="font-semibold text-xl pb-3 text-center">Silakan isi data diri anda </h1>
        <div class="grid grid-cols-2 gap-4">
            @csrf
            <div class="form-group bg-gray-200 rounded-xl p-2 px-2">
                <label for="" class="block font-semibold ">Username</label>
                <input type="text" name="username" id="" class="w-full rounded-md border-transparent focus:border-transparent focus:ring-0 p-2" value="{{ old('username') }}">
                @error('username')
                    <p>{{ $message }}</p>
                @enderror
                <ul class="list-disc ml-5 p-1"><li>nama pengguna</li></ul>
            </div>

            <div class="form-group bg-gray-200 rounded-xl p-2 px-2">
                <label for="" class="block font-semibold ">Name</label>
                <input type="text" name="name" id="" class="w-full rounded-md border-transparent focus:border-transparent focus:ring-0 p-2" value="{{ old('name') }}">
                @error('name')
                    <p>{{ $message }}</p>
                @enderror
                <ul class="list-disc ml-5 p-1"><li>nama lengkap</li></ul>
            </div>

            <div class="form-group bg-gray-200 rounded-xl p-2 px-2">
                <label for="" class="block font-semibold ">Email</label>
                <input type="email" name="email" id="" class="w-full rounded-md border-transparent focus:border-transparent focus:ring-0 p-2" value="{{ old('email') }}">
                @error('email')
                    <p>{{ $message }}</p>
                @enderror
                <ul class="list-disc ml-5 p-1"><li>email aktif anda</li></ul>
            </div>

            <div class="form-group bg-gray-200 rounded-xl p-2 px-2">
                <label for="" class="block font-semibold ">Nik</label>
                <input type="text" name="nik" id="" class="w-full rounded-md border-transparent focus:border-transparent focus:ring-0 p-2focus border-transparent:border-transparent  value focus:ring-0 p-2" value="{{ old('nik') }}">
                @error('nik')
                    <p>{{ $message }}</p>
                @enderror
                <ul class="list-disc ml-5 p-1"><li>nik 16-digit</li></ul>
            </div>
            <div class="form-group bg-gray-200 rounded-xl p-2 px-2">
                <label for="" class="block font-semibold ">Nomor BPJS</label>
                <input type="text" name="nomor_bpjs" id="" class="w-full rounded-md border-transparent focus:border-transparent focus:ring-0 p-2 focus border-transparent:border-transparent  value focus:ring-0" value="{{ old('nomor_bpjs') }}">
                @error('nomor_bpjs')
                    <p>{{ $message }}</p>
                @enderror
                <ul class="list-disc ml-5 p-1">
                    <li>no 16-digit</li>
                    <li>Optionanl</li>
                </ul>
            </div>

            <div class="form-group bg-gray-200 rounded-xl p-2 px-2">
                <label for="" class="block font-semibold ">Umur</label>
                <input type="number" name="age" id="" class="w-full rounded-md border-transparent focus:border-transparent focus:ring-0 p-2"  value="{{ old('age') }}">
                @error('age')
                    <p>{{ $message }}</p>
                @enderror
                <ul class="list-disc ml-5 p-1"><li>umur pasien/pendaftar</li></ul>
            </div>

            <div class="form-group bg-gray-200 rounded-xl p-2 px-2">
                <label for="" class="block font-semibold ">Password</label>
                <input type="password" name="password" id="" class="w-full rounded-md border-transparent focus:border-transparent focus:ring-0 p-2"  value="{{ old('password') }}">
                @error('password')
                    <p>{{ $message }}</p>
                @enderror
                <ul class="list-disc ml-5 p-1"><li>min 8 karakter</li></ul>
            </div>
                {{-- Button --}}
            <div class="form-group grid col-span-2">
                <button type="submit" class="rounded-md bg-yellow-400 transition ease-in-out hover:bg-blue-500 hover:text-white duration-500 font-semibold p-2">Register</button>
            </div>
        </div>
    </form>
</div>
@endsection
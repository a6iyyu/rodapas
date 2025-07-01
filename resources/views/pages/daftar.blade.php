@extends("layouts.main")

@section("judul", "Daftar")
@section("deskripsi")

@section("konten")
    <main class="bg-white rounded-xl my-20 p-10 w-4/5 border border-slate-300/50 md:w-3/5 lg:w-[45%]">
        <h4 class="mt-4 cursor-default text-lg text-center font-semibold tracking-wide">
            Selamat Datang 👋🏻
        </h4>
        <h5 class="mt-1.5 mb-7 cursor-default text-sm text-slate-600 text-center tracking-wide">
            Segera daftarkan akun Anda.
        </h5>
        <form action="{{ route('autentikasi.daftar') }}" method="POST">
            @csrf
            @method("POST")
            @if ($errors->any())
                <ul class="p-4 cursor-default rounded-lg bg-red-50 border border-red-500 list-disc list-inside text-sm text-red-500">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <div class="my-5 space-y-5">
                <x-input
                    icon="fa-solid fa-building"
                    label="Nama Restoran"
                    name="nama_restoran"
                    placeholder="Masukkan Nama Restoran Anda"
                    :required="true"
                />
                <x-input
                    icon="fa-solid fa-id-card"
                    label="Email"
                    name="email"
                    type="email"
                    placeholder="Masukkan Email Restoran Anda"
                    :required="true"
                />
                <x-input
                    icon="fa-brands fa-telegram"
                    label="Akun Telegram"
                    name="akun_telegram"
                    placeholder="Masukkan Akun Telegram Anda"
                    :required="true"
                />
                <x-input
                    icon="fa-solid fa-lock"
                    label="Kata Sandi"
                    name="kata_sandi"
                    placeholder="Masukkan Kata Sandi Anda"
                    type="password"
                    :required="true"
                />
                <x-input
                    icon="fa-solid fa-check-double"
                    label="Konfirmasi Kata Sandi"
                    name="kata_sandi_confirmation"
                    placeholder="Konfirmasi Kata Sandi Anda"
                    type="password"
                    :required="true"
                />
            </div>
            <a href="{{ route("daftar") }}" class="text-sm text-[#5955b2] transition-all duration-300 lg:hover:underline lg:hover:text-[#4f4bad]">
                Sudah Punya Akun?
            </a>
            <button type="submit" class="mt-7 text-sm cursor-pointer w-full py-4 rounded-lg font-semibold transform transition-all duration-500 bg-[#5955b2] text-white lg:focus:outline-none lg:hover:scale-[1.02] lg:hover:bg-[#4f4bad]">
                <i class="fa-solid fa-right-to-bracket"></i> &ensp;Masuk
            </button>
        </form>
        <div class="flex mt-10 flex-col items-start justify-between space-y-3 text-sm text-[#5955b2] sm:flex-row sm:items-center">
            <span>
                <i class="fa-solid fa-globe mr-2"></i>
                <a href="https://rodapas.web.id" class="font-semibold">rodapas.web.id</a>
            </span>
            <span class="flex items-center">
                <i class="fa-solid fa-phone mr-2"></i>
                <h4 class="font-semibold">6282143494259</h4>
            </span>
        </div>
    </main>
@endsection
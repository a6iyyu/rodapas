@extends("layouts.main")

@section("judul", "Menu")
@section("deskripsi")

@section("konten")
    @include("shared.navigation.header")
    <main class="container mx-auto my-14 w-9/10">
        <fieldset class="relative text-sm">
            <label for="search" class="sr-only">Cari Menu</label>
            <i class="fa-solid fa-magnifying-glass absolute top-1/2 left-4 -translate-y-1/2 text-gray-500"></i>
            <input type="search" name="search" id="search" placeholder="Cari menu..." class="w-full py-3 pl-12 pr-4 border border-gray-300 rounded-lg focus:outline-none" />
        </fieldset>
        <section class="mt-5 hidden grid-cols-4 p-2 bg-slate-200/75 rounded-lg lg:grid">
            <button type="button" class="flex items-center justify-center gap-3 cursor-pointer font-semibold rounded py-2 text-sm bg-white">
                <h5>Semua Menu</h5>
                <h5 class="bg-slate-200/75 rounded-full text-xs px-3 py-1">
                    {{ $total_menu ?? null }}
                </h5>
            </button>
            <button type="button" class="flex items-center justify-center gap-3 cursor-pointer font-semibold rounded py-2 text-sm">
                <h5>Makanan</h5>
                <h5 class="bg-slate-200/75 rounded-full text-xs px-3 py-1">
                    {{ $total_makanan ?? null }}
                </h5>
            </button>
            <button type="button" class="flex items-center justify-center gap-3 cursor-pointer font-semibold rounded py-2 text-sm">
                <h5>Minuman</h5>
                <h5 class="bg-slate-200/75 rounded-full text-xs px-3 py-1">
                    {{ $total_minuman ?? null }}
                </h5>
            </button>
            <button type="button" class="flex items-center justify-center gap-3 cursor-pointer font-semibold rounded py-2 text-sm">
                <h5>Kudapan</h5>
                <h5 class="bg-slate-200/75 rounded-full text-xs px-3 py-1">
                    {{ $total_kudapan ?? null }}
                </h5>
            </button>
        </section>
        @include("components.menu.daftar")
        @include("components.menu.edit")
        @include("components.menu.tambah")
    </main>
@endsection
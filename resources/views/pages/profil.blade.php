@extends("layouts.main")

@section("judul", "Profil")
@section("deskripsi")

@section("konten")
    @include('shared.navigation.header')
    <main class="container mx-auto grid grid-cols-1 gap-8 my-14 w-9/10 lg:grid-cols-12">
        <section class="col-span-6 flex flex-col gap-8 lg:col-span-7">
            @include('components.profil.statistik')
            @include('components.profil.informasi-restoran')
        </section>
        <section class="col-span-6 flex flex-col gap-8 lg:col-span-5">
            @include('components.profil.pesanan-terbaru')
            @include('components.profil.aksi-cepat')
        </section>
    </main>
@endsection
@extends("layouts.main")

@section("judul", "Menu")
@section("deskripsi")

@section("konten")
    @include("shared.navigation.header")
    <main class="container mx-auto my-14 w-9/10">
        @include('components.menu.edit')
        @include('components.menu.tambah')
    </main>
@endsection
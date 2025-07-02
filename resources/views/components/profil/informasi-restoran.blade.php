<article class="p-6 rounded-md bg-white border border-slate-800/20">
    <h4 class="text-base cursor-default font-bold text-slate-800 lg:text-xl">
        Informasi Restoran
    </h4>
    <hr class="mt-2.5 h-1 w-full text-slate-800" />
    <img src="{{ $restoran->logo ?? asset('img/polinema.jpg') }}" alt="Logo Restoran" class="mb-8 mt-6 mx-auto h-24 w-24 object-cover" />
    <div class="mt-4 grid grid-cols-1 gap-8 md:grid-cols-2">
        <span class="flex flex-col gap-2">
            <h4 class="font-semibold text-sm">Nama Restoran</h4>
            <h5 class="text-xs lg:text-sm">{{ $restoran->nama_restoran }}</h5>
        </span>
        <span class="flex flex-col gap-1.5">
            <h4 class="font-semibold text-sm">Email</h4>
            <h5 class="text-xs lg:text-sm">{{ $restoran->email }}</h5>
        </span>
        <span class="flex flex-col gap-2">
            <h4 class="font-semibold text-sm">Nomor Telepon</h4>
            <h5 class="text-xs lg:text-sm">{{ $restoran->nomor_telepon }}</h5>
        </span>
        <span class="flex flex-col gap-1.5">
            <h4 class="font-semibold text-sm">Akun Telegram</h4>
            <h5 class="text-xs lg:text-sm">{{ $restoran->akun_telegram }}</h5>
        </span>
    </div>
    <span class="mt-8 flex flex-col gap-1.5">
        <h4 class="font-semibold text-sm">Alamat</h4>
        <h5 class="text-xs lg:text-sm">{{ $restoran->alamat }}</h5>
    </span>
</article>
<section id="order" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 backdrop-blur-sm" aria-modal="true" role="dialog">
    <form action="{{ route('pesan') }}" method="POST" class="min-h-screen flex items-center justify-center w-full px-4" enctype="multipart/form-data">
        @csrf
        @method("POST")
        <figure class="max-h-[90vh] overflow-y-auto w-full max-w-xl rounded-xl bg-white px-7 py-6 shadow-lg border border-[var(--stroke)]">
            <fieldset>
                <label for="id_item" class="sr-only">ID Item</label>
                <input type="hidden" name="id_item" id="id_item" />
            </fieldset>
            <span class="flex items-center justify-between">
                <h4 id="name" class="cursor-default font-semibold text-sm lg:text-lg"></h4>
                <i id="close" class="fa-solid fa-xmark cursor-pointer"></i>
            </span>
            <img id="image" loading="lazy" class="mt-5 aspect-16/9 object-cover w-full rounded-xl" />
            <div class="mb-6 mt-4 flex items-center justify-between">
                <h4 id="price" class="cursor-default font-semibold text-sm lg:text-lg"></h4>
                <fieldset class="flex items-center gap-6">
                    <button type="button" id="minus" class="cursor-pointer px-3 py-2 text-sm font-medium border border-gray-200 transition-all duration-300 ease-in-out rounded-lg lg:hover:bg-gray-200/80">
                        <i class="fa-solid fa-minus"></i>
                    </button>
                    <label for="jumlah" class="sr-only">Jumlah</label>
                    <h5 id="portion">1</h5>
                    <input type="hidden" name="jumlah" id="jumlah" value="1" />
                    <button type="button" id="plus" class="cursor-pointer px-3 py-2 text-sm font-medium border border-gray-200 transition-all duration-300 ease-in-out rounded-lg lg:hover:bg-gray-200/80">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                </fieldset>
            </div>
            <x-input icon="fa-solid fa-user" label="Nama Pelanggan" name="nama_pelanggan" type="text" placeholder="Masukkan Nama" :required="true" />
            <fieldset id="description" class="cursor-default text-sm space-y-2"></fieldset>
            <button type="submit" class="mt-10 cursor-pointer w-full py-3 text-sm font-semibold text-white bg-blue-500 transition-all duration-300 ease-in-out rounded-lg lg:hover:bg-blue-600">
                Tambah
            </button>
        </figure>
    </form>
</section>
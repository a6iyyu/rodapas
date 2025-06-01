@php
    $cart = session('cart', []);
@endphp

<section id="cart" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 backdrop-blur-sm" aria-modal="true" role="dialog">
    <form action="{{ route('keranjang.bayar') }}" method="POST" class="min-h-screen flex items-center justify-center w-full px-4">
        @csrf
        @method("POST")
        <figure class="max-h-[90vh] overflow-y-auto w-full max-w-xl rounded-xl bg-white px-7 py-6 shadow-lg border border-[var(--stroke)]">
            <span class="flex items-center justify-between">
                <h4 class="font-semibold text-sm lg:text-lg">Keranjang</h4>
                <i id="close-cart" class="fa-solid fa-xmark cursor-pointer"></i>
            </span>
            @if(count($cart) === 0)
                <h5 class="mt-4 text-sm text-gray-500">Keranjang kosong.</h5>
            @else
                <ul class="mt-4 space-y-2">
                    @foreach($cart as $index => $item)
                        <li class="border-b py-2 flex justify-between text-sm">
                            <h5>{{ $item['nama'] }} (x{{ $item['jumlah'] }})</h5>
                            <h5>Rp {{ number_format($item['subtotal'], 0, ',', '.') }}</h5>
                        </li>
                    @endforeach
                </ul>
                <h5 class="my-4 font-semibold text-right">
                    Total: Rp {{ number_format(collect($cart)->sum('subtotal'), 0, ',', '.') }}
                </h5>
                <x-input
                    icon="fa-solid fa-user"
                    label="Nama Pelanggan"
                    name="nama_pelanggan"
                    placeholder="Nama Pelanggan"
                    type="text"
                    :required="true"
                />
                <button type="submit" class="mt-6 w-full py-3 text-sm font-semibold text-white bg-blue-500 transition-all duration-300 ease-in-out rounded-lg lg:hover:bg-blue-600">
                    Bayar
                </button>
            @endif
        </figure>
    </form>
</section>
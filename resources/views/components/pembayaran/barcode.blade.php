<section class="mb-6 w-full max-w-md rounded-lg border border-gray-200 bg-white shadow-sm flex flex-col items-center p-4">
    <h4 class="cursor-default font-semibold text-lg text-gray-800 mb-4">
        Scan untuk Membayar
    </h4>
    <div class="mb-4 w-40 h-40 flex items-center justify-center border border-dashed border-gray-400 rounded">
        {!! $qr[$transaction->id_transaksi] ?? "" !!}
    </div>
    <h6 class="cursor-default text-xs text-gray-500 mb-4 text-center">
        Scan QR code di atas menggunakan aplikasi e-wallet atau mobile banking Anda
    </h6>
    <form action="{{ route('pembayaran.konfirmasi', $transaction->id_transaksi) }}" method="POST" class="w-full">
        @csrf
        <input type="hidden" name="id_transaksi" value="{{ $transaction->id_transaksi }}">
        <button type="submit" class="cursor-pointer w-full py-3 text-sm font-semibold rounded text-white bg-green-500 transition-all duration-300 ease-in-out hover:bg-green-600 mb-2">
            Konfirmasi Pembayaran
        </button>
    </form>
    <form action="{{ route('pembayaran.batal', $transaction->id_transaksi) }}" method="POST" class="mt-1 w-full">
        @csrf
        <input type="hidden" name="id_transaksi" value="{{ $transaction->id_transaksi }}">
        <button type="submit" class="cursor-pointer w-full py-3 text-sm font-semibold rounded text-white bg-red-500 transition-all duration-300 ease-in-out hover:bg-red-600">
            Batalkan Pembayaran
        </button>
    </form>
</section>
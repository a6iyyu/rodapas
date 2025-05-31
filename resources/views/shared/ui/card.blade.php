<figure class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col">
    <img src="{{ $image }}" alt="{{ $name }}" loading="lazy" class="aspect-[4/3] object-cover w-full" />
    <figcaption class="flex flex-col gap-3 p-4">
        <h4 class="cursor-default text-lg font-semibold text-gray-800">
            {{ $name }}
        </h4>
        <span class="flex items-center justify-between">
            <h5 class="cursor-default text-base font-bold text-gray-800">
                {{ $price() }}
            </h5>
            <button data-id="{{ $target }}" data-name="{{ $name }}" data-price="{{ $price() }}" data-image="{{ $image }}" type="button" class="cursor-pointer px-4 py-2 text-sm font-medium text-white bg-blue-500 transition-all duration-300 ease-in-out rounded-lg lg:hover:bg-blue-600">
                Tambah
            </button>
        </span>
    </figcaption>
</figure>
/* eslint-disable no-undef */

import axios from "axios";

interface DescriptionItem {
  id_item: number;
  nama_keterangan: string;
  pilihan: string;
  wajib: boolean;
}

document.addEventListener("DOMContentLoaded", () => {
  const order = document.getElementById("order") as HTMLElement;
  const close = document.getElementById("close") as HTMLElement;
  const minus = document.getElementById("minus") as HTMLButtonElement;
  const plus = document.getElementById("plus") as HTMLButtonElement;
  const portion = document.getElementById("portion") as HTMLHeadingElement;
  const count = document.getElementById("jumlah") as HTMLInputElement;
  const name = document.getElementById("name") as HTMLElement;
  const price = document.getElementById("price") as HTMLElement;
  const image = document.getElementById("image") as HTMLImageElement;
  const description = document.getElementById("description") as HTMLElement | null;
  const open = document.querySelectorAll("button[data-id]") as NodeListOf<HTMLButtonElement>;

  if (order == null || close == null || minus == null || plus == null || portion == null || count == null || name == null || price == null || image == null || description == null) return;

  open.forEach((button) => {
    button.addEventListener("click", async () => {
      const item_id = button.getAttribute("data-id");
      const item_name = button.getAttribute("data-name");
      const item_price = button.getAttribute("data-price");
      const item_image = button.getAttribute("data-image");

      if (item_id == null || item_name == null || item_price == null || item_image == null) return;

      (document.getElementById("id_item") as HTMLInputElement).value = item_id;
      name.innerText = item_name;
      price.innerText = item_price;
      image.src = item_image;
      portion.innerText = "1";

      minus.classList.add("cursor-not-allowed", "opacity-50");
      minus.classList.remove("cursor-pointer", "opacity-100");
      description.innerHTML = "";

      try {
        const response = await axios.get("/keterangan");
        const data: { description: DescriptionItem[] } = response.data;
        const filtered = data.description.filter((desc) => desc.id_item.toString() === item_id);

        filtered.forEach((desc) => {
          const field_wrapper = document.createElement("div");
          const label = document.createElement("label");

          label.className = "mt-4 flex items-center justify-between font-medium text-sm";
          label.textContent = desc.nama_keterangan + (desc.wajib ? " *" : "");
          field_wrapper.appendChild(label);

          const select = document.createElement("select");
          select.name = `pesanan[0][keterangan_pilihan][${desc.nama_keterangan.replace(/\s+/g, "_").toLowerCase()}]`;
          select.className = "appearance-none w-full mt-4 border border-gray-300 rounded-md px-3 py-2 text-sm";
          if (desc.wajib) select.required = true;

          const options = JSON.parse(desc.pilihan);
          options.forEach((option: string) => {
            const opt = document.createElement("option");
            opt.value = option;
            opt.text = option;
            select.appendChild(opt);
          });

          field_wrapper.appendChild(select);
          description.appendChild(field_wrapper);
        });
      } catch (error) {
        console.error(`Gagal memuat deskripsi: ${error}`);
      }

      order.classList.remove("hidden");
    });
  });

  close.addEventListener("click", () => order.classList.add("hidden"));

  order.addEventListener("click", (event: MouseEvent) => {
    if (event.target === order) order.classList.add("hidden");
  });

  minus.addEventListener("click", () => {
    const current = parseInt(portion.innerText);
    if (current <= 1) return;

    const new_value = current - 1;
    portion.innerText = new_value.toString();
    count.value = new_value.toString();

    if (new_value === 1) {
      minus.classList.add("cursor-not-allowed", "opacity-50");
      minus.classList.remove("cursor-pointer", "opacity-100");
    }
  });

  plus.addEventListener("click", () => {
    const current = parseInt(portion.innerText);
    const new_value = current + 1;
    portion.innerText = new_value.toString();
    count.value = new_value.toString();

    if (new_value > 1) {
      minus.classList.remove("cursor-not-allowed", "opacity-50");
      minus.classList.add("cursor-pointer", "opacity-100");
    }
  });
});
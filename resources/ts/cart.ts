import axios from "axios";
import console from "console";

/**
 * Render ulang isi keranjang dan pasang ulang event listener.
 */
const render_cart = async (): Promise<void> => {
  try {
    const response = await axios.get("/keranjang");
    const html = response.data as string;
    const range = document.createRange();
    const cart_fragment = range.createContextualFragment(html);
    const updated_cart = cart_fragment.querySelector("#cart") as HTMLElement;

    const old_cart = document.getElementById("cart") as HTMLElement;
    old_cart.replaceWith(updated_cart);

    const close_cart = updated_cart.querySelector("#close-cart") as HTMLElement;
    if (close_cart != null) close_cart.addEventListener("click", () => updated_cart.classList.add("hidden"));

    updated_cart.classList.remove("hidden");

    updated_cart.addEventListener("click", async (event) => {
      const target = event.target as HTMLElement;

      if (target === updated_cart) {
        updated_cart.classList.add("hidden");
        return;
      }

      if (target.matches(".remove-item")) {
        const index = target.dataset.id;
        if (index == null) return;

        try {
          await axios.post(`/keranjang/hapus/${index}`);
          await render_cart();
        } catch (error) {
          console.error("Gagal menghapus item:", error);
          throw error;
        }
      }
    });
  } catch (error) {
    console.error("Gagal memuat ulang keranjang:", error);
    throw error;
  }
}

/**
 * Menangani klik tombol buka keranjang.
 */
document.addEventListener("DOMContentLoaded", () => {
  const open_cart = document.getElementById("open-cart") as HTMLElement;
  if (open_cart == null) return;

  open_cart.addEventListener("click", async () => {
    await render_cart();
  });
});
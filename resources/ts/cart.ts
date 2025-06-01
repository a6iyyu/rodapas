/* eslint-disable no-undef */
import axios from "axios";

/**
 * @fileoverview
 * This module handles the cart functionality with dynamic AJAX loading.
 */
document.addEventListener("DOMContentLoaded", () => {
  const cart = document.getElementById("cart") as HTMLElement;
  const open = document.getElementById("open-cart") as HTMLElement;
  if (open == null || cart == null) return;

  open.addEventListener("click", async () => {
    try {
      const response = await axios.get("/keranjang");
      const html = response.data as string;
      const range = document.createRange();
      cart.replaceWith(range.createContextualFragment(html));

      const new_cart = document.getElementById("cart") as HTMLElement;
      const close = document.getElementById("close-cart") as HTMLElement;
      if (new_cart == null || close == null) return;

      new_cart.classList.remove("hidden");
      close.addEventListener("click", () => new_cart.classList.add("hidden"));
      new_cart.addEventListener("click", (event) => {
        if (event.target === new_cart) new_cart.classList.add("hidden");
      });
    } catch (error) {
      console.error(error);
    }
  });
});
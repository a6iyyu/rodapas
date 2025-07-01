/**
 * @fileoverview
 * File ini berisi logika frontend yang berkaitan dengan form.
 *
 * Fungsionalitas yang disediakan:
 * - Menangani klik ikon mata untuk menampilkan atau menyembunyikan input password.
 * - Mengubah teks tombol submit menjadi "Memuat..." saat form dikirim jika valid.
 */

document.addEventListener('DOMContentLoaded', () => {
  const eyes = document.querySelectorAll('.fa-eye, .fa-eye-slash') as NodeListOf<HTMLElement>;
  const form = document.querySelector('form') as HTMLFormElement;
  const submit = document.querySelector("button[type='submit']") as HTMLButtonElement;

  if (eyes == null || form == null || submit == null) return;

  eyes.forEach((eye) => {
    eye.addEventListener('click', () => {
      const container = eye.closest('div');
      if (!container) return;

      const input = container.querySelector("input[type='password'], input[type='text']") as HTMLInputElement | null;
      if (!input) return;

      const password = input.type === 'password';
      input.type = password ? 'text' : 'password';
      eye.classList.toggle('fa-eye', !password);
      eye.classList.toggle('fa-eye-slash', password);
    });
  });

  form.addEventListener('submit', () => {
    if (!form.checkValidity()) return;
    submit.innerText = 'Memuat...';
  });
});
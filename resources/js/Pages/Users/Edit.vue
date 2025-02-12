<template>
    <div>
      <h1 class="text-2xl font-bold mb-4">Edit Pengguna</h1>
  
      <form @submit.prevent="submitForm">
        <div class="mb-4">
          <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
          <input
            v-model="form.name"
            type="text"
            id="name"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
            required
          />
        </div>
  
        <div class="mb-4">
          <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
          <input
            v-model="form.email"
            type="email"
            id="email"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
            required
          />
        </div>
  
        <div class="mb-4">
          <label for="password" class="block text-sm font-medium text-gray-700">
            Password (Biarkan kosong jika tidak ingin mengubah)
          </label>
          <input
            v-model="form.password"
            type="password"
            id="password"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
            placeholder="Kosongkan jika tidak ingin mengubah password"
          />
        </div>
  
        <div class="mb-4">
          <label for="peran" class="block text-sm font-medium text-gray-700">Peran</label>
          <select
            v-model="form.peran"
            id="peran"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
            required
          >
            <option value="admin">Admin</option>
            <option value="pengelola">Pengelola</option>
            <option value="pengajar">Pengajar</option>
            <option value="murid">Murid</option>
          </select>
        </div>
  
        <div class="flex items-center justify-end">
          <button
            type="submit"
            class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600"
          >
            Simpan Perubahan
          </button>
        </div>
      </form>
    </div>
  </template>
  
  <script setup>
  import { useForm } from '@inertiajs/vue3';
  
  // Terima data pengguna dari Laravel
  const props = defineProps({
    user: Object,
  });
  
  // Inisialisasi form menggunakan useForm
  const form = useForm({
    name: props.user.name,
    email: props.user.email,
    password: '', // Password kosong secara default
    peran: props.user.peran,
  });
  
  // Fungsi untuk mengirim form
  const submitForm = () => {
    form.put(route('users.update', props.user.id), {
      onSuccess: () => {
        // Tampilkan pesan sukses atau lakukan sesuatu setelah berhasil
        alert('Pengguna berhasil diperbarui.');
      },
      onError: () => {
        // Tampilkan pesan error jika terjadi masalah
        alert('Gagal memperbarui pengguna.');
      },
    });
  };
  </script>
  
  <style scoped>
  /* Tambahkan gaya opsional di sini */
  </style>
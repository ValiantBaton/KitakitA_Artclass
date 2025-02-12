<template>
    <div>
      <h1 class="text-2xl font-bold mb-4">Tambah Pengguna</h1>
  
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
          <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
          <input
            v-model="form.password"
            type="password"
            id="password"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
            required
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
            Tambah Pengguna
          </button>
        </div>
      </form>
    </div>
  </template>
  
  <script setup>
  import { useForm } from '@inertiajs/vue3';
  
  // Inisialisasi form menggunakan useForm
  const form = useForm({
    name: '',
    email: '',
    password: '',
    peran: 'murid',
  });
  
  // Fungsi untuk mengirim form
  const submitForm = () => {
    form.post(route('users.store'), {
      onSuccess: () => {
        form.reset(); // Reset form setelah berhasil
      },
    });
  };
  </script>
  
  <style scoped>
  /* Tambahkan styling sesuai kebutuhan */
  </style>
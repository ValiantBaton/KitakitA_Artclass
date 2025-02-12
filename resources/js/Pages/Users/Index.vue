<template>
  <div>
    <h1 class="text-2xl font-bold mb-4">Daftar Pengguna</h1>
    <Link
      :href="route('users.create')"
      class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600"
    >
      Tambah Pengguna
    </Link>

    <table class="table-auto w-full mt-4">
      <thead>
        <tr>
          <th class="px-4 py-2">Name</th>
          <th class="px-4 py-2">Email</th>
          <th class="px-4 py-2">Peran</th>
          <th class="px-4 py-2">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="user in users" :key="user.id">
          <td class="border px-4 py-2">{{ user.name }}</td>
          <td class="border px-4 py-2">{{ user.email }}</td>
          <td class="border px-4 py-2">{{ user.peran }}</td>
          <td class="border px-4 py-2">
            <Link :href="route('users.edit', user.id)" class="text-blue-500">Edit</Link>
            <button
              @click="deleteUser(user.id)"
              class="text-red-500 ml-2"
            >
              Hapus
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup>
import { Link, router } from '@inertiajs/vue3';

// Data pengguna diterima sebagai prop dari Laravel
defineProps({
  users: Array,
});

// Fungsi untuk menghapus pengguna
const deleteUser = (id) => {
  if (confirm('Apakah Anda yakin ingin menghapus pengguna ini?')) {
    router.delete(route('users.destroy', id), {
      onSuccess: () => {
        alert('Pengguna berhasil dihapus.');
      },
      onError: () => {
        alert('Gagal menghapus pengguna.');
      },
    });
  }
};
</script>
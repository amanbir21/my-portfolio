<script setup>
import { ref } from "vue"
import { useRouter } from "vue-router"

// Logout function
const router = useRouter()
const logout = () => {
  localStorage.removeItem("token")
  router.push("/admin/login")
}

// Sidebar toggle for mobile
const sidebarOpen = ref(false)
const toggleSidebar = () => {
  sidebarOpen.value = !sidebarOpen.value
}
</script>

<template>
<div class="flex h-screen bg-gray-100">

  <!-- Sidebar -->
  <aside 
    :class="['bg-white w-64 p-6 space-y-6 border-r border-gray-200 transition-transform', sidebarOpen ? 'translate-x-0' : '-translate-x-64', 'md:translate-x-0 md:static md:flex-shrink-0']"
  >
    <h2 class="font-bold text-xl mb-6">Admin Panel</h2>
    <nav class="flex flex-col space-y-2">
      <router-link to="/admin/dashboard" class="hover:text-blue-600" active-class="font-semibold">Dashboard</router-link>
      <router-link to="/admin/add-project" class="hover:text-blue-600" active-class="font-semibold">Add Project</router-link>
      <router-link to="/admin/projects" class="hover:text-blue-600" active-class="font-semibold">Project List</router-link>
    </nav>
  </aside>

  <!-- Main Content -->
  <div class="flex-1 flex flex-col">

    <!-- Topbar -->
    <header class="h-16 bg-white shadow flex items-center justify-between px-6 border-b border-gray-200">
      <div class="flex items-center space-x-4">
        <button @click="toggleSidebar" class="md:hidden text-gray-600 hover:text-gray-900">
          ☰
        </button>
        <h1 class="text-lg font-semibold">Admin Dashboard</h1>
      </div>
      <button @click="logout" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">
        Logout
      </button>
    </header>

    <!-- Page Content -->
    <main class="flex-1 overflow-auto p-6">
      <router-view />
    </main>
  </div>

</div>
</template>

<style scoped>
/* Smooth transition for sidebar */
aside {
  transition: transform 0.3s ease-in-out;
}
</style>
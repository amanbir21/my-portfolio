<template>
  <div class="flex min-h-screen bg-slate-50 dark:bg-gray-950 text-gray-900 dark:text-gray-100">
    
    <!-- Sidebar -->
    <Sidebar />

    <!-- Main Content -->
    <main class="flex-1 p-8 overflow-auto">
      <!-- Child page will be rendered here -->
      <router-view />
    </main>
  </div>
</template>

<script setup>
import Sidebar from "../../components/Sidebar.vue"
</script>
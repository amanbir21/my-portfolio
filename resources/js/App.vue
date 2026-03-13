<template>
  <div :class="{ 'dark': isDark }" class="min-h-screen">
    
    <!-- Only show Navbar on public routes -->
    <Navbar v-if="!isAdminRoute" @toggle-dark="toggleDarkMode" :isDark="isDark" />

    <!-- Page content -->
    <router-view />
  </div>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue'
import { useRoute } from 'vue-router'
import Navbar from './components/Navbar.vue'

const isDark = ref(false)
const route = useRoute()

const isAdminRoute = computed(() => route.path.startsWith('/admin'))

const toggleDarkMode = () => {
  isDark.value = !isDark.value
  document.documentElement.classList.toggle('dark', isDark.value)
  localStorage.setItem('theme', isDark.value ? 'dark' : 'light')
}

onMounted(() => {
  const saved = localStorage.getItem('theme')
  if (saved === 'dark') {
    isDark.value = true
    document.documentElement.classList.add('dark')
  }
})
</script>
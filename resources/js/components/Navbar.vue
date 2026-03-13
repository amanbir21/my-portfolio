<template>
  <nav
    :class="[
      'fixed top-0 w-full z-50 backdrop-blur-2xl bg-white/30 dark:bg-gray-900/30 border-b border-gray-200 dark:border-gray-800 transition-all duration-300',
      scrolled ? 'shadow-2xl py-2' : 'shadow-none py-4'
    ]"
  >
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between relative">

      <!-- Logo -->
      <router-link to="/" class="flex items-center space-x-2 hover:scale-105 transition-transform relative group">
        <img
          :src="logo"
          alt="Amanuel Kassa Logo"
          class="object-cover rounded-full border transition-all duration-300 shadow-md group-hover:shadow-blue-400/50"
          :class="scrolled ? 'h-10 w-10 border-gray-400 dark:border-gray-600' : 'h-12 w-12 border-gray-300 dark:border-gray-700'"
        />
        <span
          class="font-black text-xl text-black dark:text-white relative group-hover:text-transparent bg-clip-text bg-gradient-to-r from-blue-400 via-purple-500 to-pink-500 transition-all duration-500"
        >
          Amanuel <span class="text-blue-500">Kassa</span>
        </span>
      </router-link>

      <!-- Desktop Menu -->
      <ul class="hidden md:flex gap-6 font-semibold text-gray-700 dark:text-gray-300 relative">
        <li v-for="link in links" :key="link.name" class="relative group">
          <router-link
            :to="link.path"
            class="relative px-2 py-1 rounded hover:text-blue-400 transition-colors duration-300"
            active-class="active-link"
          >
            {{ link.name }}
            <span
              class="absolute bottom-0 left-0 h-0.5 w-full bg-gradient-to-r from-blue-400 via-purple-500 to-pink-500 neon-underline"
            ></span>
          </router-link>
        </li>

        <!-- Login / Logout -->
        <li>
          <button
            v-if="!isLoggedIn"
            @click="goToLogin"
            class="bg-blue-600 text-white px-4 py-1 rounded hover:bg-blue-700 hover:shadow-lg transition duration-300"
          >
            Login
          </button>
          <button
            v-else
            @click="logout"
            class="bg-red-500 text-white px-4 py-1 rounded hover:bg-red-600 hover:shadow-lg transition duration-300"
          >
            Logout
          </button>
        </li>
      </ul>

      <!-- Mobile Menu & Theme Toggle -->
      <div class="flex items-center gap-4 md:hidden">
        <ThemeToggle />
        <button @click="toggleMenu" class="text-2xl text-gray-800 dark:text-white focus:outline-none">
          {{ mobileMenu ? '✕' : '☰' }}
        </button>
      </div>
    </div>

    <!-- Mobile Menu -->
    <transition name="slide-fade">
      <div
        v-if="mobileMenu"
        class="md:hidden px-4 sm:px-6 pb-6 flex flex-col gap-4 bg-white/30 dark:bg-gray-900/30 backdrop-blur-lg rounded-b-2xl shadow-xl"
      >
        <router-link
          v-for="link in links"
          :key="link.name"
          @click="toggleMenu"
          :to="link.path"
          class="font-semibold text-gray-700 dark:text-gray-300 hover:text-blue-400 transition-colors duration-300"
          active-class="active-link"
        >
          {{ link.name }}
        </router-link>

        <button
          v-if="!isLoggedIn"
          @click="goToLogin"
          class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 hover:shadow-lg transition duration-300"
        >
          Login
        </button>
        <button
          v-else
          @click="logout"
          class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 hover:shadow-lg transition duration-300"
        >
          Logout
        </button>
      </div>
    </transition>
  </nav>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue'
import { useRouter } from 'vue-router'
import ThemeToggle from './ThemeToggle.vue'
import logo from '../assets/logo.jpg'

const router = useRouter()
const mobileMenu = ref(false)
const toggleMenu = () => (mobileMenu.value = !mobileMenu.value)

const links = [
  { name: 'Home', path: '/' },
  { name: 'About', path: '/about' },
  { name: 'Skills', path: '/skills' },
  { name: 'Projects', path: '/project' }, // Vue SPA route
  { name: 'Contact', path: '/contact' },
]

const scrolled = ref(false)
const handleScroll = () => { scrolled.value = window.scrollY > 50 }
onMounted(() => window.addEventListener('scroll', handleScroll))
onBeforeUnmount(() => window.removeEventListener('scroll', handleScroll))

const isLoggedIn = ref(false)
const checkLogin = () => { isLoggedIn.value = !!localStorage.getItem('token') }
const goToLogin = () => { router.push('/admin/login') }
const logout = () => {
  localStorage.removeItem('token')
  router.push('/admin/login')
  checkLogin()
}
onMounted(checkLogin)
</script>

<style scoped>
/* Neon underline animation */
@keyframes neonMove {
  0% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
  100% { background-position: 0% 50%; }
}

.neon-underline {
  background-size: 200% 100%;
  animation: neonMove 2.5s linear infinite;
  border-radius: 2px;
}
</style>
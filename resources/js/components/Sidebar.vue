<template>
  <aside class="w-64 bg-slate-900 text-white flex flex-col sticky top-0 h-screen p-6">
    <h1 class="text-2xl font-bold mb-6">Admin Dashboard</h1>

    <nav class="flex flex-col gap-3">
      <button
        v-for="link in links"
        :key="link.name"
        @click="navigate(link.path)"
        :class="currentPath === link.path ? activeBtn : inactiveBtn"
      >
        {{ link.label }}
      </button>
    </nav>

    <div class="mt-auto">
      <button @click="logout" class="w-full bg-red-600 text-white px-4 py-2 rounded mt-6 hover:bg-red-700 transition">
        Logout
      </button>
    </div>
  </aside>
</template>

<script setup>
import { ref, watch } from "vue"
import { useRouter, useRoute } from "vue-router"

const router = useRouter()
const route = useRoute()

const links = [
  { name: "stats", path: "/admin/stats", label: "📊 Stats" },
  { name: "add", path: "/admin/add", label: "➕ Add Project" },
  { name: "list", path: "/admin/list", label: "📋 Project List" },
  { name: "manage", path: "/admin/manage", label: "🛠 Manage Projects" },
]

const currentPath = ref(route.path)

// Update active button when route changes
watch(
  () => route.path,
  (newPath) => {
    currentPath.value = newPath
  }
)

// Navigate even if the current page is the same
const navigate = (path) => {
  if (route.path === path) {
    router.replace(path) // forces reload if already on page
  } else {
    router.push(path)
  }
}

const logout = () => {
  localStorage.removeItem("token")
  router.push("/admin/login")
}

const activeBtn = "bg-blue-600 text-white px-4 py-2 rounded"
const inactiveBtn = "bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded"
</script>
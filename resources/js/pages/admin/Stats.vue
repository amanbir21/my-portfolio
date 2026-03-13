<template>
  <div class="min-h-screen p-6 bg-gray-100 dark:bg-gray-900">
    <h2 class="text-3xl font-bold mb-6 text-gray-900 dark:text-white">Admin Stats</h2>

    <!-- Total Projects -->
    <div class="bg-white dark:bg-gray-800 p-6 rounded shadow mb-6">
      <p class="text-xl font-semibold text-gray-700 dark:text-gray-300">
        Total Projects: {{ totalProjects }}
      </p>
    </div>

    <!-- Projects Table -->
    <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
      <h3 class="text-2xl font-bold mb-4 text-gray-900 dark:text-white">Projects List</h3>

      <table class="w-full text-left border-collapse">
        <thead>
          <tr class="border-b border-gray-300 dark:border-gray-600">
            <th class="px-4 py-2">ID</th>
            <th class="px-4 py-2">Title</th>
            <th class="px-4 py-2">Technology</th>
            <th class="px-4 py-2">Created At</th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="project in projects"
            :key="project.id"
            class="border-b border-gray-200 dark:border-gray-700"
          >
            <td class="px-4 py-2">{{ project.id }}</td>
            <td class="px-4 py-2">{{ project.title }}</td>
            <td class="px-4 py-2">{{ project.technology }}</td>
            <td class="px-4 py-2">{{ formatDate(project.created_at) }}</td>
          </tr>
        </tbody>
      </table>

      <p v-if="projects.length === 0" class="text-gray-500 mt-4">No projects found.</p>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue"
import api from "../../axios.js" // make sure your axios includes the token

const totalProjects = ref(0)
const projects = ref([])

const fetchStats = async () => {
  try {
    // Use the correct admin API route
    const res = await api.get("/projects/admin")

    // Store projects
    projects.value = Array.isArray(res.data) ? res.data : res.data.data ?? []

    // Update total
    totalProjects.value = projects.value.length
  } catch (e) {
    console.error("Error fetching projects:", e)
    totalProjects.value = 0
    projects.value = []
  }
}

// Optional: format date
const formatDate = (date) => {
  if (!date) return ""
  return new Date(date).toLocaleDateString()
}

onMounted(fetchStats)
</script>

<style scoped>
table th, table td {
  padding: 0.75rem 1rem;
}
</style>
<template>
  <div class="bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Manage Projects</h2>

    <!-- Show message if no projects -->
    <div v-if="projects.length === 0" class="text-gray-500">
      No projects found.
    </div>

    <!-- Project list -->
    <ul v-else>
      <li
        v-for="project in projects"
        :key="project.id"
        class="border-b py-2 flex justify-between items-center"
      >
        <span>{{ project.title }}</span>
        <div class="flex gap-2">
          <button
            @click="editProject(project)"
            class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600"
          >
            Edit
          </button>
          <button
            @click="deleteProject(project.id)"
            class="bg-red-600 text-white px-2 py-1 rounded hover:bg-red-700"
          >
            Delete
          </button>
        </div>
      </li>
    </ul>

    <!-- Pagination -->
    <div class="flex gap-2 mt-4">
      <button
        @click="fetchProjects(currentPage - 1)"
        :disabled="currentPage === 1"
        class="px-3 py-1 border rounded disabled:opacity-50"
      >
        Prev
      </button>

      <span>Page {{ currentPage }} of {{ lastPage }}</span>

      <button
        @click="fetchProjects(currentPage + 1)"
        :disabled="currentPage === lastPage"
        class="px-3 py-1 border rounded disabled:opacity-50"
      >
        Next
      </button>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue"
import api from "../../axios.js"
import { useRouter } from "vue-router"

const router = useRouter()
const projects = ref([])
const currentPage = ref(1)
const lastPage = ref(1)

// Fetch admin projects
const fetchProjects = async (page = 1) => {
  try {
    const res = await api.get(`/projects/admin?page=${page}`)
    projects.value = res.data.data ?? res.data
    currentPage.value = res.data.current_page ?? 1
    lastPage.value = res.data.last_page ?? 1
  } catch (e) {
    console.error("Error fetching admin projects:", e)
    projects.value = []
    currentPage.value = 1
    lastPage.value = 1
  }
}

// Redirect to AddProject for editing
const editProject = (project) => {
  localStorage.setItem("editProject", JSON.stringify(project))
  router.push("/admin/add")
}

// Delete project
const deleteProject = async (id) => {
  if (!confirm("Are you sure?")) return
  try {
    await api.delete(`/projects/${id}`)
    alert("Project deleted")
    fetchProjects(currentPage.value)
  } catch (e) {
    console.error(e)
    alert("Failed to delete project")
  }
}

onMounted(() => fetchProjects())
</script>
<template>
  <div class="bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">
      {{ isEditing ? "Edit Project" : "Add New Project" }}
    </h2>

    <form @submit.prevent="submitProject" class="space-y-4">
      <input
        v-model="project.title"
        placeholder="Title"
        class="w-full border p-3 rounded"
      />
      <textarea
        v-model="project.description"
        placeholder="Description"
        class="w-full border p-3 rounded"
      ></textarea>
      <input
        v-model="project.technology"
        placeholder="Technology (e.g. Vue)"
        class="w-full border p-3 rounded"
      />
      <input
        v-model="project.tags"
        placeholder="Tags (comma separated)"
        class="w-full border p-3 rounded"
      />
      <input
        v-model="project.github_link"
        placeholder="GitHub URL"
        class="w-full border p-3 rounded"
      />
      <input type="file" @change="handleImage" />

      <button
        type="submit"
        class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition"
      >
        {{ isEditing ? "Update Project" : "Add Project" }}
      </button>
    </form>
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue"
import api from "../../axios.js"
import { useRouter } from "vue-router"

const router = useRouter()
const project = ref({
  id: null,
  title: "",
  description: "",
  technology: "",
  tags: "",
  github_link: "",
  image: null
})

const isEditing = ref(false)
let imageFile = null

// Check if redirected from ManageProjects to edit
onMounted(() => {
  const editProject = localStorage.getItem("editProject")
  if (editProject) {
    const data = JSON.parse(editProject)
    project.value = { ...data, tags: Array.isArray(data.tags) ? data.tags.join(",") : data.tags }
    isEditing.value = true
    localStorage.removeItem("editProject")
  }
})

const handleImage = (e) => {
  imageFile = e.target.files[0]
}

const submitProject = async () => {
  try {
    const formData = new FormData()
    formData.append("title", project.value.title)
    formData.append("description", project.value.description)
    formData.append("technology", project.value.technology)
    formData.append("tags", JSON.stringify(project.value.tags.split(",")))
    formData.append("github_link", project.value.github_link)
    if (imageFile) formData.append("image", imageFile)

    if (isEditing.value) {
      await api.post(`/projects/${project.value.id}`, formData, { method: "PUT" })
      alert("Project updated!")
    } else {
      await api.post("/projects", formData)
      alert("Project added!")
    }

    // Reset form
    project.value = { title: "", description: "", technology: "", tags: "", github_link: "", image: null }
    isEditing.value = false
    imageFile = null

    // Redirect to ManageProjects
    router.push("/admin/manage")
  } catch (e) {
    console.error(e)
    alert("Failed to submit project")
  }
}
</script>
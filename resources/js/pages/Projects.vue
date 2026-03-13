<template>
  <div class="min-h-screen bg-slate-50 dark:bg-slate-950 pt-28 pb-24 px-6 lg:px-12 transition-colors">
    <div class="max-w-[1400px] mx-auto">

      <!-- PAGE HEADER -->
      <div class="text-center mb-20">
        <h1 class="text-6xl md:text-7xl font-black tracking-tighter text-gray-900 dark:text-white mb-4">
          My Projects
        </h1>
        <p class="text-xl text-gray-500 dark:text-gray-400 max-w-2xl mx-auto">
          Real-world applications I've designed and built using modern technologies.
        </p>
      </div>

      <!-- Loading -->
      <div v-if="loading" class="text-center py-40">
        <p class="text-2xl text-gray-400 font-black uppercase tracking-widest italic">
          Loading Projects...
        </p>
      </div>

      <!-- Error -->
      <div v-else-if="error" class="text-center py-40 text-red-500 font-bold text-lg">
        {{ error }}
      </div>

      <!-- Projects Grid -->
      <div v-else-if="projects.length" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 lg:gap-14">
        <div
          v-for="project in projects"
          :key="project.id"
          class="group bg-white dark:bg-gray-900 rounded-[3.5rem] shadow-sm hover:shadow-2xl transition-all duration-500 flex flex-col overflow-hidden"
        >
          <!-- Image -->
          <div class="p-6 pb-0">
            <div class="aspect-[16/10] w-full bg-gray-300 dark:bg-gray-800 rounded-[2.5rem] overflow-hidden">
              <img
                v-if="project.image"
                :src="project.image"
                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                alt="Project"
              />
            </div>
          </div>

          <!-- Content -->
          <div class="p-10 pt-8 lg:p-14 flex flex-col flex-grow">
            <h3 class="text-4xl md:text-5xl font-[900] text-gray-900 dark:text-white mb-4 tracking-tighter leading-[1.1]">
              {{ project.title }}
            </h3>

            <p class="text-gray-500 dark:text-gray-400 text-lg md:text-xl leading-relaxed font-medium mb-6">
              {{ project.description }}
            </p>

            <p v-if="project.technology" class="text-sm text-gray-400 mb-6">
              ⚙️ {{ project.technology }}
            </p>

            <!-- Tags -->
            <div v-if="project.tags && project.tags.length" class="flex flex-wrap gap-2 mb-8">
              <span
                v-for="tag in project.tags"
                :key="tag"
                class="px-3 py-1 text-sm bg-gray-200 dark:bg-gray-800 text-gray-700 dark:text-gray-300 rounded-full"
              >
                {{ tag }}
              </span>
            </div>

            <!-- Links -->
            <div class="mt-auto flex gap-4 flex-wrap">
              <a
                v-if="project.github_link"
                :href="project.github_link"
                target="_blank"
                class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-black text-white dark:bg-white dark:text-black font-semibold hover:scale-105 hover:shadow-lg transition"
              >
                View on GitHub
              </a>

              <a
                v-if="project.live_link"
                :href="project.live_link"
                target="_blank"
                class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-blue-600 text-white font-semibold hover:scale-105 hover:shadow-lg transition"
              >
                Live Demo
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- Empty -->
      <div
        v-else
        class="text-center py-40 text-gray-400 font-black uppercase tracking-widest italic"
      >
        No Projects Found
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue"
import axios from "axios"

const projects = ref([])
const loading = ref(true)
const error = ref(null)

const getProjects = async () => {
  loading.value = true
  error.value = null

  try {
    const res = await axios.get("/api/project")

    // If paginated
    projects.value = res.data.data ?? res.data
  } catch (err) {
    console.error("API Error:", err)
    error.value = "Failed to fetch projects. Please try again later."
  } finally {
    loading.value = false
  }
}

onMounted(getProjects)
</script>

<style scoped>
h3 {
  font-family: "Inter", sans-serif;
}
</style>
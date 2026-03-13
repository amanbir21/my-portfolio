import { ref } from "vue"
import api from "../axios.js"

export const projects = ref([])

// Fetch all projects
export const fetchProjects = async () => {
  try {
    const res = await api.get("/projects")
    projects.value = res.data
  } catch (err) {
    console.error("Failed to fetch projects:", err)
  }
}
import axios from "axios"

const api = axios.create({
  baseURL: "/api",
  headers: {
    "Accept": "application/json"
  }
})

// Request interceptor: attach token automatically
api.interceptors.request.use(config => {
  const token = localStorage.getItem("token")
  if (token) {
    config.headers.Authorization = `Bearer ${token}`
  }
  return config
})

// Response interceptor: auto logout on 401
api.interceptors.response.use(
  response => response,
  error => {
    if (error.response && error.response.status === 401) {
      localStorage.removeItem("token")
      window.location = "/admin/login"
    }
    return Promise.reject(error)
  }
)

export default api
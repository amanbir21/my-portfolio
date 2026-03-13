import { createRouter, createWebHistory } from "vue-router"

// Public pages
import Home from "./pages/Home.vue"
import About from "./pages/About.vue"
import Skills from "./pages/Skills.vue"
import Projects from "./pages/Projects.vue" // Frontend SPA page
import Contact from "./pages/Contact.vue"

// Admin pages
import Dashboard from "./pages/admin/Dashboard.vue"
import Login from "./pages/admin/Login.vue"
import Stats from "./pages/admin/Stats.vue"
import AddProject from "./pages/admin/AddProject.vue"
import ProjectList from "./pages/admin/ProjectList.vue"
import ManageProjects from "./pages/admin/ManageProjects.vue"

const routes = [
  { path: "/", name: "Home", component: Home },
  { path: "/about", name: "About", component: About },
  { path: "/skills", name: "Skills", component: Skills },
  { path: "/project", name: "Projects", component: Projects },
  { path: "/contact", name: "Contact", component: Contact },

  { path: "/admin/login", name: "AdminLogin", component: Login },

  {
    path: "/admin",
    name: "Admin",
    component: Dashboard,
    meta: { requiresAuth: true },
    children: [
      { path: "stats", name: "AdminStats", component: Stats },
      { path: "add", name: "AdminAddProject", component: AddProject },
      { path: "list", name: "AdminProjectList", component: ProjectList },
      { path: "manage", name: "AdminManageProjects", component: ManageProjects },
      { path: "", redirect: { name: "AdminStats" } },
    ],
  },

  { path: "/:pathMatch(.*)*", redirect: "/" },
]

const router = createRouter({
  history: createWebHistory(),
  routes,
  scrollBehavior() {
    return { top: 0 }
  },
})

// Admin route guard
router.beforeEach((to) => {
  const token = localStorage.getItem("token")
  if (to.meta.requiresAuth && !token) return { name: "AdminLogin" }
  if (to.name === "AdminLogin" && token) return { name: "AdminStats" }
  return true
})

// **Sync login/logout across tabs**
window.addEventListener("storage", (e) => {
  if (e.key === "token") {
    if (e.newValue) {
      // Token added in another tab → redirect to dashboard
      if (router.currentRoute.value.name === "AdminLogin") {
        router.push({ name: "AdminStats" })
      }
    } else {
      // Token removed in another tab → redirect to login
      if (router.currentRoute.value.meta.requiresAuth) {
        router.push({ name: "AdminLogin" })
      }
    }
  }
})

export default router
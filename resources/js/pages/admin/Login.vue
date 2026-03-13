<template>
  <div class="flex items-center justify-center h-screen bg-gray-100">
    <div class="bg-white p-8 rounded shadow w-96">
      <h2 class="text-2xl font-bold mb-6">Admin Login</h2>

      <!-- Email -->
      <input
        v-model="email"
        type="email"
        placeholder="Email"
        class="border p-3 w-full mb-4 rounded"
      />

      <!-- Password -->
      <input
        v-model="password"
        type="password"
        placeholder="Password"
        class="border p-3 w-full mb-6 rounded"
      />

      <!-- Login Button -->
      <button
        @click="login"
        class="bg-blue-600 text-white w-full py-2 rounded hover:bg-blue-700 transition"
      >
        Login
      </button>

      <!-- Error Message -->
      <p v-if="error" class="text-red-500 mt-4 text-center">{{ error }}</p>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue"
import { useRouter } from "vue-router"
import axios from "axios"

const router = useRouter()
const email = ref("")
const password = ref("")
const error = ref("")

const login = async () => {
  if (!email.value || !password.value) {
    error.value = "Please enter email and password"
    return
  }

  try {
    // POST request to your backend login route
    const res = await axios.post("/api/admin/login", {
      email: email.value,
      password: password.value,
    })

    // 1️⃣ Save token in localStorage
    localStorage.setItem("token", res.data.token)

    // 2️⃣ Set Authorization header immediately
    axios.defaults.headers.common['Authorization'] = `Bearer ${res.data.token}`

    // 3️⃣ Redirect to admin default page (named route)
    router.push({ name: "AdminStats" })

  } catch (err) {
    console.error(err)
    error.value = "Login failed: Invalid email or password"
  }
}
</script>

<style scoped>
input {
  outline: none;
}
</style>
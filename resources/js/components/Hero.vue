<template>
  <div class="relative w-full h-screen overflow-hidden bg-gray-900 perspective-1000">
    <!-- 1. PARTICLES BACKGROUND -->
    <canvas ref="particlesCanvas" class="absolute inset-0 z-0"></canvas>

    <!-- 2. SLIDER LAYER -->
    <div class="absolute inset-0 z-10">
      <transition name="fade" mode="out-in">
        <div v-if="projects.length > 0" :key="currentSlide" class="absolute inset-0">
          <img
            :src="projects[currentSlide].image"
            class="w-full h-full object-cover brightness-[0.35]"
            @error="handleImageError"
          />
        </div>
      </transition>
    </div>

    <!-- 3. CONTENT LAYER -->
    <div
      class="relative z-30 flex flex-col items-center justify-center text-center px-6 h-full"
      :style="{ transform:`rotateY(${mouseX*5}deg) rotateX(${-mouseY*5}deg)` }"
    >
      <div class="pointer-events-auto">
        <span class="hero-badge">Open to Work</span>
        <h1 class="hero-title text-5xl md:text-7xl">
          Hi, I'm <span class="hero-name">Amanuel Kassa</span>
        </h1>
        <p class="hero-subtitle text-lg md:text-xl text-gray-300 mt-4 max-w-2xl">
          Laravel Full Stack Developer crafting modern web applications.
        </p>
        
        <button @click="scrollToProjects" class="hero-btn mt-10">
          View Projects
        </button>
      </div>

      <!-- SLIDER DOTS -->
      <div v-if="projects.length > 1" class="absolute bottom-12 flex gap-3 z-40">
        <button
          v-for="(_, idx) in projects" 
          :key="idx"
          @click="goToSlide(idx)"
          :class="['w-3 h-3 rounded-full transition-all duration-300', currentSlide === idx ? 'bg-blue-400 scale-125' : 'bg-white/20']"
        ></button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue'
import api from '@/api/index.js'

const mouseX = ref(0)
const mouseY = ref(0)
const particlesCanvas = ref(null)
const projects = ref([])
const currentSlide = ref(0)
let sliderInterval = null
let animationId = null

// 1. Fetching logic fixed for Laravel Pagination
const fetchProjects = async () => {
  try {
    const res = await api.get('/project')
    
    // IMPORTANT: Access the .data property inside the pagination object
    const projectArray = res.data.data || []
    
    projects.value = projectArray.filter(p => p.image)
    
    console.log("Projects loaded successfully:", projects.value)

    if (projects.value.length > 0) {
      startSlider()
    }
  } catch (e) { 
    console.error("Slider fetch failed. Check if API route is public:", e) 
  }
}

// 2. Slider Controls
const startSlider = () => {
  stopSlider()
  sliderInterval = setInterval(() => {
    currentSlide.value = (currentSlide.value + 1) % projects.value.length
  }, 6000)
}
const stopSlider = () => clearInterval(sliderInterval)
const goToSlide = (idx) => {
  currentSlide.value = idx
  startSlider() // Reset timer
}

// 3. Particle Background Logic
const initParticles = () => {
  const canvas = particlesCanvas.value
  if(!canvas) return
  const ctx = canvas.getContext("2d")
  canvas.width = window.innerWidth
  canvas.height = window.innerHeight
  const particles = []
  for (let i = 0; i < 50; i++) {
    particles.push({
      x: Math.random() * canvas.width,
      y: Math.random() * canvas.height,
      size: Math.random() * 1.5,
      speedX: (Math.random() - 0.5) * 0.4,
      speedY: (Math.random() - 0.5) * 0.4
    })
  }
  const animate = () => {
    ctx.clearRect(0, 0, canvas.width, canvas.height)
    particles.forEach(p => {
      p.x += p.speedX; p.y += p.speedY
      if(p.x < 0 || p.x > canvas.width) p.speedX *= -1
      if(p.y < 0 || p.y > canvas.height) p.speedY *= -1
      ctx.beginPath(); ctx.arc(p.x, p.y, p.size, 0, Math.PI * 2)
      ctx.fillStyle = "rgba(255,255,255,0.2)"; ctx.fill()
    })
    animationId = requestAnimationFrame(animate)
  }
  animate()
}

const handleImageError = (e) => {
  console.error("Image 404 at:", e.target.src)
}

const scrollToProjects = () => {
  document.getElementById('projects')?.scrollIntoView({ behavior: 'smooth' })
}

onMounted(() => {
  window.addEventListener('mousemove', (e) => {
    mouseX.value = (e.clientX - window.innerWidth/2) / (window.innerWidth/2)
    mouseY.value = (e.clientY - window.innerHeight/2) / (window.innerHeight/2)
  })
  initParticles()
  fetchProjects()
})

onBeforeUnmount(() => {
  stopSlider()
  cancelAnimationFrame(animationId)
})
</script>

<style scoped>
.fade-enter-active, .fade-leave-active { transition: opacity 1.5s ease-in-out; }
.fade-enter-from, .fade-leave-to { opacity: 0; }

.hero-title { font-weight: 900; color: white; text-shadow: 0 10px 40px rgba(0,0,0,0.8); line-height: 1.1; }
.hero-name { 
  background: linear-gradient(90deg,#60a5fa,#a78bfa,#22d3ee); 
  -webkit-background-clip: text; 
  -webkit-text-fill-color: transparent; 
  animation: flow 5s linear infinite; 
  background-size: 200% auto; 
}
@keyframes flow { to { background-position: 200% center; } }

.hero-badge { 
  display: inline-block;
  margin-bottom:20px; 
  padding:6px 18px; 
  font-size:12px; 
  color:#60a5fa; 
  border:1px solid rgba(96,165,250,0.3); 
  border-radius:99px; 
  text-transform: uppercase;
  letter-spacing: 1px;
}

.hero-btn { 
  padding:16px 44px; 
  border-radius:14px; 
  font-weight:800; 
  background: linear-gradient(to right, #2563eb, #7c3aed); 
  color:white; 
  cursor: pointer; 
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.hero-btn:hover {
  transform: translateY(-5px);
  box-shadow: 0 15px 30px rgba(37,99,235,0.4);
}
</style>

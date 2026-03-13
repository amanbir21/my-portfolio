<template>
  <div class="relative overflow-hidden bg-gray-50 dark:bg-slate-950 min-h-screen pt-32 px-6">
    <!-- Category Nav -->
    <div class="max-w-6xl mx-auto mb-10 flex flex-wrap gap-4 justify-center">
      <button 
        v-for="category in categories" 
        :key="category.id"
        @click="scrollToCategory(category.id)"
        class="px-5 py-2 rounded-2xl font-semibold transition-colors hover:bg-blue-500 hover:text-white dark:hover:bg-blue-600"
      >
        {{ category.name }}
      </button>
    </div>

    <!-- Skills Grid by Category -->
    <div v-for="category in categories" :key="category.id" :id="category.id" class="mb-16">
      <h2 class="text-3xl font-black text-gray-800 dark:text-white mb-6">{{ category.name }}</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <Motion 
          v-for="(skill, index) in category.skills" 
          :key="skill.title"
          :initial="{ opacity: 0, y: 20, scale: 0.95 }"
          :animate="{ opacity: 1, y: 0, scale: 1 }"
          :transition="{ duration: 0.5, delay: index * 0.1, easing: [0.17, 0.67, 0.83, 0.67] }"
        >
          <div class="group relative bg-white/80 dark:bg-slate-900/50 backdrop-blur-xl p-8 rounded-[2rem] shadow-xl border border-white/20 dark:border-slate-800 hover:-translate-y-2 transition-transform duration-500 h-full flex flex-col">
            <div 
              :style="{ backgroundColor: skill.bgColor }"
              class="w-14 h-14 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-12 transition-transform"
            >
              <span class="text-2xl font-black" :style="{ color: skill.textColor }">{{ skill.initial }}</span>
            </div>
            <h3 class="text-2xl font-black text-gray-800 dark:text-white mb-2 tracking-tight">{{ skill.title }}</h3>
            <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed font-medium">{{ skill.desc }}</p>
            <div 
              :style="{ backgroundColor: skill.textColor }"
              class="mt-auto pt-4 h-1.5 w-0 group-hover:w-full transition-all duration-500 rounded-full"
            ></div>
          </div>
        </Motion>
      </div>
    </div>
  </div>
</template>

<script setup>
import { Motion } from "@motionone/vue"

const categories = [
  {
    id: 'frontend',
    name: 'Front-End',
    skills: [
      { title: 'HTML5', initial: 'H', bgColor: '#fff7ed', textColor: '#f97316', desc: 'Semantic HTML, accessibility, and SEO-friendly markup.' },
      { title: 'CSS3', initial: 'C', bgColor: '#eff6ff', textColor: '#2563eb', desc: 'Responsive design, Flexbox, Grid, animations, and Tailwind integration.' },
      { title: 'JavaScript', initial: 'J', bgColor: '#fefce8', textColor: '#eab308', desc: 'Vanilla JS, ES6+, DOM manipulation, and modern patterns.' },
      { title: 'Vue.js 3', initial: 'V', bgColor: '#ecfdf5', textColor: '#059669', desc: 'Reactive UIs, Composition API, Vue Router, and Vite.' },
      { title: 'TailwindCSS', initial: 'T', bgColor: '#f0f9ff', textColor: '#0ea5e9', desc: 'Utility-first design for fast, responsive interfaces.' },
    ]
  },
  {
    id: 'backend',
    name: 'Back-End',
    skills: [
      { title: 'PHP', initial: 'P', bgColor: '#fef2f2', textColor: '#dc2626', desc: 'Server-side programming, OOP, and Laravel integration.' },
      { title: 'Laravel', initial: 'L', bgColor: '#fef2f2', textColor: '#dc2626', desc: 'MVC architecture, Eloquent ORM, REST APIs, and security.' },
      { title: 'Node.js', initial: 'N', bgColor: '#ecfdf5', textColor: '#16a34a', desc: 'Server-side JS, Express, and real-time applications.' },
    ]
  },
  {
    id: 'database',
    name: 'Database',
    skills: [
      { title: 'MySQL', initial: 'M', bgColor: '#eff6ff', textColor: '#2563eb', desc: 'Relational databases, query optimization, and schema design.' },
      { title: 'MongoDB', initial: 'Mo', bgColor: '#ecfdf5', textColor: '#059669', desc: 'NoSQL database design, aggregation, and performance tuning.' },
    ]
  },
  {
    id: 'versioncontrol',
    name: 'Version Control',
    skills: [
      { title: 'Git', initial: 'G', bgColor: '#fff7ed', textColor: '#f97316', desc: 'Version control, branching, and collaboration workflows.' },
    ]
  },
  {
    id: 'devops',
    name: 'API & DevOps',
    skills: [
      { title: 'REST API', initial: 'R', bgColor: '#f0f9ff', textColor: '#0ea5e9', desc: 'Building and consuming RESTful endpoints with authentication.' },
      { title: 'Docker', initial: 'D', bgColor: '#fefce8', textColor: '#eab308', desc: 'Containerization, environment consistency, and deployment.' },
      { title: 'AWS', initial: 'A', bgColor: '#fef2f2', textColor: '#dc2626', desc: 'Cloud deployment, EC2, S3, and server management.' },
    ]
  }
]

// Smooth scroll to category
const scrollToCategory = (id) => {
  const el = document.getElementById(id)
  if(el) el.scrollIntoView({ behavior: 'smooth', block: 'start' })
}
</script>
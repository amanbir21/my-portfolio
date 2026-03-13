<template>
  <div class="relative w-full bg-slate-950 py-10 overflow-hidden border-y border-slate-800">
    <!-- Left & Right Gradients -->
    <div class="absolute left-0 top-0 h-full w-32 bg-gradient-to-r from-slate-950 to-transparent z-10 pointer-events-none"></div>
    <div class="absolute right-0 top-0 h-full w-32 bg-gradient-to-l from-slate-950 to-transparent z-10 pointer-events-none"></div>

    <!-- Scrolling Skills -->
    <div class="flex animate-scroll whitespace-nowrap hover:pause-animation">
      <div class="flex items-center">
        <div v-for="skill in skills" :key="skill.name" class="flex items-center gap-4 mx-14 min-w-[180px]">
          <component :is="skill.icon" :class="skill.color" class="w-9 h-9" stroke-width="2.5"/>
          <span class="text-2xl font-bold text-slate-300 tracking-tight">{{ skill.name }}</span>
        </div>
      </div>
      <div class="flex items-center">
        <div v-for="skill in skills" :key="skill.name+'-loop'" class="flex items-center gap-4 mx-14 min-w-[180px]">
          <component :is="skill.icon" :class="skill.color" class="w-9 h-9" stroke-width="2.5"/>
          <span class="text-2xl font-bold text-slate-300 tracking-tight">{{ skill.name }}</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { Code2, Layers, Database, Wind, Zap, Cpu } from 'lucide-vue-next'

const skills = [
  { name: "Laravel", icon: Code2, color: "text-red-500" },
  { name: "Vue.js", icon: Wind, color: "text-green-400" },
  { name: "JavaScript", icon: Zap, color: "text-yellow-400" },
  { name: "MySQL", icon: Database, color: "text-blue-400" },
  { name: "TailwindCSS", icon: Layers, color: "text-cyan-400" },
  { name: "API Development", icon: Cpu, color: "text-purple-400" }
]
</script>

<style scoped>
@keyframes scroll {
  0% { transform: translateX(0); }
  100% { transform: translateX(-50%); }
}

.animate-scroll {
  display: flex;
  animation: scroll 20s linear infinite;
}

.hover\:pause-animation:hover {
  animation-play-state: paused;
}
</style>
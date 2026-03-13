<template>
  <div class="min-h-screen bg-white dark:bg-slate-950">
    <!-- MAIN CONTENT -->
    <main class="pt-24">

      <!-- HERO SECTION -->
      <Hero />

      <!-- STATS SECTION -->
      <section class="relative z-10 w-full max-w-7xl mx-auto px-6 mt-16 md:mt-24">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
          <div
            v-for="stat in impactStats"
            :key="stat.label"
            class="p-12 bg-white dark:bg-gray-900 rounded-[2.5rem] shadow-2xl text-center border border-gray-100 dark:border-gray-800 transform hover:-translate-y-2 hover:shadow-2xl transition-all duration-300"
          >
            <div class="flex justify-center mb-4">
              <component :is="stat.icon" :class="[stat.color, 'w-12 h-12']" stroke-width="2.5"/>
            </div>
            <div :class="['text-6xl font-black mb-2', stat.color]">{{ stat.value }}</div>
            <div class="text-gray-400 font-bold uppercase text-xs tracking-widest">{{ stat.label }}</div>
          </div>
        </div>
      </section>

      <!-- TECH STACK SECTION -->
      <section class="mt-24">
        <TechTicker />
      </section>

    </main>
  </div>
</template>

<script setup>
import Hero from '../components/Hero.vue'
import TechTicker from '../components/TechTicker.vue'
import { Code2, Layers, Database } from 'lucide-vue-next'

// Stats with icons and colors
const impactStats = [
  { value: '3+', label: 'Years Experience', icon: Code2, color: 'text-[#2563eb]' },
  { value: '20+', label: 'Projects Completed', icon: Database, color: 'text-[#10b981]' },
  { value: '100%', label: 'Job Success', icon: Layers, color: 'text-[#f59e0b]' }
]
</script>
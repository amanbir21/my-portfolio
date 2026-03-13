<template>
  <div class="min-h-screen bg-slate-50 selection:bg-blue-100 selection:text-blue-900">
    <!-- Decorative background elements -->
    <div class="absolute top-0 left-0 w-full h-96 bg-gradient-to-b from-blue-50 to-transparent -z-10"></div>
    <div class="absolute top-20 right-10 w-64 h-64 bg-blue-200 rounded-full blur-3xl opacity-20 -z-10 animate-pulse"></div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8">
      
      <!-- HERO SECTION -->
      <section class="flex flex-col items-center justify-center text-center pt-32 pb-24">
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white border border-gray-100 shadow-sm mb-8 animate-bounce-subtle">
          <span class="relative flex h-3 w-3">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
          </span>
          <span class="text-sm font-bold text-gray-600 uppercase tracking-widest">
            Available for hire
          </span>
        </div>

        <h1 class="text-7xl md:text-8xl font-black text-gray-900 mb-8 tracking-tighter leading-[0.9]">
          Hi, I'm
          <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">
            Amanuel Kassa
          </span>
        </h1>
        
        <p class="text-2xl md:text-3xl text-gray-500 font-medium mb-12 max-w-3xl leading-relaxed">
          Full Stack Architect crafting robust
          <span class="text-gray-900 font-bold underline decoration-blue-400 decoration-4 underline-offset-4">
            Registrar Systems
          </span>
          and high-performance
          <span class="text-gray-900 font-bold underline decoration-indigo-400 decoration-4 underline-offset-4">
            Attendance Engines
          </span>.
        </p>

        <div class="flex flex-wrap justify-center gap-6">
          <router-link
            to="/projects"
            class="group relative bg-gray-900 text-white px-10 py-5 rounded-2xl font-black text-lg transition-all hover:scale-105 active:scale-95 shadow-2xl"
          >
            <span class="relative z-10">Explore My Work</span>
            <div class="absolute inset-0 bg-blue-600 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
          </router-link>
          
          <router-link
            to="/contact"
            class="bg-white text-gray-800 border-2 border-gray-100 px-10 py-5 rounded-2xl font-black text-lg hover:bg-gray-50 hover:border-blue-200 transition-all shadow-sm"
          >
            Let's Talk
          </router-link>
        </div>
      </section>

      <!-- CONTENT GRID -->
      <section class="grid grid-cols-1 lg:grid-cols-12 gap-12 pb-32">
        
        <!-- ABOUT -->
        <div class="lg:col-span-7 bg-white p-12 rounded-[3rem] border border-gray-100 shadow-xl shadow-gray-200/50 space-y-8">
          <div class="inline-block px-4 py-1.5 bg-blue-50 text-blue-600 rounded-xl text-sm font-bold uppercase tracking-wider">
            Background
          </div>

          <h2 class="text-5xl font-black text-gray-900 leading-tight">
            Engineering software <br/>
            that <span class="italic text-blue-600">scales</span>.
          </h2>

          <p class="text-xl text-gray-600 leading-relaxed">
            With a focus on the **TALL stack** (Tailwind, Alpine, Laravel, Livewire),
            I build enterprise-grade applications. My recent work on Registrar systems
            involved handling thousands of concurrent student records with zero latency.
          </p>
          
          <div class="grid grid-cols-2 gap-6 pt-6">
            <div class="p-6 bg-slate-50 rounded-2xl border border-gray-100">
              <div class="text-3xl font-black text-blue-600">20+</div>
              <div class="text-sm font-bold text-gray-500 uppercase">
                Deployments
              </div>
            </div>

            <div class="p-6 bg-slate-50 rounded-2xl border border-gray-100">
              <div class="text-3xl font-black text-indigo-600">100%</div>
              <div class="text-sm font-bold text-gray-500 uppercase">
                Uptime Goal
              </div>
            </div>
          </div>
        </div>

        <!-- TECH STACK -->
        <div class="lg:col-span-5 bg-gradient-to-br from-gray-900 to-slate-800 p-12 rounded-[3rem] text-white shadow-2xl space-y-10">
          
          <h3 class="text-2xl font-bold border-b border-white/10 pb-4">
            Technical Stack
          </h3>

          <!-- Scrollable skills -->
          <div class="max-h-[420px] overflow-y-auto pr-2 space-y-6 custom-scroll">

            <div v-for="skill in skills" :key="skill.name" class="group">
              <div class="flex justify-between mb-3">
                <span class="font-bold text-gray-300 group-hover:text-white transition-colors">
                  {{ skill.name }}
                </span>
                <span class="text-blue-400 font-black">
                  {{ skill.level }}%
                </span>
              </div>

              <div class="w-full bg-white/10 rounded-full h-2 overflow-hidden">
                <div
                  class="bg-blue-500 h-full rounded-full transition-all duration-1000 ease-out"
                  :style="{ width: skill.level + '%' }"
                ></div>
              </div>
            </div>

          </div>

          <div class="pt-6">
            <div class="flex items-center gap-4 p-4 bg-white/5 rounded-2xl border border-white/10">
              <div class="w-12 h-12 rounded-xl bg-blue-600 flex items-center justify-center font-bold">
                AK
              </div>
              <p class="text-sm text-gray-400 italic">
                "Clean code is not a preference, it's a standard."
              </p>
            </div>
          </div>

        </div>

      </section>
    </div>
  </div>
</template>

<script setup>
const skills = [
  { name: 'HTML5', level: 96 },
  { name: 'CSS3', level: 94 },
  { name: 'JavaScript (ES6+)', level: 92 },
  { name: 'Laravel Framework', level: 95 },
  { name: 'Vue.js Framework', level: 90 },
  { name: 'Tailwind CSS', level: 96 },
  { name: 'REST API Development', level: 90 },
  { name: 'MySQL Database Design', level: 88 },
  { name: 'Laravel Sanctum Authentication', level: 85 },
  { name: 'Axios API Integration', level: 90 },
  { name: 'Git & GitHub', level: 87 },
  { name: 'Vite Build Tool', level: 84 },
  { name: 'Core PHP', level: 91 }
];
</script>

<style scoped>
@keyframes bounce-subtle {
  0%,100% { transform: translateY(0); }
  50% { transform: translateY(-5px); }
}

.animate-bounce-subtle {
  animation: bounce-subtle 3s ease-in-out infinite;
}

/* Scrollbar styling */
.custom-scroll::-webkit-scrollbar {
  width: 6px;
}

.custom-scroll::-webkit-scrollbar-thumb {
  background: #3b82f6;
  border-radius: 10px;
}
</style>
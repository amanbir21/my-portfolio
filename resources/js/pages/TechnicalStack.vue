<script setup>
// Define the prop coming from the Laravel Controller
const props = defineProps({
    stats: Array
});
</script>

<template>
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
    <!-- Loop through the dynamic 'stats' instead of a hardcoded array -->
    <Motion 
      v-for="(item, index) in stats" 
      :key="item.title"
      :initial="{ opacity: 0, y: 20 }"
      :while-in-view="{ opacity: 1, y: 0 }"
      :transition="{ delay: index * 0.1 }"
    >
      <div class="group relative bg-white/80 dark:bg-slate-900/50 backdrop-blur-xl p-8 rounded-[2rem] shadow-xl border border-white/20 dark:border-slate-800">
        <div :class="`bg-${item.color}-50 text-${item.color}-600`" class="w-14 h-14 rounded-2xl flex items-center justify-center mb-6">
            <span class="text-2xl font-bold">{{ item.initial }}</span>
        </div>
        <h3 class="text-2xl font-bold text-gray-800 dark:text-white">{{ item.title }}</h3>
        
        <!-- Display the dynamic value from the DB -->
        <p class="text-4xl font-black text-blue-600 dark:text-blue-400 my-2">{{ item.value }}</p>
        
        <p class="text-gray-500 dark:text-gray-400 text-sm">{{ item.desc }}</p>
      </div>
    </Motion>
  </div>
</template>

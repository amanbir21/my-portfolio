<template>
  <div class="min-h-screen bg-slate-50 py-20 px-6">
    <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">
      
      <!-- LEFT SIDE: YOUR ACTUAL CONTACT CARDS -->
      <div class="space-y-6">
        <h1 class="text-7xl font-black text-gray-900 mb-8 tracking-tighter leading-none">
          Get in <span class="text-blue-600">touch.</span>
        </h1>
        
        <!-- Email Card (Optimized) -->
        <a href="https://mail.google.com/mail/?view=cm&to=amanuelcompa55@gmail.com&su=Hello&body=Hi%20Amanuel!" 
   target="_blank" 
   class="flex items-center gap-6 ...">
          <div class="bg-blue-600 p-4 rounded-2xl text-white group-hover:rotate-12 transition-transform shadow-lg shadow-blue-100">
            <svg xmlns="http://www.w3.org" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
          </div>
          <div class="overflow-hidden">
            <h4 class="text-xs font-black text-gray-400 uppercase tracking-widest">Email Address</h4>
            <p class="text-lg md:text-xl font-bold text-gray-800 truncate">amanuelcompa55@gmail.com</p>
          </div>
        </a>

        <!-- LinkedIn Card (Actual Link) -->
        <a href="https://www.linkedin.com/in/amanuel-kassa-aaa803223/" target="_blank" class="flex items-center gap-6 p-6 bg-white rounded-[2rem] border border-gray-100 shadow-xl hover:-translate-y-1 transition-all group">
          <div class="bg-[#0077b5] p-4 rounded-2xl text-white group-hover:rotate-12 transition-transform shadow-lg shadow-blue-100">
            <svg xmlns="http://www.w3.org" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
              <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
            </svg>
          </div>
          <div>
            <h4 class="text-xs font-black text-gray-400 uppercase tracking-widest">LinkedIn Profile</h4>
            <p class="text-xl font-bold text-gray-800">Amanuel Kassa</p>
          </div>
        </a>

        <!-- Phone Card (Actual Number) -->
        <a href="tel:+251921849933" class="flex items-center gap-6 p-6 bg-white rounded-[2rem] border border-gray-100 shadow-xl hover:-translate-y-1 transition-all group">
          <div class="bg-green-600 p-4 rounded-2xl text-white group-hover:rotate-12 transition-transform shadow-lg shadow-green-100">
            <svg xmlns="http://www.w3.org" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
            </svg>
          </div>
          <div>
            <h4 class="text-xs font-black text-gray-400 uppercase tracking-widest">Phone / Telegram</h4>
            <p class="text-xl font-bold text-gray-800">+251 921 849 933</p>
          </div>
        </a>
         <a href="https://www.facebook.com/amanuel.kassa.86"  target="_blank" class="flex items-center gap-6 p-6 bg-white rounded-2xl border border-gray-100 shadow-xl hover:-translate-y-1 hover:shadow-2xl transition-all group">
            <div class="bg-blue-800 p-4 rounded-2xl text-white group-hover:rotate-12 transition-transform shadow-lg shadow-blue-200">
           <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
            <path d="M22.676 0H1.324C.593 0 0 .593 0 1.324v21.352C0 23.407.593 24 1.324 24H12.82v-9.294H9.692v-3.622h3.128V8.413c0-3.1 1.894-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.796.715-1.796 1.763v2.31h3.587l-.467 3.622h-3.12V24h6.116c.73 0 1.324-.593 1.324-1.324V1.324C24 .593 23.407 0 22.676 0z"/>
          </svg>
    </div>
    <div>
      <h4 class="text-xs font-black text-gray-400 uppercase tracking-widest">Facebook</h4>
      <p class="text-xl font-bold text-gray-800">Amanuel Kassa</p>
    </div>
  </a>
      </div>

      <!-- RIGHT SIDE: SMART CONTACT FORM -->
      <div class="bg-white p-10 md:p-12 rounded-[3.5rem] shadow-2xl shadow-blue-100/50 border border-gray-100">
        <form @submit.prevent="handleSubmit" class="space-y-8">
          <div class="space-y-2">
            <label class="text-xs font-black text-gray-400 uppercase tracking-[0.2em] ml-1">Your Full Name</label>
            <input v-model="form.name" required type="text" 
                   class="w-full p-5 bg-slate-50 border-2 border-transparent rounded-2xl focus:border-blue-500 focus:bg-white transition-all outline-none" 
                   placeholder="Amanuel Kassa">
          </div>

          <div class="space-y-2">
            <label class="text-xs font-black text-gray-400 uppercase tracking-[0.2em] ml-1">Message</label>
            <textarea v-model="form.message" required rows="5" 
                      class="w-full p-5 bg-slate-50 border-2 border-transparent rounded-2xl focus:border-blue-500 focus:bg-white transition-all outline-none resize-none" 
                      placeholder="Tell me about your Registrar or Attendance system project..."></textarea>
          </div>

          <button :disabled="loading" type="submit" 
                  class="w-full bg-blue-600 text-white font-black py-6 rounded-2xl text-xl hover:bg-blue-700 disabled:bg-gray-300 transition-all flex items-center justify-center gap-4 shadow-xl shadow-blue-200">
            <span v-if="loading" class="w-6 h-6 border-4 border-white/30 border-t-white rounded-full animate-spin"></span>
            <span>{{ loading ? 'Sending...' : 'Send Message' }}</span>
          </button>
          
          <p v-if="submitted" class="text-center text-green-600 font-bold animate-pulse mt-4">
            ✅ Thanks! I'll get back to you soon.
          </p>
        </form>
      </div>

    </div>
  </div>
</template>

<script setup>
import { reactive, ref } from 'vue'
import axios from 'axios' // Make sure axios is installed

const loading = ref(false)
const submitted = ref(false)

const form = reactive({
  name: '',
  message: ''
})

const handleSubmit = async () => {
  loading.value = true
  try {
    // POST form data to Laravel endpoint
     await axios.post('api/contact', form, {
      headers: {
        'Accept': 'application/json'
      }
      })
    // Show success message
    submitted.value = true

    // Clear form fields
    form.name = ''
    form.message = ''
  } catch (err) {
     console.error("ERROR:", err.response ? err.response.data : err)
  alert("Error: " + (err.response ? err.response.data.message : err.message))
  } finally {
    loading.value = false
  }
}
</script>
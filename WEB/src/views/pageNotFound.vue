<template>
  <div class="w-full min-h-screen h-fit bg-zinc-900 flex flex-col justify-center items-center">
  
      <FrownIcon class="text-violet-500 h-40 w-40 animate-pulse" />
      <h1 class="text-white text-5xl font-extrabold uppercase">404</h1>
      <span class="text-zinc-400 font-semibold">Link não encontrado, que tal criar um novo?</span>

      <router-link to="/" class="text-violet-500 hover:text-violet-400 uppercase mt-6 hover:font-black font-semibold duration-150">
        novo link
      </router-link>
    
  </div>
</template>
  
<script>
import { Frown } from 'lucide-vue-next';

export default {
  name: 'PageNotFound',
  components: {
    FrownIcon: Frown
  }
};
</script>
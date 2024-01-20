<template>
  <div class="w-full min-h-screen h-fit bg-zinc-900 flex flex-col justify-center items-center">
    <div class="flex flex-col gap-8">
      <div>
        <h1 class="text-white text-5xl font-bold">Encurtador de links</h1>
        <span class="text-zinc-500 mt-2"
          >Reduza o tamanho dos seus links para conferir-lhes uma aparência mais elegante!</span
        >
      </div>
      <div class="flex gap-2">
        <input
          v-model="linkInput" 
          @keyup.enter="encurtarLink"
          type="text"
          placeholder="Insira seu link"
          class="p-2 w-full bg-transparent rounded-md border border-zinc-800 outline-none text-white focus:outline-violet-600"
        />
        <button @click="encurtarLink" class="bg-violet-800 p-2 rounded-lg hover:bg-violet-600 duration-100">
          <Link class="text-white" />
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";
import { Link } from "lucide-vue-next";

const linkInput = ref("");

const encurtarLink = () => {
  console.log(linkInput.value);
};
</script>

<template>
  <div class="w-full min-h-screen h-fit bg-zinc-900 flex flex-col justify-center items-center">
    <div class="flex flex-col gap-8">
      <div>
        <h1 class="text-white text-5xl font-bold">Encurtador de links</h1>
        <span class="text-zinc-500 mt-2">Reduza o tamanho dos seus links para conferir-lhes uma aparência mais
          elegante!</span>
      </div>
      <div class="flex gap-2 w-full">
        <div class="w-full">
          <input type="text" placeholder="Insira seu link" v-model="linkInput"
            :class="{ 'border-red-500': temporarilyInvalid }"
            class="p-2 w-full bg-transparent rounded-md border border-zinc-800 outline-none text-white focus:border-violet-600"
            @keyup.enter="encurtarLink" />

          <div v-if="isInvalidLink" class="text-red-500 mt-2">
            <span>Link inválido. Por favor, insira um link válido.</span>
          </div>

        </div>

        <div>

          <button @click="encurtarLink" :disabled="isLoading"
            class="bg-violet-800 p-2 rounded-lg hover:bg-violet-600 duration-100">
            <Link class="text-white" />
          </button>
        </div>
      </div>

      <div v-if="showResult" class="w-full h-fit p-6 border border-zinc-800 rounded-lg flex flex-col gap-4">
        <div class="flex flex-col">
          <span class="text-zinc-500">Seu link original:</span>
          <input readonly type="text" :value="linkOriginal"
            class="p-2 w-full bg-transparent rounded-md border border-zinc-800 outline-none text-white focus:outline-violet-600" />
        </div>
        <div class="flex flex-col">
          <span class="text-zinc-500">Seu link encurtado:</span>
          <input readonly type="text" :value="apiResponse"
            class="p-2 w-full bg-transparent rounded-md border border-zinc-800 outline-none text-white focus:outline-violet-600" />
        </div>
      </div>

    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";
import { Link } from "lucide-vue-next";
import axios from "axios";
import validator from 'validator';

const linkInput = ref("");
const linkOriginal = ref("");
const isLoading = ref(false);
const showResult = ref(false);
const apiResponse = ref(null);
const isInvalidLink = ref(false);
const temporarilyInvalid = ref(false);

const isValidLink = (link) => {
  return validator.isURL(link);
};

const encurtarLink = async () => {
  if (isValidLink(linkInput.value)) {
    isLoading.value = true;

    try {
      const response = await axios.post("http://localhost/api/encurtar-link", {
        link: linkInput.value,
      });
      apiResponse.value = response.data.url_encurtada;
      showResult.value = true;
      linkOriginal.value = linkInput.value;
      linkInput.value = "";
      temporarilyInvalid.value = false;
      isInvalidLink.value = false;

      console.log("Link encurtado com sucesso:", response.data);

    } catch (error) {
      temporarilyInvalid.value = true;
      isInvalidLink.value = true;
      console.error("Erro ao encurtar link:", error.message);

    } finally {
      isLoading.value = false;
    }
  } else {
    temporarilyInvalid.value = true;
    isInvalidLink.value = true;
    setTimeout(() =>{
      temporarilyInvalid.value = false;
    }, 1000)
    console.warn("Link inválido. Por favor, insira um link válido.");

  }
};
</script>
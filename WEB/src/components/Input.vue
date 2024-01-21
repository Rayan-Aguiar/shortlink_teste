<template>
    <input
      v-bind="$attrs"
      :type="type"
      :placeholder="placeholderText"
      v-model="inputValue"
      class="p-2 w-full bg-transparent rounded-md border border-zinc-800 outline-none text-white focus:outline-violet-600"
    />
  </template>
  
  <script>
  export default {
    name: "Input",
    props: {
      type: {
        type: String,
        default: "text",
      },
      placeholderText: {
        type: String,
        default: "",
      },
    },
    data() {
      return {
        inputValue: "",
      };
    },
    watch: {
      inputValue(newValue) {
        this.$emit("update:modelValue", newValue);
        this.$emit("input", newValue);
      },
    },
  };
  </script>
  
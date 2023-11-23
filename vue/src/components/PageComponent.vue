<template> 
    <header class="bg-white shadow">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">
            {{ title }}
          </h1>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <slot name="header"></slot>
        </div>
      </header>
      <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
          <!-- Your content -->
        </div>
      </main>   
</template>

<script setup>
const props = defineProps({
    title:String,
});
</script>

<style scoped>
</style>

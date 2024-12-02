<script setup>

</script>

<template>
    <div class="bg-red-500 text-white p-4 mb-2 sticky top-0">
        <Link :href="route('dashboard')"><h1 class="text-center font-bold">Mohsin Ali - Technical</h1></Link>
    </div>
    <div class="p-4">
        <slot />
    </div>
</template>
  
  
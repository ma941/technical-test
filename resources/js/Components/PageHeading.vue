<script setup>
const props = defineProps({
    title: {
        type: String,
        required: true
    }
});
</script>

<template>
        <h2 class="font-bold text-center">{{ props.title }}</h2>
</template>
  
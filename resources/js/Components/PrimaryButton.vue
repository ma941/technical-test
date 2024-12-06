<script setup>
const props = defineProps({
    text: {
        type: String,
        required: true
    }
});
</script>

<template>
    <div class="w-fit border border-solid rounded-full px-4 bg-red-500 text-white font-bold uppercase cursor-pointer">
        {{ props.text }}
    </div>
</template>
  
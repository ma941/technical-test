<script setup>
import close from './Icons/Close.vue';
import { defineEmits } from 'vue';

const emit = defineEmits(['close']);

const closeModal = () => {
    emit('close');
};
</script>

<template>
    <div class="border border-slate-500 py-4 px-12 rounded-md shadow fixed z-50 bg-white w-1/2 h-fit mx-auto left-1/4">
        <close @click="closeModal()" class="absolute top-0 right-0 w-5 h-5 mt-2 mr-2 cursor-pointer" />
        <div class="mt-4">
            <slot />
        </div>
    </div>
</template>
  
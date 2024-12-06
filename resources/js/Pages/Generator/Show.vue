<script setup>
import { router } from '@inertiajs/vue3';
import trashCan from '../../Components/Icons/TrashCan.vue';

const props = defineProps({
    generator: {
        type: Object,
        required: true
    }
});

const destroy = () => {
    if (confirm('Are you sure you want to delete this generator?')) {
        router.delete(route('generators.destroy', { generator: props.generator.id }));
    }
};
</script>
<template>
    <wrapper>
        <heading :title="props.generator.name" />
        <p class="text-center mb-4 text-red-600">Note: Generator can be edited from their associated turbines show pages.</p>
        <div class="border border-slate-500 pl-12 rounded-md shadow flex justify-between">
            <div class="py-4">
                <p>Name: {{ props.generator.name }}</p>
                <p>Turbine: <span :class="props.generator.turbine ? 'text-black' : 'text-red-600'">{{ props.generator.turbine ? props.generator.turbine.name : 'N/A' }}</span></p>
                <p>Location: <span :class="props.generator.turbine ? 'text-black' : 'text-red-600'">{{ props.generator.turbine ? props.generator.turbine.wind_farm.location : 'N/A' }}</span></p>
                <p>Damage and wear: {{ props.generator.damage_and_wear?.level }}</p>
            </div>
            <div @click="destroy()" class="bg-red-600 px-4 rounded-r-md flex items-center text-white cursor-pointer hover:bg-slate-500">
                <trashCan class="w-5 h-5" />
            </div>
        </div>
    </wrapper>
</template>
  
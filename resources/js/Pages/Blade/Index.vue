<script setup>
import { router } from '@inertiajs/vue3';

const props = defineProps({
    blades: {
        type: Object,
        required: true
    }
});

const navigateToBlade = (id) => {
    router.get(route('blades.show', { blade: id }));
};
</script>

<template>
    <wrapper>
        <heading title="Blades" />
        <p class="text-center mb-4 text-red-600">Note: Blades associated with turbines can be accessed from the individual turbine pages. You can also add new blades from the individual turbine pages.</p>
        <div class="grid grid-cols-3 gap-2 mt-2">
            <div @click="navigateToBlade(blade.id)" v-for="blade in props.blades" class="border border-slate-500 py-4 px-12 rounded-md shadow cursor-pointer hover:bg-slate-500 hover:text-white hover:shadow-none">
                <p>Name: {{ blade.name }}</p>
                <p>Turbine: <span :class="blade.turbine ? 'text-black' : 'text-red-600'">{{ blade.turbine ? blade.turbine.name : 'N/A' }}</span></p>
                <p>Location: <span :class="blade.turbine ? 'text-black' : 'text-red-600'">{{ blade.turbine ? blade.turbine.wind_farm.location : 'N/A' }}</span></p>
                <p>Damage and wear: {{ blade.damage_and_wear?.level }}</p>
            </div>
        </div>
    </wrapper>
</template>
  
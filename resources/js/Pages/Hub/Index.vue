<script setup>
import { router } from '@inertiajs/vue3';

const props = defineProps({
    hubs: {
        type: Object,
        required: true
    }
});

const navigateToHubs = (id) => {
    router.get(route('hubs.show', { hub: id }));
};
</script>

<template>
    <wrapper>
        <heading title="Hubs" />
        <p class="text-center mb-4 text-red-600">Note: Hubs associated with turbines can be accessed from the individual turbine pages. You can also add new hubs from the individual turbine pages.</p>
        <div class="grid grid-cols-3 gap-2 mt-2">
            <div @click="navigateToHubs(hub.id)" v-for="hub in props.hubs" class="border border-slate-500 py-4 px-12 rounded-md shadow cursor-pointer hover:bg-slate-500 hover:text-white hover:shadow-none">
                <p>Name: {{ hub.name }}</p>
                <p>Turbine: <span :class="hub.turbine ? '' : 'text-red-600'">{{ hub.turbine ? hub.turbine.name : 'N/A' }}</span></p>
                <p>Location: <span :class="hub.turbine ? '' : 'text-red-600'">{{ hub.turbine ? hub.turbine.wind_farm.location : 'N/A' }}</span></p>
                <p>Damage and wear: {{ hub.damage_and_wear?.level }}</p>
            </div>
        </div>
    </wrapper>
</template>
  
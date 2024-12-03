<script setup>
import { router } from '@inertiajs/vue3';

const props = defineProps({
    windFarms: {
        type: Object,
        required: true
    }
});

const navigateToWindFarm = (id) => {
    router.get(route('windfarms.show', { windfarm: id }));
};
</script>

<template>
    <wrapper>
        <heading title="Windfarms" />
        <div @click="navigateToWindFarm(windFarm.id)" v-for="windFarm in props.windFarms" class="grid grid-cols-3 gap-2 my-2 border border-slate-500 py-4 px-12 rounded-md shadow cursor-pointer hover:bg-slate-500 hover:text-white hover:shadow-none">
            <div class="text-left">
                {{ windFarm.name }}
            </div>
            <div class="text-center">
                {{ windFarm.location }}
            </div>
            <div class="text-right">
                {{ windFarm.turbine_count }} {{ windFarm.turbine_count === 1 ? 'turbine' : 'turbines' }}
            </div>
        </div>
    </wrapper>
</template>
  
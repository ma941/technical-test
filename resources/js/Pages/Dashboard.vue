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
        <h2 class="font-bold text-center mb-2">Windfarms</h2>
        <div class="grid grid-cols-2 gap-2">
            <div @click="navigateToWindFarm(windFarm.id)" v-for="windFarm in props.windFarms" class="border border-slate-500 p-4 rounded-md shadow cursor-pointer hover:bg-slate-500 hover:text-white hover:shadow-none">
                <p>
                    Name: {{ windFarm.name }}
                </p>
                <p>
                    Location: {{ windFarm.location }}
                </p>
                <p>
                    Number of turbines: {{ windFarm.turbine_count }}
                </p>
            </div>
        </div>
    </wrapper>
</template>
  
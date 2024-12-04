<script setup>
import { router } from '@inertiajs/vue3';

const props = defineProps({
    turbines: {
        type: Object,
        required: true
    }
});

const navigateToturbine = (id) => {
    router.get(route('turbines.show', { turbine: id }));
};
</script>

<template>
    <wrapper>
        <heading title="Turbines" />
        <div class="grid grid-cols-3 gap-2 mt-2">
            <div @click="navigateToturbine(turbine.id)" v-for="turbine in props.turbines" class="border border-slate-500 py-4 px-12 rounded-md shadow cursor-pointer hover:bg-slate-500 hover:text-white hover:shadow-none">
                <p>Name: {{ turbine.name }}</p>
                <p>Inspection date: {{ turbine.formatted_inspection_date }}</p>
                <p>Power output: {{ turbine.formatted_power_output }}</p>
                <p>Status: {{ turbine.status }}</p>
            </div>
        </div>
    </wrapper>
</template>
  
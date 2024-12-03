<script setup>
import { router } from '@inertiajs/vue3';

const props = defineProps({
    turbines: {
        type: Object,
        required: true
    }
});

const goToTurbine = (id) => {
    router.get(route('turbines.show', { turbine: id }));
};
</script>
<template>
    <h3 class="text-center font-bold mt-8">Turbines</h3>
    <div class="w-full border rounded-md shadow">
        <div class="bg-slate-500 w-full p-4 rounded-t-md grid grid-cols-4 gap-2">
            <h3 class="text-center font-bold text-white">Name</h3>
            <h3 class="text-center font-bold text-white">Inspection date</h3>
            <h3 class="text-center font-bold text-white">Status</h3>
            <h3 class="text-center font-bold text-white">Power output</h3>
        </div>
        <div @click="goToTurbine(turbine.id)" v-for="(turbine, index) in props.turbines" :key="turbine.id" class="hover:bg-slate-500 hover:text-white cursor-pointer grid grid-cols-4 gap-2 px-4"
            :class="{'bg-slate-300' : index % 2 !== 0, 'rounded-b-md' : index + 1 === props.turbines.length}">
            <h3 class="text-center">{{ turbine.name }}</h3>
            <h3 class="text-center">{{ turbine.formatted_inspection_date }}</h3>
            <h3 class="text-center">{{ turbine.status }}</h3>
            <h3 class="text-center">{{ turbine.formatted_power_output }}</h3>
        </div>
    </div>
</template> 
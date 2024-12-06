<script setup>
import { router } from '@inertiajs/vue3';

const props = defineProps({
    generators: {
        type: Object,
        required: true
    }
});

const navigateToGenerator = (id) => {
    router.get(route('generators.show', { generator: id }));
};
</script>

<template>
    <wrapper>
        <heading title="Generators" />
        <p class="text-center mb-4 text-red-600">Note: Generators associated with turbines can be accessed from the individual turbine pages. You can also add new generators from the individual turbine pages.</p>
        <div class="grid grid-cols-3 gap-2 mt-2">
            <div @click="navigateToGenerator(generator.id)" v-for="generator in props.generators" class="border border-slate-500 py-4 px-12 rounded-md shadow cursor-pointer hover:bg-slate-500 hover:text-white hover:shadow-none">
                <p>Name: {{ generator.name }}</p>
                <p>Turbine: <span :class="generator.turbine ? '' : 'text-red-600'">{{ generator.turbine ? generator.turbine.name : 'N/A' }}</span></p>
                <p>Location: <span :class="generator.turbine ? '' : 'text-red-600'">{{ generator.turbine ? generator.turbine.wind_farm.location : 'N/A' }}</span></p>
                <p>Damage and wear: {{ generator.damage_and_wear?.level }}</p>
            </div>
        </div>
    </wrapper>
</template>
  
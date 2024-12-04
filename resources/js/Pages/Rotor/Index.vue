<script setup>
import { router } from '@inertiajs/vue3';

const props = defineProps({
    rotors: {
        type: Object,
        required: true
    }
});

const navigateToRotors = (id) => {
    router.get(route('rotors.show', { rotor: id }));
};
</script>

<template>
    <wrapper>
        <heading title="Rotors" />
        <p class="text-center mb-4 text-red-600">Note: Rotors associated with turbines can be accessed from the individual turbine pages. You can also add new rotors from the individual turbine pages.</p>
        <div class="grid grid-cols-3 gap-2 mt-2">
            <div @click="navigateToRotors(rotor.id)" v-for="rotor in props.rotors" class="border border-slate-500 py-4 px-12 rounded-md shadow cursor-pointer hover:bg-slate-500 hover:text-white hover:shadow-none">
                <p>Name: {{ rotor.name }}</p>
                <p>Turbine: <span :class="rotor.turbine ? 'text-black' : 'text-red-600'">{{ rotor.turbine ? rotor.turbine.name : 'N/A' }}</span></p>
                <p>Location: <span :class="rotor.turbine ? 'text-black' : 'text-red-600'">{{ rotor.turbine ? rotor.turbine.wind_farm.location : 'N/A' }}</span></p>
                <p>Damage and wear: {{ rotor.damage_and_wear?.level }}</p>
            </div>
        </div>
    </wrapper>
</template>
  
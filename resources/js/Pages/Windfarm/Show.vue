<script setup>
import location from '../../Components/Icons/Location.vue';
import turbines from '../../Components/Turbines.vue';

const props = defineProps({
    windFarm: {
        type: Object,
        required: true
    }
});

</script>

<template>
    <wrapper>
        <heading :title="props.windFarm.name" />
        <div class="flex justify-between m-auto w-fit mt-2">
            <location class="h-5 w-5 mr-2" /><span>{{ props.windFarm.location }}</span>
        </div>
        <turbines :turbines="props.windFarm.turbines" />
    </wrapper>
</template>
  
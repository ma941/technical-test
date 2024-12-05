<script setup>
import location from '../../Components/Icons/Location.vue';
import { ref, watch } from 'vue';
import { useForm } from '@inertiajs/vue3';
import modal from '../../Components/Modal.vue';
import primaryButton from '../../Components/PrimaryButton.vue';

const props = defineProps({
    turbine: {
        type: Object,
        required: true
    },
    unusedBlades: {
        type: Object,
        required: true 
    },
    unusedRotors: {
        type: Object,
        required: true 
    },
    unusedHubs: {
        type: Object,
        required: true 
    },
    unusedGenerators: {
        type: Object,
        required: true 
    },
    damageAndWearOptions: {
        type: Object,
        required: true 
    }
});

const newBladeForm = useForm({
    turbine: props.turbine.id,
    name: '',
    damageAndWear: 1
});

const existingBladeForm = useForm({
    turbine: props.turbine.id,
    blade: props.turbine.blades.length === 0 ? 0 : props.turbine.blades[0].id,
    damageAndWear: props.turbine.blades.length === 0 ? 0 : props.turbine.blades[0].damage_and_wear ? props.turbine.blades[0].damage_and_wear?.id : 0
});

const newRotorForm = useForm({
    turbine: props.turbine.id,
    name: '',
    damageAndWear: 1
});

const existingRotorForm = useForm({
    turbine: props.turbine.id,
    rotor: props.turbine.rotors.length === 0 ? 0 : props.turbine.rotors[0].id,
    damageAndWear: props.turbine.rotors.length === 0 ? 0 : props.turbine.rotors[0].damage_and_wear ? props.turbine.rotors[0].damage_and_wear?.id : 0
});

const newHubForm = useForm({
    turbine: props.turbine.id,
    name: '',
    damageAndWear: 1
});

const existingHubForm = useForm({
    turbine: props.turbine.id,
    hub: props.turbine.hubs.length === 0 ? 0 : props.turbine.hubs[0].id,
    damageAndWear: props.turbine.hubs.length === 0 ? 0 : props.turbine.hubs[0].damage_and_wear ? props.turbine.hubs[0].damage_and_wear?.id : 0
});

const newGeneratorForm = useForm({
    turbine: props.turbine.id,
    name: '',
    damageAndWear: 1
});

const existingGeneratorForm = useForm({
    turbine: props.turbine.id,
    generator: props.turbine.generators.length === 0 ? 0 : props.turbine.generators[0].id,
    damageAndWear: props.turbine.generators.length === 0 ? 0 : props.turbine.generators[0].damage_and_wear ? props.turbine.generators[0].damage_and_wear?.id : 0
});

watch(() => existingBladeForm.blade, (newBlade, oldBlade) => {
    existingBladeForm.damageAndWear = props.unusedBlades.filter(blade => blade.id === newBlade)[0].damage_and_wear_id;
});

watch(() => existingRotorForm.rotor, (newRotor, oldRotor) => {
    existingRotorForm.damageAndWear = props.unusedRotors.filter(rotor => rotor.id === newRotor)[0].damage_and_wear_id;
});

watch(() => existingHubForm.hub, (newHub, oldHub) => {
    existingHubForm.damageAndWear = props.unusedHubs.filter(hub => hub.id === newHub)[0].damage_and_wear_id;
});

watch(() => existingGeneratorForm.generator, (newGenerator, oldGenerator) => {
    existingGeneratorForm.damageAndWear = props.unusedGenerators.filter(generator => generator.id === newGenerator)[0].damage_and_wear_id;
});

const showBladeModal = ref(false);
const showAddNewBladeContent = ref(false);
const showRotorModal = ref(false);
const showAddNewRotorContent = ref(false);
const showHubModal = ref(false);
const showAddNewHubContent = ref(false);
const showGeneratorModal = ref(false);
const showAddNewGeneratorContent = ref(false);

const closeBladeModal = () => {
    showBladeModal.value = false
    showAddNewBladeContent.value = false
};

const closeRotorModal = () => {
    showRotorModal.value = false
    showAddNewRotorContent.value = false
};

const closeHubModal = () => {
    showHubModal.value = false
    showAddNewHubContent.value = false
};

const closeGeneratorModal = () => {
    showGeneratorModal.value = false
    showAddNewGeneratorContent.value = false
};

const openBladeModal = () => {
    closeBladeModal();
    closeRotorModal();
    closeHubModal();
    closeGeneratorModal();
    showBladeModal.value = true
};

const openRotorModal = () => {
    closeBladeModal();
    closeRotorModal();
    closeHubModal();
    closeGeneratorModal();
    showRotorModal.value = true
};

const openHubModal = () => {
    closeBladeModal();
    closeRotorModal();
    closeHubModal();
    closeGeneratorModal();
    showHubModal.value = true
};

const openGeneratorModal = () => {
    closeBladeModal();
    closeRotorModal();
    closeHubModal();
    closeGeneratorModal();
    showGeneratorModal.value = true
};

const submitExistingBladeForm = () => {
    existingBladeForm.put(
        route('blades.update', { blade: existingBladeForm.blade }),
        {
            onSuccess: () => {
                closeBladeModal();
                closeRotorModal();
                closeHubModal();
                closeGeneratorModal();
            },
            preserveState: true
        }
    );
};

const submitNewBladeForm = () => {
    newBladeForm.post(
        route('blades.store'),
        {
            onSuccess: () => {
                closeBladeModal();
                closeRotorModal();
                closeHubModal();
                closeGeneratorModal();
            },
            preserveState: true
        }
    );
};

const submitExistingRotorForm = () => {
    existingRotorForm.put(
        route('rotors.update', { rotor: existingRotorForm.rotor }),
        {
            onSuccess: () => {
                closeBladeModal();
                closeRotorModal();
                closeHubModal();
                closeGeneratorModal();
            },
            preserveState: true
        }
    );
};

const submitNewRotorForm = () => {
    newRotorForm.post(
        route('rotors.store'),
        {
            onSuccess: () => {
                closeBladeModal();
                closeRotorModal();
                closeHubModal();
                closeGeneratorModal();
            },
            preserveState: true
        }
    );
};

const submitExistingHubForm = () => {
    existingHubForm.put(
        route('hubs.update', { hub: existingHubForm.hub }),
        {
            onSuccess: () => {
                closeBladeModal();
                closeRotorModal();
                closeHubModal();
                closeGeneratorModal();
            },
            preserveState: true
        }
    );
};

const submitNewHubForm = () => {
    newHubForm.post(
        route('hubs.store'),
        {
            onSuccess: () => {
                closeBladeModal();
                closeRotorModal();
                closeHubModal();
                closeGeneratorModal();
            },
            preserveState: true
        }
    );
};

const submitExistingGeneratorForm = () => {
    existingGeneratorForm.put(
        route('generators.update', { generator: existingGeneratorForm.generator }),
        {
            onSuccess: () => {
                closeBladeModal();
                closeRotorModal();
                closeHubModal();
                closeGeneratorModal();
            },
            preserveState: true
        }
    );
};

const submitNewGeneratorForm = () => {
    newGeneratorForm.post(
        route('generators.store'),
        {
            onSuccess: () => {
                closeBladeModal();
                closeRotorModal();
                closeHubModal();
                closeGeneratorModal();
            },
            preserveState: true
        }
    );
};
</script>

<template>
    <wrapper>
        <modal v-if="showBladeModal" @close="closeBladeModal()">
            <heading class="mb-2" :title="'Blade for: ' + props.turbine.name" />
            <div v-if="showAddNewBladeContent">
                <form @submit.prevent="submitNewBladeForm">
                    <div class="grid grid-cols-2 gap-2">
                        <p>Name:</p>
                        <input type="text" v-model="newBladeForm.name" class="border border-solid rounded px-2" placeholder="Enter blade name">
                        <p>Damage and wear:</p>
                        <select v-model="newBladeForm.damageAndWear" id="damageAndWear" class="border border-solid rounded px-2">
                            <option v-for="rating in props.damageAndWearOptions" :value="rating.id">{{ rating.level }}</option>
                        </select>
                    </div>                    
                    <primaryButton @click="submitNewBladeForm" text="Add blade" type="submit" class="mx-auto mt-4" />
                </form>
                <p class="mt-12 text-center"><span @click="showAddNewBladeContent = false" class="cursor-pointer text-indigo-600">Click Here</span> to use existing blade</p>
            </div>
            <div v-else>
                <div v-if="props.unusedBlades.length !== 0">
                    <form @submit.prevent="submitExistingBladeForm">
                        <div class="grid grid-cols-2 gap-2">
                            <p>Select blade:</p>
                            <select v-model="existingBladeForm.blade" id="blade" class="border border-solid rounded px-2">
                                <option disabled :value="0">Select a blade</option>
                                <option v-for="blade in props.unusedBlades" :value="blade.id">{{ blade.name }}</option>
                            </select>
                            <p>Damage and wear:</p>
                            <select v-model="existingBladeForm.damageAndWear" id="damageAndWear" class="border border-solid rounded px-2">
                                <option disabled :value="0">Select rating</option>
                                <option v-for="rating in props.damageAndWearOptions" :value="rating.id">{{ rating.level }}</option>
                            </select>
                        </div>                    
                        <primaryButton v-if="existingBladeForm.blade !== 0" @click="submitExistingBladeForm" text="Update blade" type="submit" class="mx-auto mt-4" />
                    </form>
                </div>
                <p class="mt-12">If you can't find the blade you are looking for <span @click="showAddNewBladeContent = true" class="cursor-pointer text-indigo-600">Click Here</span> to add a new blade</p>
            </div>
        </modal>
        <modal v-if="showRotorModal" @close="closeRotorModal()">
            <heading class="mb-2" :title="'Rotor for: ' + props.turbine.name" />
            <div v-if="showAddNewRotorContent">
                <form @submit.prevent="submitNewRotorForm">
                    <div class="grid grid-cols-2 gap-2">
                        <p>Name:</p>
                        <input type="text" v-model="newRotorForm.name" class="border border-solid rounded px-2" placeholder="Enter rotor name">
                        <p>Damage and wear:</p>
                        <select v-model="newRotorForm.damageAndWear" id="damageAndWear" class="border border-solid rounded px-2">
                            <option v-for="rating in props.damageAndWearOptions" :value="rating.id">{{ rating.level }}</option>
                        </select>
                    </div>                    
                    <primaryButton @click="submitNewRotorForm" text="Add rotor" type="submit" class="mx-auto mt-4" />
                </form>
                <p class="mt-12 text-center"><span @click="showAddNewRotorContent = false" class="cursor-pointer text-indigo-600">Click Here</span> to use existing rotor</p>
            </div>
            <div v-else>
                <div v-if="props.unusedRotors.length !== 0">
                    <form @submit.prevent="submitExistingRotorForm">
                        <div class="grid grid-cols-2 gap-2">
                            <p>Select rotor:</p>
                            <select v-model="existingRotorForm.rotor" id="rotor" class="border border-solid rounded px-2">
                                <option disabled :value="0">Select a rotor</option>
                                <option v-for="rotor in props.unusedRotors" :value="rotor.id">{{ rotor.name }}</option>
                            </select>
                            <p>Damage and wear:</p>
                            <select v-model="existingRotorForm.damageAndWear" id="damageAndWear" class="border border-solid rounded px-2">
                                <option disabled :value="0">Select rating</option>
                                <option v-for="rating in props.damageAndWearOptions" :value="rating.id">{{ rating.level }}</option>
                            </select>
                        </div>                    
                        <primaryButton v-if="existingRotorForm.rotor !== 0" @click="submitExistingRotorForm" text="Update rotor" type="submit" class="mx-auto mt-4" />
                    </form>
                </div>
                <p class="mt-12">If you can't find the rotor you are looking for <span @click="showAddNewRotorContent = true" class="cursor-pointer text-indigo-600">Click Here</span> to add a new rotor</p>
            </div>
        </modal>
        <modal v-if="showHubModal" @close="closeHubModal()">
            <heading class="mb-2" :title="'Hub for: ' + props.turbine.name" />
            <div v-if="showAddNewHubContent">
                <form @submit.prevent="submitNewHubForm">
                    <div class="grid grid-cols-2 gap-2">
                        <p>Name:</p>
                        <input type="text" v-model="newHubForm.name" class="border border-solid rounded px-2" placeholder="Enter hub name">
                        <p>Damage and wear:</p>
                        <select v-model="newHubForm.damageAndWear" id="damageAndWear" class="border border-solid rounded px-2">
                            <option v-for="rating in props.damageAndWearOptions" :value="rating.id">{{ rating.level }}</option>
                        </select>
                    </div>                    
                    <primaryButton @click="submitNewHubForm" text="Add hub" type="submit" class="mx-auto mt-4" />
                </form>
                <p class="mt-12 text-center"><span @click="showAddNewHubContent = false" class="cursor-pointer text-indigo-600">Click Here</span> to use existing hub</p>
            </div>
            <div v-else>
                <div v-if="props.unusedHubs.length !== 0">
                    <form @submit.prevent="submitExistingHubForm">
                        <div class="grid grid-cols-2 gap-2">
                            <p>Select hub:</p>
                            <select v-model="existingHubForm.hub" id="hub" class="border border-solid rounded px-2">
                                <option disabled :value="0">Select a hub</option>
                                <option v-for="hub in props.unusedHubs" :value="hub.id">{{ hub.name }}</option>
                            </select>
                            <p>Damage and wear:</p>
                            <select v-model="existingHubForm.damageAndWear" id="damageAndWear" class="border border-solid rounded px-2">
                                <option disabled :value="0">Select rating</option>
                                <option v-for="rating in props.damageAndWearOptions" :value="rating.id">{{ rating.level }}</option>
                            </select>
                        </div>                    
                        <primaryButton v-if="existingHubForm.hub !== 0" @click="submitExistingHubForm" text="Update hub" type="submit" class="mx-auto mt-4" />
                    </form>
                </div>
                <p class="mt-12">If you can't find the hub you are looking for <span @click="showAddNewHubContent = true" class="cursor-pointer text-indigo-600">Click Here</span> to add a new hub</p>
            </div>
        </modal>
        <modal v-if="showGeneratorModal" @close="closeGeneratorModal()">
            <heading class="mb-2" :title="'Generator for: ' + props.turbine.name" />
            <div v-if="showAddNewGeneratorContent">
                <form @submit.prevent="submitNewGeneratorForm">
                    <div class="grid grid-cols-2 gap-2">
                        <p>Name:</p>
                        <input type="text" v-model="newGeneratorForm.name" class="border border-solid rounded px-2" placeholder="Enter generator name">
                        <p>Damage and wear:</p>
                        <select v-model="newGeneratorForm.damageAndWear" id="damageAndWear" class="border border-solid rounded px-2">
                            <option v-for="rating in props.damageAndWearOptions" :value="rating.id">{{ rating.level }}</option>
                        </select>
                    </div>                    
                    <primaryButton @click="submitNewGeneratorForm" text="Add generator" type="submit" class="mx-auto mt-4" />
                </form>
                <p class="mt-12 text-center"><span @click="showAddNewGeneratorContent = false" class="cursor-pointer text-indigo-600">Click Here</span> to use existing generator</p>
            </div>
            <div v-else>
                <div v-if="props.unusedGenerators.length !== 0">
                    <form @submit.prevent="submitExistingGeneratorForm">
                        <div class="grid grid-cols-2 gap-2">
                            <p>Select generator:</p>
                            <select v-model="existingGeneratorForm.generator" id="generator" class="border border-solid rounded px-2">
                                <option disabled :value="0">Select a generator</option>
                                <option v-for="generator in props.unusedGenerators" :value="generator.id">{{ generator.name }}</option>
                            </select>
                            <p>Damage and wear:</p>
                            <select v-model="existingGeneratorForm.damageAndWear" id="damageAndWear" class="border border-solid rounded px-2">
                                <option disabled :value="0">Select rating</option>
                                <option v-for="rating in props.damageAndWearOptions" :value="rating.id">{{ rating.level }}</option>
                            </select>
                        </div>                    
                        <primaryButton v-if="existingGeneratorForm.generator !== 0" @click="submitExistingGeneratorForm" text="Update generator" type="submit" class="mx-auto mt-4" />
                    </form>
                </div>
                <p class="mt-12">If you can't find the generator you are looking for <span @click="showAddNewGeneratorContent = true" class="cursor-pointer text-indigo-600">Click Here</span> to add a new generator</p>
            </div>
        </modal>
        <heading :title="props.turbine.name" />
        <div class="flex justify-between m-auto w-fit mt-2">
            <location class="h-5 w-5 mr-2" /><span>{{ props.turbine.wind_farm.name + ' - ' + props.turbine.wind_farm.location }}</span>
        </div>
        <heading title="Components" class="mt-8" />
        <p class="text-center mb-4 text-red-600">Click a component to update</p>
        <div class="grid grid-cols-2 gap-2 mt-4 text-center">
            <div @click="openBladeModal()" class="border border-slate-500 py-4 px-12 rounded-md shadow cursor-pointer hover:bg-slate-500 hover:text-white hover:shadow-none">
                <h3 class="text-center font-bold">Blade</h3>
                <div v-if="props.turbine.blades.length === 0" class="text-red-600 font-bold">
                    <p>No blade</p>
                </div>
                <div v-else>
                    <p>Name: {{ props.turbine.blades[0].name }}</p>
                    <p>Damage and wear: {{ props.turbine.blades[0].damage_and_wear?.level }}</p>
                </div>
            </div>
            <div @click="openRotorModal()" class="border border-slate-500 py-4 px-12 rounded-md shadow cursor-pointer hover:bg-slate-500 hover:text-white hover:shadow-none">
                <h3 class="text-center font-bold">Rotor</h3>
                <div v-if="props.turbine.rotors.length === 0" class="text-red-600 font-bold">
                    <p>No Rotor</p>
                </div>
                <div v-else>
                    <p>Name: {{ props.turbine.rotors[0].name }}</p>
                    <p>Damage and wear: {{ props.turbine.rotors[0].damage_and_wear?.level }}</p>
                </div>
            </div>
            <div @click="openHubModal()" class="border border-slate-500 py-4 px-12 rounded-md shadow cursor-pointer hover:bg-slate-500 hover:text-white hover:shadow-none">
                <h3 class="text-center font-bold">Hub</h3>
                <div v-if="props.turbine.hubs.length === 0" class="text-red-600 font-bold">
                    <p>No Hub</p>
                </div>
                <div v-else>
                    <p>Name: {{ props.turbine.hubs[0].name }}</p>
                    <p>Damage and wear: {{ props.turbine.hubs[0].damage_and_wear?.level }}</p>
                </div>
            </div>
            <div @click="openGeneratorModal()" class="border border-slate-500 py-4 px-12 rounded-md shadow cursor-pointer hover:bg-slate-500 hover:text-white hover:shadow-none">
                <h3 class="text-center font-bold">Generator</h3>
                <div v-if="props.turbine.generators.length === 0" class="text-red-600 font-bold">
                    <p>No Generator</p>
                </div>
                <div v-else>
                    <p>Name: {{ props.turbine.generators[0].name }}</p>
                    <p>Damage and wear: {{ props.turbine.generators[0].damage_and_wear?.level }}</p>
                </div>
            </div>            
        </div>
    </wrapper>
</template>
  
<template>
    <div class="bg-red-500 text-white pt-4 mb-2 sticky top-0">
        <Link :href="route('dashboard')"><h1 class="text-center font-bold">Mohsin Ali - Technical</h1></Link>
        <div class="py-2 mt-4 flex justify-center gap-4">
            <Link :href="route('dashboard')">Home</Link>
            <Link :href="route('windfarms.index')">Windfarms</Link>
            <Link :href="route('turbines.index')">Turbines</Link>

            <Link :href="route('blades.index')">All Blades</Link>
            <Link :href="route('blades.index')">All Rotors</Link>
            <Link :href="route('blades.index')">All Hubs</Link>
            <Link :href="route('blades.index')">All Generators</Link>
        </div>
    </div>
    <div class="p-4">
        <slot />
    </div>
</template>
  
<template>
    <wrapper>
        <heading class="mb-4" title="Mohsin Ali's technical for Cyberhawk" />
        <p class="text-center mb-4 text-red-600 font-bold">
            How the project works:
        </p>
        <p class="text-center mb-4 text-red-600">
            For this project please make sure to use seeded data to get you started: <br />
            <span class="italic font-bold">php artisan migrate:fresh --seed</span>
        </p>
        <p class="text-center mb-4 text-red-600">
            Once your database is populated with seeded data you will have a list of windfarms, each windfarm can have multiple turbines associated to them. <br />
            A turbine can have a number of components which are a blade, a rotor, a hub and a generator.
        </p>
        <p class="text-center mb-4 text-red-600">
            You can attach and detach components from a turbine and give them a grade from 1-5 from within the individual turbine page. You can also create new components from here. You can get to the individual turbine page from 2 ways:
        </p>
        <ul class="list-disc mx-auto my-2 text-left w-fit text-red-600">
            <li>windfarms -> individual windfarm -> individual turbine</li>
            <li>turbines -> individual turbine</li>
        </ul>
        <p class="text-center mb-4 text-red-600">
            You can view all turbine components from going to one of the following pages:
        </p>
        <ul class="list-disc mx-auto my-2 text-left w-fit text-red-600">
            <li>All Blades</li>
            <li>All Rotors</li>
            <li>All Hubs</li>
            <li>All Generator</li>
        </ul>
        <p class="text-center mb-4 text-red-600">
            From the component list pages you can then click an individual component where you are able to delete them. <span class="font-bold">Note:</span> soft deletes have not been used for these so once a component is deleted it is removed from the database table rather than a timestamp being added to a deleted_at column
        </p>
        <p class="text-center mb-4 text-red-600">
            Once you have seeded your database use the main menu to get started.
        </p>
    </wrapper>
</template>
  
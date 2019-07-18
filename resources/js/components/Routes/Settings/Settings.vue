<template>
    <div class="flex">
        <aside>
            <h5 class="uppercase font-bold text-gray-600">Tables</h5>
            <ul class="mt-2">
                <li class="text-gray-600">
                    <router-link :to="{ name: 'settings.places' }" class="text-base text-gray-800 font-medium sm:text-gray-800 sm:font-medium">
                        places
                    </router-link>
                </li>
                <li class="text-gray-600">
                    <router-link :to="{ name: 'settings.unit-types' }" class="text-base text-gray-800 font-medium sm:text-gray-800 sm:font-medium">
                        unit_types
                    </router-link>
                </li>
            </ul>
        </aside>
        <div class="ml-16">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>

export default {
};
</script>

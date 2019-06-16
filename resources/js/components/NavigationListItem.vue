<template>
    <li class="py-1 sm:p-0 sm:ml-4">
        <router-link :to="{ name: route }" class="text-base text-gray-800 font-medium sm:text-gray-800 sm:font-medium lg:ml-4">
            <span class="sm:hidden"><i v-if="icon" :class="icon" class="fa text-gray-500"></i></span>{{ text }}
        </router-link>
    </li>
</template>

<script>

export default {
    props: ["text", "icon", "route"]
};
</script>


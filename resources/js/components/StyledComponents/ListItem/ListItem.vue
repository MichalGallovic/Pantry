<template>
    <li
        class="flex items-center px-2 py-2 rounded rounded-lg cursor-pointer hover:bg-gray-800"
        :class="{ 'bg-gray-600': !inactive, 'bg-gray-500': inactive }">
        <span
            class="ml-4 text-gray-100"
            :class="{ 'text-gray-300': inactive }"
        >{{ text }}</span>
    </li>
</template>

<script>
export default {
    props: {
        text: {
            default: "List Item text"
        },
        inactive: {
            default: false
        }
    }
};
</script>

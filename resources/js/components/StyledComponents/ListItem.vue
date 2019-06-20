<template>
    <li
        class="flex items-center px-2 py-2 rounded rounded-lg cursor-pointer hover:bg-gray-800"
        :class="{ 'bg-gray-600': !inactive, 'bg-gray-500': inactive }">
        <Checkbox :checked="inactive" class="ml-2"></Checkbox>
        <span
            class="ml-4 text-gray-100"
            :class="{ 'text-gray-300': inactive }"
        >{{ text }}</span>
        <CloseIcon class="ml-auto mr-2"></CloseIcon>
    </li>
</template>

<script>
import Checkbox from './Checkbox';
import CloseIcon from './CloseIcon';

export default {
    components: {
        Checkbox,
        CloseIcon
    },
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

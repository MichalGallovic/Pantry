<template>
    <li
        @click="$emit('toggle', value)"
        class="flex items-center px-2 py-2 rounded rounded-lg cursor-pointer hover:bg-gray-800"
        :class="{ 'bg-gray-600': !inactive, 'bg-gray-500': inactive }">
        <Checkbox v-if="checkbox" :checked="inactive" class="ml-2"></Checkbox>
        <span
                class="ml-4 text-gray-100"
                :class="{ 'text-gray-300': inactive }"
        >{{ text }}</span>
        <CloseIcon @click.native.stop="remove" class="ml-auto mr-2 text-gray-200"></CloseIcon>
    </li>
</template>

<script>
import Checkbox from '../Checkbox';
import CloseIcon from '../CloseIcon';

export default {
    components: {
        Checkbox,
        CloseIcon
    },
    props: {
        text: String,
        value: {
            default: () => {}
        },
        inactive: {
            default: false
        },
        checkbox: {
            default: false
        }
    },
    methods: {
        remove (event) {
            this.$emit('remove', this.value);
        }
    }
};
</script>

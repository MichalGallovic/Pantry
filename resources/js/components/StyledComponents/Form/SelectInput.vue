<template>
    <div class="relative">
        <div class="absolute inset-y-0 right-0 flex items-center mr-4">
            <InputIcon class="fa-chevron-down"></InputIcon>
        </div>
        <select
            :value="value"
            @input="e => $emit('input', e.target.value)"
            class="bg-gray-300 pl-6 py-2 h-10 font-medium rounded-lg focus:outline-none w-full appearance-none"
            :class="{ 'text-gray-800': value, 'text-gray-600': !value }"
        >
            <option :value="null">{{ placeholder }}</option>
            <option v-for="option in options" :key="option.id" :value="option.value">{{ option.text }}</option>
        </select>
    </div>
</template>

<script>
import InputIcon from './InputIcon';

export default {
    props: {
        placeholder: {
            type: String,
            default: "Select option"
        },
        options: {
            type: Array,
            default: null
        },
        value: {
            type: [String, Number],
            default: null
        }
    },
    components: {
        InputIcon
    }
};
</script>

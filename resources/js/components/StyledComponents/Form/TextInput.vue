<template>
    <input
        :value="value"
        @input="e => $emit('input', e.target.value)"
        type="text"
        class="bg-gray-300 text-gray-800 pl-6 py-2 font-medium rounded-lg focus:outline-none"
        :placeholder="placeholder">
</template>

<script>
export default {
    props: {
        placeholder: {
            default: "Placeholder"
        },
        value: String
    }
};
</script>

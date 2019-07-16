<template>
    <textarea
        :value="value"
        @input="e => $emit('input', e.target.value)"
        class="bg-gray-300 text-gray-800 pl-6 py-2 font-medium rounded-lg focus:outline-none"
        :placeholder="placeholder"
    >
    </textarea>
</template>

<script>
    export default {
        props: ['value', 'placeholder']
    };
</script>

<template>
    <div class="absolute w-full px-4 py-4 bg-gray-300 rounded rounded-lg mt-2">
        <ul v-if="suggestions.length > 0">
            <li @click="$emit('select', suggestion)" v-for="(suggestion, i) in suggestions" :key="i" :class="{ 'mt-2': i > 0 }" class="px-2 py-1 rounded rounded-lg bg-gray-200 text-gray-800 hover:bg-gray-800 hover:text-gray-100 cursor-pointer">
                {{ suggestion.text }}
            </li>
        </ul>
        <p v-else-if="loading">Loading ...</p>
        <p v-else class="text-center font-medium text-gray-600">I found nothing :( ...</p>
    </div>
</template>

<script>
export default {
    props: {
        suggestions: {
            type: Array,
            default: []
        },
        loading: {
            type: Boolean,
            default: false
        }
    },
    methods: {
        handleOutsideClick (event) {
            this.$emit('click:outside', event);
        }
    },
    mounted () {
        document.addEventListener('click', this.handleOutsideClick);
        document.addEventListener('touchstart', this.handleOutsideClick);
    },
    destroyed () {
        document.removeEventListener('click', this.handleOutsideClick);
        document.removeEventListener('touchstart', this.handleOutsideClick);
    }
};
</script>

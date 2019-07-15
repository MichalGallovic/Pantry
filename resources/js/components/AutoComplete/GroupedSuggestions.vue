<template>
    <div class="absolute w-full px-4 py-4 bg-gray-300 rounded rounded-lg mt-2">
        <div v-if="suggestions.length > 0">
            <div :class="{ 'mt-4': i > 0 }" v-for="(suggestionsGroup, i) in suggestions" :key="i">
                <span class="uppercase font-bold text-sm text-gray-600">{{ suggestionsGroup.name }}</span>
                <ul>
                    <li @click="$emit('select', suggestion)" v-for="(suggestion, j) in suggestionsGroup.suggestions" :key="j" :class="{ 'mt-2': j > 0 }" class="suggestion-item">
                        {{ suggestion.text }}
                        <span>{{ suggestion.small_text }}</span>
                    </li>
                </ul>
            </div>
        </div>
        <p v-if="loading" class="mt-2">Loading ...</p>
        <p  v-else-if="!hasResults" class="mt-2 font-medium text-gray-600">
            I found no results :( ...
        </p>
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
        },
        hasResults: {
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

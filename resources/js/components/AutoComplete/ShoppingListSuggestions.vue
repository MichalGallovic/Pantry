<template>
    <div class="absolute w-full px-4 py-4 bg-gray-300 rounded rounded-lg mt-2">
        <div v-if="suggestions.length > 0">
            <div :class="{ 'mt-4': i > 0 }" v-for="(suggestionsGroup, i) in suggestions" :key="i">
                <span class="uppercase font-bold text-sm text-gray-600">{{ suggestionsGroup.name }}</span>
                <ul>
                    <li @click="$emit('select', suggestion)" v-for="(suggestion, j) in suggestionsGroup.suggestions" :key="j" :class="{ 'mt-2': j > 0 }" class="px-2 py-1 rounded rounded-lg bg-gray-200 text-gray-800 hover:bg-gray-800 hover:text-gray-100 cursor-pointer">
                        {{ suggestion.text }}
                    </li>
                </ul>
                <p v-if="loading" class="mt-2">Loading ...</p>
                <p v-else-if="!hasResults" class="mt-2 font-medium text-gray-600">
                    I found no groceries :( ...
                </p>
            </div>
        </div>
    </div>
</template>

<script>
import Suggestions from './Suggestions';

export default {
    extends: Suggestions,
    props: ['hasResults']
};
</script>

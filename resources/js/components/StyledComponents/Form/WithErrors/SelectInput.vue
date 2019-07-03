<template>
    <div class="flex flex-col inline-block" v-if="errors">
        <Error v-for="(error, i) in errors" :error="error" :key="i"></Error>
        <SelectInput
            :options="options"
            @input="value => $emit('input', value)">
        </SelectInput>
    </div>
    <SelectInput
        v-else
        :options="options"
        @input="value => $emit('input', value)">
    </SelectInput>
</template>

<script>
import SelectInput from '../SelectInput';
import Error from './Error';

export default {
    components: {
        Error,
        SelectInput
    },
    props: {
        placeholder: {
            default: "Placeholder"
        },
        options: {
            default: () => []
        },
        value: String,
        errors: Array
    }
    };
</script>

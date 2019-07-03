<template>
    <div class="flex flex-col inline-block" v-if="errors">
        <Error v-for="(error, i) in errors" :error="error" :key="i"></Error>
        <TextInput :value="value" @input="value => $emit('input', value)"></TextInput>
    </div>
    <TextInput v-else :value="value" @input="value => $emit('input', value)"></TextInput>
</template>

<script>
import TextInput from '../TextInput';
import Error from './Error';

export default {
    components: {
        TextInput,
        Error
    },
    props: {
        placeholder: {
            default: "Placeholder"
        },
        value: String,
        errors: Array
    }
};
</script>

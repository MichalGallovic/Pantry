<template>
    <div class="flex flex-col inline-block" v-if="errors">
        <small class="text-red-600" v-for="error in errors">{{ error }}</small>
        <TextInput :value="value" @input="value => $emit('input', value)"></TextInput>
    </div>
    <TextInput v-else :value="value" @input="value => $emit('input', value)"></TextInput>
</template>

<script>
import TextInput from '../TextInput';

export default {
    components: {
        TextInput
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

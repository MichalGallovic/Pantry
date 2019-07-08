<template>
    <div class="relative h-10">
        <div class="absolute inset-y-0 left-0 flex items-center pl-4">
            <InputIcon class="fa-search"></InputIcon>
        </div>
        <TextInput @focus.native="$emit('focus')" @blur.native="$emit('blur')" @input="value => $emit('change', value)" :value="value" class="pl-12 pr-6 w-full" placeholder="Search"></TextInput>
    </div>
</template>


<script>
import TextInput from './StyledComponents/Form/TextInput';
import InputIcon from './StyledComponents/Form/InputIcon';

export default {
    props: ['value'],
    components: {
        TextInput,
        InputIcon
    }
};
</script>

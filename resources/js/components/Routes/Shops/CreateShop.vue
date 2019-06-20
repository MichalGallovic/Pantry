<template>
    <section>
        <div class="flex">
            <Heading>Add shop</Heading>
        </div>
        <div class="flex flex-wrap">
            <form class="mt-4 w-full sm:w-1/2">
                <div>
                    <Label class="block">Shop name</Label>
                    <TextInput class="mt-2 w-full block" placeholder="Waldorf salad"></TextInput>
                </div>
                <div class="mt-4 text-right">
                    <Button type="submit">Save</Button>
                </div>
            </form>
        </div>
    </section>
</template>

<script>
import Heading from '../../StyledComponents/Heading';
import Label from '../../StyledComponents/Form/Label';
import TextInput from '../../StyledComponents/Form/TextInput';
import Button from '../../StyledComponents/Button';

export default {
    components: {
        Heading,
        Label,
        TextInput,
        Button
    }
};
</script>


<template>
    <BackDrop @modal:close="$emit('cancel')">
        <div class="bg-gray-100 m-auto rounded rounded-lg w-128">
            <div class="p-8">
                <header class="flex justify-between items-center text-xl font-medium">
                    <span><slot name="header"></slot></span>
                    <CloseIcon @click.native="$emit('cancel')" class="text-gray-800"></CloseIcon>
                </header>
                <p class="mt-4 text-gray-600">
                    <slot name="body">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Saepe voluptatibus ea a, illum ad mollitia optio recusandae, doloribus sit.
                        Dignissimos nulla, accusantium possimus blanditiis magnam officiis. Provident cum ea officiis.
                    </slot>
                </p>
            </div>
            <div class="flex justify-end p-4 bg-gray-200 rounded-b-lg">
                <Button @click.native="$emit('cancel')">Cancel</Button>
                <Button class="btn-red ml-4" @click.native="$emit('confirm')">Delete</Button>
            </div>
        </div>
    </BackDrop>
</template>

<script>
import BackDrop from './Backdrop';
import CloseIcon from '../CloseIcon';
import Button from '../Button';

export default {
    components: {
        BackDrop,
        CloseIcon,
        Button
    }
};
</script>

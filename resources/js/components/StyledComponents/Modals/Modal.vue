<template>
    <Backdrop @modal:close="$emit('modal:close')">
        <div class="bg-gray-400 m-auto rounded rounded-lg w-192">
            <div class="flex justify-between items-center bg-gray-800 w-full p-4 rounded-t rounded-t-lg">
                <slot name="header">
                    <span class="text-gray-100"><slot name="modal-header">Modal Header</slot></span>
                    <CloseIcon class="text-gray-100" @click.native="$emit('modal:close')"></CloseIcon>
                </slot>
            </div>
            <div class="p-4">
                <slot name="body">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Saepe voluptatibus ea a, illum ad mollitia optio recusandae, doloribus sit.
                    Dignissimos nulla, accusantium possimus blanditiis magnam officiis. Provident cum ea officiis.
                </slot>
            </div>
        </div>
    </Backdrop>
</template>

<script>
import Backdrop from './Backdrop';
import CloseIcon from './../CloseIcon';

export default {
    components: {
        Backdrop,
        CloseIcon,
    }
};
</script>

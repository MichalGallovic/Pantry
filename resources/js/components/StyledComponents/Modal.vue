<template>
    <portal to="out-off-container">
        <div class="flex modal-backdrop px-3" @click.self="$emit('modal:close')">
            <div class="w-full md:w-1/2 bg-gray-400 m-auto rounded rounded-lg">
                <div class="flex justify-between items-center bg-gray-800 w-full p-4 rounded-t rounded-t-lg">
                    <slot name="header">
                        <span class="text-gray-100">Modal Header</span>
                        <CloseIcon @click.native="$emit('modal:close')"></CloseIcon>
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
        </div>
    </portal>
</template>

<script>
import CloseIcon from './CloseIcon';

export default {
    components: {
        CloseIcon
    }
};
</script>

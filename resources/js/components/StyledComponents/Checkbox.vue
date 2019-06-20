<template>
    <span class="flex rounded rounded-full h-5 w-5 bg-gray-100">
        <i v-show="checked" class="fa fa-xs fa-check text-gray-800 m-auto" style="margin-top: 5px;"></i>
    </span>
</template>

<script>
export default {
    props: {
        checked: {
            default: false
        }
    }
};
</script>

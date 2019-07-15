<template>
    <div class="cursor-pointer">
        <div
            class="flex flex-col lg:w-56 h-40 rounded-lg p-4 hover:bg-gray-800"
            :class="{ 'bg-gray-600': !inactive, 'bg-gray-500': inactive }">

            <div class="flex justify-between items-start break-all">
                <h3 class="text-lg text-gray-100 w-full">{{ heading }}</h3>
                <span class="inline-block text-right ml-2">
                    <Checkbox v-if="iconVisible" :checked="checked"></Checkbox>
                </span>
            </div>

            <span class="text-sm text-gray-200">{{ subHeading }}</span>
            <strong class="mt-auto text-base font-bold text-gray-100">{{ leftBottom }}</strong>
        </div>
    </div>
</template>

<script>
import Checkbox from './Checkbox';

export default {
    components: {
        Checkbox
    },
    props: {
        heading: String,
        subHeading: String,
        leftBottom: String,
        inactive: {
            default: false
        },
        iconVisible: {
            default: false
        },
        checked: {
            default: false
        }
    }
};
</script>

<template>
    <div class="w-full sm:px-2 sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 mt-2 sm:mt-4 cursor-pointer">
        <div
                class="flex flex-col lg:w-56 h-40 rounded-lg p-4 hover:bg-gray-800"
                :class="{ 'bg-gray-600': !inactive, 'bg-gray-500': inactive }">
            <div class="flex justify-between">
                <h3 class="text-lg text-gray-100 w-full">{{ heading}}</h3>
                <span v-if="iconVisible" class="inline-block text-right">
                <span class="inline-flex rounded rounded-full h-5 w-5 bg-gray-100">
                    <i class="fa fa-xs fa-check text-gray-800 m-auto" style="margin-top: 5px"></i>
                </span>
            </span>
            </div>
            <span class="text-sm text-gray-200">{{ subHeading }}</span>
            <strong class="mt-auto text-base font-bold text-gray-100">{{ leftBottom }}</strong>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        heading: {
            default: "Heading"
        },
        subHeading: {
            default: "Sub Heading"
        },
        leftBottom: {
            default: "Left Bottom"
        },
        inactive: {
            default: false
        },
        iconVisible: {
            default: false
        }
    }
};
</script>

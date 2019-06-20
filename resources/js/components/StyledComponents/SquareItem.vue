<template>
    <div class="cursor-pointer">
        <div class="flex flex-col justify-between text-center px-4 py-6 h-32 sm:h-36 bg-gray-600 rounded rounded-lg hover:bg-gray-800 cursor-pointer">
            <span class="text-base font-medium text-gray-100">{{ title }}</span>
            <span class="text-xs text-gray-100">{{ bottomTitle }}</span>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        title: {
            default: "Square item"
        },
        bottomTitle: {
            default: "Bottom title"
        }
    }
}
</script>

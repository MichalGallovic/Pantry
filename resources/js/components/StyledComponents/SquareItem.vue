<template>
    <div class="cursor-pointer">
        <div class="flex flex-col justify-between px-4 py-6 h-32 sm:h-36 bg-gray-600 rounded rounded-lg hover:bg-gray-800 cursor-pointer">
            <div class="flex flex-col items-start">
                <span class="text-base font-medium text-gray-100">{{ title }}</span>
                <span class="text-xs uppercase font-medium text-gray-300">{{ subTitle }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-xs text-gray-100">{{ bottomLeft }}</span>
                <span class="text-xs text-gray-100 font-medium">{{ bottomRight }}</span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['title', 'subTitle', 'bottomLeft', 'bottomRight']
}
</script>

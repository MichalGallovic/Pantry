<template>
    <div class="container mx-auto">
        <SiteHeader></SiteHeader>
        <main class="p-4 sm:px-8 sm:py-4">
            <router-view></router-view>
        </main>
    </div>
</template>

<script>
import SiteHeader from './SiteHeader';

export default {
    components: {
        SiteHeader
    }
};
</script>

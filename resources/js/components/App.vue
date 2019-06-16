<template>
    <div class="container mx-auto p-4 sm:p-8">
        <SiteHeader></SiteHeader>
        <main class="mt-4 md:mt-6">
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

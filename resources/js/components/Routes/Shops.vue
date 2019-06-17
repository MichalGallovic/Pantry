<template>
    <section>
        <div class="flex justify-between">
            <Heading text="Shops"></Heading>
            <SearchBar></SearchBar>
        </div>
    </section>
</template>

<script>
import Heading from '../Heading';
import SearchBar from '../SearchBar';

export default {
    components: {
        Heading,
        SearchBar
    }
};
</script>

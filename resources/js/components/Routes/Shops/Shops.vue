<template>
    <section>
        <div class="flex">
            <Heading>Shops</Heading>
            <router-link :to="{ name: 'shops:create' }">
                <PlusButton></PlusButton>
            </router-link>
            <SearchBar class="ml-auto"></SearchBar>
        </div>
    </section>
</template>

<script>
import Heading from '../../StyledComponents/Heading';
import SearchBar from '../../SearchBar';
import PlusButton from '../../StyledComponents/PlusButton';

export default {
    components: {
        Heading,
        SearchBar,
        PlusButton
    }
};
</script>

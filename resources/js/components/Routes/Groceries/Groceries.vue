<template>
    <section>
        <div class="flex">
            <Heading>Groceries</Heading>
            <router-link :to="{ name: 'groceries:create' }">
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
        PlusButton,
        SearchBar
    }
};
</script>
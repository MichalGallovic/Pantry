<template>
    <section>
        <div class="flex">
            <Heading>Shopping lists</Heading>
            <router-link :to="{ name: 'shopping-lists.create' }">
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

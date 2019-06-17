<template>
    <section>
        <div class="flex justify-between">
            <Heading text="Shopping list"></Heading>
        </div>
        <ul class="mt-2 sm:mt-4">
            <ListItem></ListItem>
            <ListItem :inactive="true"></ListItem>
            <ListItem></ListItem>
        </ul>
    </section>
</template>

<script>
import Heading from '../Heading';
import SearchBar from '../SearchBar';
import ListItem from '../ListItem';

export default {
    components: {
        Heading,
        SearchBar,
        ListItem
    }
};
</script>

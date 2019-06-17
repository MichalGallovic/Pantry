<template>
    <section>
        <div class="flex justify-between">
            <Heading text="Recipes"></Heading>
            <SearchBar class="ml-4"></SearchBar>
        </div>
        <div class="flex flex-col sm:flex-row sm:flex-wrap sm:-mx-2">
            <Card
                    heading="Vlašské orechy"
                    sub-heading="400g"
                    left-bottom="4.2 eura"
                    icon-visible="true"
            ></Card>
            <Card></Card>
            <Card></Card>
            <Card></Card>
            <Card :inactive="true"></Card>
            <Card></Card>
        </div>
    </section>
</template>

<script>
import Heading from '../Heading';
import SearchBar from '../SearchBar';
import Card from '../Card';

export default {
    components: {
        Heading,
        SearchBar,
        Card
    }
};
</script>

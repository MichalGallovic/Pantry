<template>
    <section>
        <div class="flex justify-between">
            <Heading text="Fridge"></Heading>
            <SearchBar class="ml-4"></SearchBar>
        </div>
        <div class="flex flex-row flex-wrap -mx-2">
            <SquareItem></SquareItem>
            <SquareItem></SquareItem>
            <SquareItem></SquareItem>
            <SquareItem></SquareItem>
            <SquareItem></SquareItem>
            <SquareItem></SquareItem>
            <SquareItem></SquareItem>
        </div>
    </section>
</template>

<script>
import SearchBar from './SearchBar';
import SquareItem from './SquareItem';
import Heading from './Heading';

export default {
    components: {
        Heading,
        SearchBar,
        SquareItem
    }
};
</script>

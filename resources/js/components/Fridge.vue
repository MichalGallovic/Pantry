<template>
    <section>
        <div class="flex justify-between">
            <h1 class="text-3xl font-bold text-gray-800">Fridge</h1>
            <SearchBar></SearchBar>
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
import Card from './Card';
import SearchBar from './SearchBar';

export default {
    components: {
        Card,
        SearchBar
    }
};
</script>

<template>
    <section>
        <div class="flex justify-between">
            <Heading text="Fridge"></Heading>
            <SearchBar class="ml-4"></SearchBar>
        </div>
        <div class="flex flex-row flex-wrap -mx-2">
            <GridSquareItem v-for="i in 10" :key="i" @click.native="item = i"></GridSquareItem>
        </div>
        <Modal v-if="item" @modal:close="item = null"></Modal>
    </section>
</template>

<script>
import SearchBar from './SearchBar';
import GridSquareItem from './StyledComponents/GridSquareItem';
import Heading from './StyledComponents/Heading';
import Modal from './StyledComponents/Modal';

export default {
    components: {
        Heading,
        SearchBar,
        GridSquareItem,
        Modal
    },
    data() {
        return {
            item: null
        }
    }
};
</script>

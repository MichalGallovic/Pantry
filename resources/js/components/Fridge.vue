<template>
    <section>
        <div class="flex justify-between">
            <Heading text="Fridge"></Heading>
            <SearchBar class="ml-4"></SearchBar>
        </div>
        <div class="flex flex-row flex-wrap -mx-2">
            <SquareItem v-for="i in 10" :key="i" @click.native="item = i">
            </SquareItem>
        </div>
        <Modal v-if="item" @modal:close="item = null"></Modal>
    </section>
</template>

<script>
import SearchBar from './SearchBar';
import SquareItem from './SquareItem';
import Heading from './Heading';
import Modal from './Modal';

export default {
    components: {
        Heading,
        SearchBar,
        SquareItem,
        Modal
    },
    data() {
        return {
            item: null
        }
    }
};
</script>

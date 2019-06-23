<template>
    <section>
        <div class="flex justify-between">
            <Heading>Fridge</Heading>
            <SearchBar class="ml-4"></SearchBar>
        </div>
        <SquareGrid>
            <SquareItem v-for="i in 10" :key="i" @click.native="item = i"></SquareItem>
        </SquareGrid>

        <Modal v-if="item" @modal:close="item = null"></Modal>
    </section>
</template>

<script>
import SearchBar from './SearchBar';
import SquareGrid from './StyledComponents/SquareGrid';
import SquareItem from './StyledComponents/SquareItem';
import Heading from './StyledComponents/Heading';
import Modal from './StyledComponents/Modals/Modal';

export default {
    components: {
        Heading,
        SearchBar,
        SquareGrid,
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

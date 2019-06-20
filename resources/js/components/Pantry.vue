<template>
    <section>
        <Heading text="Pantry"></Heading>
        <div class="flex flex-row flex-wrap -mx-2">
            <GridSquareItem v-for="i in 5" :key="i"></GridSquareItem>
        </div>
    </section>
</template>

<script>
import GridSquareItem from './StyledComponents/GridSquareItem';
import Heading from './StyledComponents/Heading';

export default {
    components: {
        GridSquareItem,
        Heading
    }
};
</script>

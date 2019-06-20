<template>
    <section>
        <Heading>Pantry</Heading>
        <SquareGrid>
            <SquareItem v-for="i in 5" :key="i" ></SquareItem>
        </SquareGrid>
    </section>
</template>

<script>
import SquareGrid from './StyledComponents/SquareGrid';
import SquareItem from './StyledComponents/SquareItem';
import Heading from './StyledComponents/Heading';

export default {
    components: {
        SquareGrid,
        SquareItem,
        Heading
    }
};
</script>

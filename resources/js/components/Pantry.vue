<template>
    <section>
        <Heading text="Pantry"></Heading>
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
import SquareItem from './SquareItem';
import Heading from './Heading';

export default {
    components: {
        SquareItem,
        Heading
    }
};
</script>

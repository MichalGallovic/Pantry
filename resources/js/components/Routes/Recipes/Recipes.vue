<template>
    <section>
        <div class="flex">
            <Heading>Recipes</Heading>
            <router-link :to="{ name: 'recipes.create' }">
                <PlusButton></PlusButton>
            </router-link>
            <SearchBar class="ml-auto"></SearchBar>
        </div>
        <CardGrid>
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
        </CardGrid>
    </section>
</template>

<script>
import Heading from '../../StyledComponents/Heading';
import PlusButton from '../../StyledComponents/Buttons/PlusButton';
import SearchBar from '../../SearchBar';
import CardGrid from '../../StyledComponents/CardGrid';
import Card from '../../StyledComponents/Card';

export default {
    components: {
        Heading,
        PlusButton,
        SearchBar,
        CardGrid,
        Card
    }
};
</script>

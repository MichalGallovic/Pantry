<template>
    <section>
        <Heading text="Shopping list"></Heading>
        <div class="flex">
            <SearchBar></SearchBar>
            <Button class="w-10 flex-none ml-2"><i class="fa fa-plus text-gray-100"></i></Button>
        </div>
        <ul class="mt-2 sm:mt-4">
            <ListItem></ListItem>
            <ListItem :inactive="true"></ListItem>
            <ListItem></ListItem>
        </ul>
    </section>
</template>

<script>
import Heading from '../StyledComponents/Heading';
import SearchBar from '../SearchBar';
import ListItem from '../StyledComponents/ListItem';
import Button from '../StyledComponents/Button';

export default {
    components: {
        Heading,
        SearchBar,
        Button,
        ListItem
    }
};
</script>

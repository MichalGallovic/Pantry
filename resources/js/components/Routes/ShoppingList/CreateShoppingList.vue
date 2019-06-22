<template>
    <section>
        <Heading>Create shopping list</Heading>
        <div class="flex">
            <SearchBar></SearchBar>
            <Button class="flex-none ml-2"><i class="fa fa-plus text-gray-100"></i></Button>
        </div>

        <ul class="mt-2 sm:mt-4">
            <Draggable>
                <ListItem v-for="i in 4" :key="i" class="sm:w-1/2 lg:w-1/3 xl:w-1/4 mt-2"></ListItem>
            </Draggable>
        </ul>
    </section>
</template>

<script>
import Heading from '../../StyledComponents/Heading';
import SearchBar from '../../SearchBar';
import ListItem from '../../StyledComponents/ListItem';
import Button from '../../StyledComponents/Button';
import Draggable from 'vuedraggable';

export default {
    components: {
        Heading,
        SearchBar,
        Button,
        ListItem,
        Draggable
    }
};
</script>

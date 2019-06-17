<template>
    <section>
        <Heading text="Shopping list"></Heading>
        <div class="flex">
            <SearchBar></SearchBar>
            <button class="w-10 flex-none text-center bg-gray-600 rounded rounded-lg ml-2">
                <i class="fa fa-plus text-gray-100"></i>
            </button>
        </div>
        <ul class="mt-2 sm:mt-4">
            <ListItem></ListItem>
            <ListItem :inactive="true"></ListItem>
            <ListItem></ListItem>
        </ul>
    </section>
</template>

<script>
import Heading from '../Heading';
import SearchBar from '../SearchBar';
import ListItem from '../ListItem';

export default {
    components: {
        Heading,
        SearchBar,
        ListItem
    }
};
</script>

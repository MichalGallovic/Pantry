<template>
    <section>
        <Heading>Create shopping list</Heading>
        <div class="flex flex-col mt-4 w-1/3">
            <GroceriesAutoComplete @select="add"></GroceriesAutoComplete>
            <InteractiveListItem
                v-for="item in items"
                :key="item.id"
                :value="item"
                :text="item.text"
                @delete="remove"
                class="w-full mt-2">
            </InteractiveListItem>
        </div>
    </section>
</template>

<script>
import Heading from '../../StyledComponents/Heading';
import SearchBar from '../../SearchBar';
import ListItem from '../../StyledComponents/ListItem/InteractiveListItem';
import Button from '../../StyledComponents/Buttons/Button';
import Draggable from 'vuedraggable';
import InteractiveListItem from '../../StyledComponents/ListItem/InteractiveListItem';
import GroceriesAutoComplete from '../../AutoComplete/GroceriesAutoComplete';

export default {
    components: {
        Heading,
        SearchBar,
        Button,
        ListItem,
        Draggable,
        InteractiveListItem,
        GroceriesAutoComplete
    },
    data () {
        return {
            groceries: [],
            items: []
        }
    },
    methods: {
        add (selectedItem) {
            if (this.items.some((item) => item.id === selectedItem.id)) {
                return;
            }

            this.items.push(selectedItem);
        },
        remove (removedItem) {
            this.items = this.items.filter(item => {
                return item.id !== removedItem.id;
            });
        }
    }
};
</script>

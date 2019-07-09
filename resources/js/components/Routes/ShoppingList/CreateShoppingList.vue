<template>
    <section>
        <Heading>Add shopping list</Heading>
        <div class="mt-4 flex flex-col sm:flex-row">
            <div class="flex flex-col sm:w-1/2">
                <div class="w-full">
                    <Label class="block">Shopping list name</Label>
                    <Error v-for="(error, i) in errorMessages.name" :error="error" :key="i"></Error>
                    <TextInput
                            v-model="shoppingListName"
                            :errors="errorMessages.name"
                            class="mt-2 w-full block"
                            placeholder="Strawberries">
                    </TextInput>
                    <div class="mt-4 text-right">
                        <router-link :to="{ name: 'shopping-lists' }"><Button class="text-gray-600">Cancel</Button></router-link>
                        <Button @click.native="create" class="btn-grey" type="submit">Save</Button>
                    </div>
                </div>
            </div>
            <div class="flex flex-col sm:w-1/2 mt-4 sm:mt-0 sm:ml-4">
                <div class="w-full lg:w-2/3">
                    <Label class="block">Shopping list items</Label>
                    <Error v-for="(error, i) in errorMessages.items" :error="error" :key="i"></Error>
                    <ShoppingListAutoComplete class="mt-2" @select="add"></ShoppingListAutoComplete>
                    <Draggable v-model="items">
                        <InteractiveListItem
                                v-for="item in items"
                                :key="item.id"
                                :value="item"
                                :text="item.text"
                                @delete="remove"
                                class="w-full mt-2">
                        </InteractiveListItem>
                    </Draggable>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import Heading from '../../StyledComponents/Heading';
import SearchBar from '../../SearchBar';
import ListItem from '../../StyledComponents/ListItem/InteractiveListItem';
import Button from '../../StyledComponents/Buttons/Button';
import Draggable from 'vuedraggable';
import Label from '../../StyledComponents/Form/Label';
import TextInput from '../../StyledComponents/Form/TextInput';
import InteractiveListItem from '../../StyledComponents/ListItem/InteractiveListItem';
import ShoppingListAutoComplete from '../../AutoComplete/ShoppingListAutoComplete';
import WithFormHandling from '../../Mixins/WithFormHandling';
import Error from '../../StyledComponents/Form/WithErrors/Error';

import { RepositoryFactory } from "../../../Repositories/RepositoryFactory";
const ShoppingListRepository = RepositoryFactory.get('shoppingList');

export default {
    mixins: [WithFormHandling],
    components: {
        Heading,
        SearchBar,
        Button,
        ListItem,
        Draggable,
        Label,
        TextInput,
        InteractiveListItem,
        ShoppingListAutoComplete,
        Error
    },
    data () {
        return {
            shoppingListName: null,
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
        },
        async create () {
            try {
                await ShoppingListRepository.create({
                    name: this.shoppingListName,
                    items: this.mapItems(this.items)
                });
                this.$router.push({ name: 'shopping-lists'});
            } catch (error) {
                this.handleErrors(error);
            }
        },
        mapItems (items) {
            return items.map((item, index) => {
                let shoppingListItem = {
                    order: index
                };

                if (item.hasOwnProperty('grocery_id')) {
                    shoppingListItem['grocery_id'] = item.grocery_id;
                } else {
                    shoppingListItem['name'] = item.text;
                }

                return shoppingListItem;
            });
        }
    }
};
</script>

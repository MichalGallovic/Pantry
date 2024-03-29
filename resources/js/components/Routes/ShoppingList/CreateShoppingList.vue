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
                    <ShoppingListItems v-model="items" class="mt-2"></ShoppingListItems>
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
import Label from '../../StyledComponents/Form/Label';
import TextInput from '../../StyledComponents/Form/TextInput';
import ShoppingListItems from './ShoppingListItems';
import WithFormHandling from '../../Mixins/WithFormHandling';
import Error from '../../StyledComponents/Form/WithErrors/Error';
import WithShoppingLists from '../../Mixins/WithShoppingLists';

import { RepositoryFactory } from "../../../Repositories/RepositoryFactory";
const ShoppingListRepository = RepositoryFactory.get('shoppingList');

export default {
    mixins: [WithFormHandling, WithShoppingLists],
    components: {
        Heading,
        SearchBar,
        Button,
        ListItem,
        Label,
        TextInput,
        Error,
        ShoppingListItems
    },
    data () {
        return {
            shoppingListName: null,
            items: []
        }
    },
    methods: {
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
        }
    }
};
</script>

<template>
    <section v-if="shoppingList">
        <Heading>Edit shopping list</Heading>
        <div class="mt-4 flex flex-col sm:flex-row">
            <div class="flex flex-col sm:w-1/2">
                <div class="w-full">
                    <Label class="block">Shopping list name</Label>
                    <Error v-for="(error, i) in errorMessages.name" :error="error" :key="i"></Error>
                    <TextInput
                            v-model="shoppingList.name"
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
                    <ShoppingListItems v-model="shoppingList.items" class="mt-2"></ShoppingListItems>
                </div>
            </div>
        </div>
    </section>
    <section v-else>
        <Loading>Loading shopping list ...</Loading>
    </section>
</template>

<script>
import Loading from '../../Loading';
import Heading from '../../StyledComponents/Heading';
import Label from '../../StyledComponents/Form/Label';
import TextInput from '../../StyledComponents/Form/TextInput';
import Button from '../../StyledComponents/Buttons/Button';
import Error from '../../StyledComponents/Form/WithErrors/Error';
import ShoppingListItems from './ShoppingListItems';
import WithFormatShoppingListItem from '../../Mixins/WithFormatShoppingListItem';
import WithFormHandling from '../../Mixins/WithFormHandling';
import WithShoppingLists from '../../Mixins/WithShoppingLists';

import { RepositoryFactory } from "../../../Repositories/RepositoryFactory";
const ShoppingListRepository = RepositoryFactory.get('shoppingList');

export default {
    props: ['id'],
    mixins: [WithFormHandling, WithShoppingLists],
    components: {
        Loading,
        Heading,
        Label,
        TextInput,
        Button,
        Error,
        ShoppingListItems
    },
    data () {
        return {
            shoppingList: null
        }
    },
    created () {
        this.fetchShoppingList();
    },
    methods: {
        ...WithFormatShoppingListItem,
        async fetchShoppingList () {
            let { data } = await ShoppingListRepository.find(this.id, ['items-with-groceries'], []);
            data.items = data.items.sort((a, b) => a.order - b.order);

            data.items = data.items.map(item => {
                return {
                    id: this.hasGrocery(item) ? this.makeGroceryId(item.grocery_id) : this.makeTextItemId(item.name),
                    text: this.formatItemName(item)
                }
            });
            this.shoppingList = data;
        },
        async create () {
            try {

                await ShoppingListRepository.updateName(this.id, this.shoppingList.name);
                await ShoppingListRepository.updateItems(this.id, this.mapItems(this.shoppingList.items));
                this.$router.push({ name: 'shopping-lists.show', params: { id: this.shoppingList.id }});
            } catch (error) {
                this.handleErrors(error);
            }
        }
    }
};
</script>

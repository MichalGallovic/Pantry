<template>
    <section v-if="shoppingList">
        <Heading>Shopping list detail</Heading>
        <div class="flex flex-wrap mt-4">
            <div class="w-full md:w-1/2">
                <Card
                    :heading="shoppingList.name"
                    :sub-heading="formatItemsCount(shoppingList.items_count)"
                ></Card>
                <div class="mt-4">
                    <!--<router-link :to="{ name: 'shops.edit', params: { id: shop.id } }"><Button class="btn-grey">Edit</Button></router-link>-->
                    <Button class="text-gray-600" @click.native="askQuestion = true">Delete</Button>
                </div>
            </div>
            <div class="w-full md:w-1/2">
                <TextLabel>Shopping list items</TextLabel>
                <ul class="w-full lg:w-2/3">
                    <Draggable
                        v-model="shoppingList.items"
                        @change="reorderItems"
                        >
                        <InteractiveListItem
                            v-for="(item, index) in shoppingList.items"
                            :text="formatItemName(item)"
                            :key="index"
                            :value="index"
                            :checkbox="true"
                            :inactive="item.completed"
                            @toggle="toggle(index)"
                            @remove='remove'
                            class="mt-2"
                        >
                        </InteractiveListItem>
                    </Draggable>
                </ul>
            </div>
        </div>

        <DeleteDialog v-if="askQuestion" @cancel="askQuestion = false" @confirm="deleteShoppingList">
            <template #header>Delete {{ shoppingList.name }}</template>
            <template #body>
                Do you really wish to <strong>delete shopping list</strong> ?
            </template>
        </DeleteDialog>
    </section>
    <section v-else>
        <Loading>Loading shopping list ...</Loading>
    </section>
</template>

<script>
import Loading from '../../Loading';
import Heading from '../../StyledComponents/Heading';
import Card from '../../StyledComponents/Card';
import TextLabel from '../../StyledComponents/Form/TextLabel';
import InteractiveListItem from "../../StyledComponents/ListItem/InteractiveListItem";
import Draggable from 'vuedraggable';
import WithFormatShoppingList from '../../Mixins/WithFormatShoppingList';
import WithFormatShoppingListItem from '../../Mixins/WithFormatShoppingListItem';
import DeleteDialog from '../../StyledComponents/Modals/DeleteDialog';
import Button from '../../StyledComponents/Buttons/Button';
import { RepositoryFactory } from "../../../Repositories/RepositoryFactory";

const ShoppingListRepository = RepositoryFactory.get('shoppingList');
const ShoppingListItemRepository = RepositoryFactory.get('shoppingListItem');

export default {
    props: ['id'],
    components: {
        InteractiveListItem,
        Loading,
        Heading,
        Card,
        TextLabel,
        Draggable,
        DeleteDialog,
        Button
    },
    data () {
        return {
            shoppingList: null,
            askQuestion: false
        }
    },
    created () {
        this.fetchShoppingList();
    },
    methods: {
        ...WithFormatShoppingList,
        ...WithFormatShoppingListItem,
        getItemByIndex (itemIndex) {
            return this.shoppingList.items[itemIndex];
        },
        async fetchShoppingList () {
            let { data } = await ShoppingListRepository.find(this.id);
            data.items = data.items.sort((a, b) => a.order - b.order);
            this.shoppingList = data;
        },
        async toggle (itemIndex) {
            const item = this.getItemByIndex(itemIndex);

            try {
                await ShoppingListItemRepository.update(item.id, { completed: !item.completed});
                this.shoppingList.items[itemIndex].completed = !item.completed;
            } catch (error) {
                // @TODO Handle errors ...
                // Maybe add some growl-like notifications ?
            }
        },
        async remove (itemIndex) {
            const item = this.getItemByIndex(itemIndex);

            try {
                await ShoppingListItemRepository.delete(item.id);
                this.fetchShoppingList();
            } catch (error) {
                // @TODO Handle errors ...
                // Maybe add some growl-like notifications ?
            }
        },
        async reorderItems () {
            const itemsOrder = this.shoppingList.items.map((item, index) => {
                return {
                    id: item.id,
                    order: index
                };
            });

            await ShoppingListItemRepository.updateOrder(itemsOrder);
            this.fetchShoppingList();
        },
        async deleteShoppingList () {
            try {
                await ShoppingListRepository.delete(this.id);
                this.$router.push({ name: 'shopping-lists'});
            } catch (error) {
                // @TODO Handle errors ...
                // Maybe add some growl-like notifications ?
            }
        }
    }
};
</script>

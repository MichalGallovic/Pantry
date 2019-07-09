<template>
    <section>
        <div class="flex">
            <Heading>Shopping lists</Heading>
            <router-link :to="{ name: 'shopping-lists.create' }">
                <PlusButton></PlusButton>
            </router-link>
        </div>
        <div class="mt-2 sm:mt-4">
            <Loading v-if="isLoading">Loading shopping lists ...</Loading>
            <CardGrid>
                <router-link
                    :to="{ name: 'shopping-lists.show', params: { 'id': shoppingList.id} }"
                    v-for="shoppingList in shoppingLists"
                    :key="shoppingList.id"
                >
                    <Card
                        :heading="shoppingList.name"
                        :sub-heading="formatItemsCount(shoppingList.items_count)"
                    ></Card>
                </router-link>
            </CardGrid>
        </div>
    </section>
</template>

<script>
import Heading from '../../StyledComponents/Heading';
import SearchBar from '../../SearchBar';
import PlusButton from '../../StyledComponents/Buttons/PlusButton';
import Loading from '../../Loading';
import CardGrid from '../../StyledComponents/CardGrid';
import Card from '../../StyledComponents/Card';
import WithFormatShoppingList from '../../Mixins/WithFormatShoppingList';

import { RepositoryFactory } from "../../../Repositories/RepositoryFactory";
const ShoppingListRepository = RepositoryFactory.get('shoppingList');

export default {
    components: {
        Heading,
        PlusButton,
        SearchBar,
        Loading,
        CardGrid,
        Card
    },
    data () {
        return {
            isLoading: false,
            shoppingLists: []
        }
    },
    created () {
        this.fetchShoppingLists();
    },
    methods: {
        ...WithFormatShoppingList,
        async fetchShoppingLists () {
            const { data } = await ShoppingListRepository.get();
            this.isLoading = false;
            this.shoppingLists = data;
        }
    }
};
</script>

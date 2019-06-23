<template>
    <section>
        <div class="flex">
            <Heading>Shops</Heading>
            <router-link :to="{ name: 'shops.create' }">
                <PlusButton></PlusButton>
            </router-link>
            <SearchBar class="ml-auto"></SearchBar>
        </div>
        <ul class="mt-2 sm:mt-4 sm:w-1/2 lg:w-1/3 xl:w-1/4">
            <Loading v-if="isLoading">Loading shops ...</Loading>
            <router-link
                v-for="shop in shops"
                :key="shop.id"
                :to="{ name: 'shops.show', params: { id: shop.id } }">
                <ListItem :text="shop.name" class="mt-2">
                </ListItem>
            </router-link>
        </ul>
    </section>
</template>

<script>
import Heading from '../../StyledComponents/Heading';
import SearchBar from '../../SearchBar';
import PlusButton from '../../StyledComponents/PlusButton';
import ListItem from '../../StyledComponents/ListItem/ListItem';
import Loading from '../../Loading';
import { RepositoryFactory } from "../../Repositories/RepositoryFactory";

const ShopRepository = RepositoryFactory.get('shop');

export default {
    components: {
        Heading,
        SearchBar,
        PlusButton,
        Loading,
        ListItem
    },
    data () {
        return {
            isLoading: false,
            shops: []
        }
    },
    created () {
        this.fetchShops();
    },
    methods: {
        async fetchShops () {
            const { data } = await ShopRepository.get();
            this.isLoading = false;
            this.shops = data;
        }
    }
};
</script>

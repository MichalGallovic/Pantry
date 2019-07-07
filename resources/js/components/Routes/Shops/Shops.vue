<template>
    <section>
        <div class="flex">
            <Heading>Shops</Heading>
            <router-link :to="{ name: 'shops.create' }">
                <PlusButton></PlusButton>
            </router-link>
        </div>
        <div class="mt-2 sm:mt-4">
            <Loading v-if="isLoading">Loading shops ...</Loading>
            <CardGrid>
                <router-link
                    :to="{ name: 'shops.show', params: { 'id': shop.id} }"
                    v-for="shop in shops"
                    :key="shop.id"
                >
                    <Card
                        :heading="shop.name"
                        :sub-heading="formatShopGroceries(shop.groceries_count)"
                    ></Card>
                </router-link>
            </CardGrid>
        </div>
    </section>
</template>

<script>
import Heading from '../../StyledComponents/Heading';
import PlusButton from '../../StyledComponents/Buttons/PlusButton';
import Loading from '../../Loading';
import CardGrid from '../../StyledComponents/CardGrid';
import Card from '../../StyledComponents/Card';
import WithFormatShops from '../../Mixins/WithFormatShops';
import { RepositoryFactory } from "../../../Repositories/RepositoryFactory";

const ShopRepository = RepositoryFactory.get('shop');

export default {
    mixins: [WithFormatShops],
    components: {
        Heading,
        PlusButton,
        Loading,
        CardGrid,
        Card
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

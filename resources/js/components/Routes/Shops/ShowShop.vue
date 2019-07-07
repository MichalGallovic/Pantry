<template>
    <section v-if="shop">
        <Heading>Shop detail</Heading>
        <div class="flex flex-wrap mt-4">
            <div class="w-full md:w-1/2">
                <Card
                    class="w-64"
                    :heading="shop.name"
                    :sub-heading="formatShopGroceries(shop.groceries_count)"
                >
                </Card>
                <div class="mt-4">
                    <router-link :to="{ name: 'shops.edit', params: { id: shop.id } }"><Button class="btn-grey">Edit</Button></router-link>
                    <Button class="text-gray-600" @click.native="askQuestion = true">Delete</Button>
                </div>
            </div>
            <div class="w-full md:w-1/2">
                <TextLabel>Groceries of {{ shop.name }}</TextLabel>
                <div class="lg:w-2/3">
                    <SearchBar @change="searchGroceries" class="w-full"></SearchBar>
                    <div class="mt-2 w-full">
                        <router-link
                            v-for="grocery in groceries"
                            :key="grocery.id"
                            :to="{ name: 'groceries.show', params: { id: grocery.id } }"
                        >
                            <ListItem :text="grocery.name" class="w-full mt-2"></ListItem>
                        </router-link>
                    </div>
                    <Pagination
                        class="mt-4"
                        @change="newPage => currentPage = newPage"
                        :current-page="currentPage"
                        :last-page="lastPage"
                    ></Pagination>
                </div>
            </div>
        </div>

        <DeleteDialog v-if="askQuestion" @cancel="askQuestion = false" @confirm="deleteShop">
            <template #header>Delete {{ shop.name }}</template>
            <template #body>
                Do you really wish to <strong>delete shop</strong> and all of it's associated <strong>groceries</strong> ?
            </template>
        </DeleteDialog>
    </section>
    <section v-else>
        <Loading>Loading shop detail ...</Loading>
    </section>
</template>

<script>
import Heading from '../../StyledComponents/Heading';
import Loading from '../../Loading';
import Button from '../../StyledComponents/Buttons/Button';
import DeleteDialog from '../../StyledComponents/Modals/DeleteDialog';
import TextLabel from '../../StyledComponents/Form/TextLabel';
import ListItem from '../../StyledComponents/ListItem/ListItem';
import Card from '../../StyledComponents/Card';
import { RepositoryFactory } from "../../../Repositories/RepositoryFactory";
import SearchBar from "../../SearchBar";
import Pagination from '../../Pagination';
import WithPagination from '../../Mixins/WithPagination';
import WithFormatShops from '../../Mixins/WithFormatShops';

const ShopRepository = RepositoryFactory.get('shop');

export default {
    props: ['id'],
    mixins: [WithPagination, WithFormatShops],
    components: {
        SearchBar,
        Heading,
        Loading,
        Button,
        DeleteDialog,
        ListItem,
        TextLabel,
        Card,
        Pagination
    },
    data() {
        return {
            shop: null,
            groceries: [],
            query: null,
            askQuestion: false
        }
    },
    created() {
        this.fetchShop();
        this.searchGroceries();
    },
    methods: {
        async fetchShop() {
            const { data } = await ShopRepository.find(this.id);
            this.shop = data;
        },
        async deleteShop() {
            await ShopRepository.delete(this.id);
            this.$router.push({ name: 'shops'});
        },
        async searchGroceries(term, page = 1) {
            this.query = term;
            const { data, meta } = await ShopRepository.searchGroceries(this.id, term, page);
            this.groceries = data;
            this.setPagination(meta.current_page, meta.last_page)
        }
    },
    watch: {
        currentPage (newPage) {
            this.searchGroceries(this.query, newPage);
        }
    }
};
</script>

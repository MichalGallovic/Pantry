<template>
    <section v-if="shop">
        <Heading>Shop detail</Heading>
        <div class="flex flex-wrap mt-4">
            <div class="w-full md:w-1/2">
                <TextLabel class="block">Shop item</TextLabel>
                <Card class="w-64" :heading="shop.name"></Card>
                <div class="mt-4">
                    <router-link :to="{ name: 'shops.edit', params: { id: shop.id } }"><Button class="btn-grey">Edit</Button></router-link>
                    <Button class="text-gray-600" @click.native="askQuestion = true">Delete</Button>
                </div>
            </div>
            <div class="w-full md:w-1/2 mt-4">
                <TextLabel>Groceries from Shop</TextLabel>
                <div class="lg:w-2/3">
                    <SearchBar class="w-full"></SearchBar>
                    <div class="mt-2 w-full">
                        <ListItem></ListItem>
                        <ListItem v-for="grocery in shop.groceries" :key="grocery.id" class="w-full"></ListItem>
                    </div>
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
        <Loading>Loading shop detail ..</Loading>
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

const ShopRepository = RepositoryFactory.get('shop');

export default {
    props: ['id'],
    components: {
        SearchBar,
        Heading,
        Loading,
        Button,
        DeleteDialog,
        ListItem,
        TextLabel,
        Card
    },
    data() {
        return {
            isLoading: true,
            askQuestion: false,
            shop: null
        }
    },
    created() {
        this.fetchShop();
    },
    methods: {
        async fetchShop() {
            const { data } = await ShopRepository.find(this.id);
            this.isLoading = false;
            this.shop = data;
        },
        async deleteShop() {
            await ShopRepository.delete(this.id);
            this.$router.push({ name: 'shops'});
        }
    }
};
</script>

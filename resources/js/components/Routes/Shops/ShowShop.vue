<template>
    <section v-if="shop">
        <Heading>{{ shop.name }}</Heading>
        <Button class="btn-grey" @click.native="askQuestion = true">Delete</Button>
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
import Button from '../../StyledComponents/Button';
import DeleteDialog from '../../StyledComponents/Modals/DeleteDialog';
import { RepositoryFactory } from "../../Repositories/RepositoryFactory";

const ShopRepository = RepositoryFactory.get('shop');

export default {
    props: ['id'],
    components: {
        Heading,
        Loading,
        Button,
        DeleteDialog
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

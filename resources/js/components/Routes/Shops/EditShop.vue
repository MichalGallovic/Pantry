<template>
    <section>
        <Heading>Edit shop</Heading>
        <div v-if="shop" class="flex flex-wrap mt-4">
            <form class="w-full sm:w-1/2 sm:pr-8" @submit.prevent="update">
                <div>
                    <Label class="block">Shop name</Label>
                    <TextInput
                            v-model="shop.name"
                            :errors="errorMessages.name"
                            class="mt-2 w-full"
                            placeholder="Kaufland">
                    </TextInput>
                </div>
                <div class="mt-4 text-right">
                    <router-link :to="{ name: 'shops' }"><Button class="text-gray-600">Cancel</Button></router-link>
                    <Button class="btn-grey" type="submit">Save</Button>
                </div>
            </form>
            <div v-if="shop" class="hidden sm:block sm:w-1/2">
                <TextLabel class="block">Shop preview</TextLabel>
                <Card :heading="shop.name"></Card>
            </div>
        </div>
    </section>
</template>

<script>
import Heading from '../../StyledComponents/Heading';
import Label from '../../StyledComponents/Form/Label';
import TextInput from '../../StyledComponents/Form/WithErrors/TextInput';
import TextLabel from '../../StyledComponents/Form/TextLabel';
import SearchBar from '../../SearchBar';
import AddButton from '../../StyledComponents/Buttons/AddButton';
import Button from '../../StyledComponents/Buttons/Button';
import {RepositoryFactory} from "../../../Repositories/RepositoryFactory";
import FormHandling from '../../Mixins/WithFormHandling';
import ListItem from "../../StyledComponents/ListItem/ListItem";
import Card from '../../StyledComponents/Card';

const ShopRepository = RepositoryFactory.get('shop');

export default {
    mixins: [FormHandling],
    props: ['id'],
    components: {
        ListItem,
        Heading,
        Label,
        TextLabel,
        TextInput,
        AddButton,
        Button,
        SearchBar,
        Card
    },
    data () {
        return {
            shop: null,
            groceries: []
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
        async update() {
            try {
                await ShopRepository.update({ name: this.shop.name }, this.id);
                this.$router.push({ name: 'shops'});
            } catch (error) {
                this.handleErrors(error);
            }
        }
    }
};
</script>

<template>
    <section>
        <Heading>Add shop</Heading>
        <div class="flex flex-wrap mt-4">
            <form class="w-full sm:w-1/2" @submit.prevent="createShop">
                <div>
                    <Label class="block">Shop name</Label>
                    <TextInput
                        v-model="name"
                        :errors="errorMessages.name"
                        class="mt-2 w-full block"
                        placeholder="Kaufland">
                    </TextInput>
                </div>
                <div class="mt-2">
                    <TextLabel>Groceries</TextLabel>
                    <div class="flex w-full md:w-2/3">
                        <AutoComplete class="w-full"></AutoComplete>
                    </div>
                    <div class="mt-2 w-full md:w-2/3">
                        <ListItem v-for="grocery in groceries" :key="grocery.id" class="w-full"></ListItem>
                    </div>
                </div>
                <div class="mt-4">
                    <Button class="btn-grey" type="submit">Save</Button>
                </div>
            </form>
            <div class="hidden sm:block ml-8 mt-4">
                <TextLabel class="block">Shop preview</TextLabel>
                <Card :heading="name"></Card>
            </div>
        </div>
    </section>
</template>

<script>
import Heading from '../../StyledComponents/Heading';
import Label from '../../StyledComponents/Form/Label';
import TextInput from '../../StyledComponents/Form/WithErrors/TextInput';
import TextLabel from '../../StyledComponents/Form/TextLabel';
import AutoComplete from '../../AutoComplete';
import AddButton from '../../StyledComponents/Buttons/AddButton';
import Button from '../../StyledComponents/Buttons/Button';
import {RepositoryFactory} from "../../Repositories/RepositoryFactory";
import FormHandling from '../../Mixins/FormHandling';
import ListItem from "../../StyledComponents/ListItem/ListItem";
import Card from '../../StyledComponents/Card';

const ShopRepository = RepositoryFactory.get('shop');

export default {
    mixins: [FormHandling],
    components: {
        ListItem,
        Heading,
        Label,
        TextLabel,
        TextInput,
        AddButton,
        Button,
        AutoComplete,
        Card
    },
    data () {
        return {
            name: null,
            groceries: []
        }
    },
    methods: {
        async createShop() {

            try {
                await ShopRepository.createShop({
                    name: this.name
                });
                this.$router.push({ name: 'shops'});
            } catch (error) {
                this.handleErrors(error);
            }
        }
    }
};
</script>


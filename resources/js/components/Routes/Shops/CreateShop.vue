<template>
    <section>
        <div class="flex">
            <Heading>Add shop</Heading>
        </div>
        <div class="flex flex-wrap">
            <form class="mt-4 w-full sm:w-1/2" @submit.prevent="createShop">
                <div>
                    <Label class="block">Shop name</Label>
                    <TextInput
                        v-model="name"
                        :errors="errorMessages.name"
                        class="mt-2 w-full block"
                        placeholder="Kaufland">
                    </TextInput>
                </div>
                <div class="mt-4 text-right">
                    <Button class="btn-grey" type="submit">Save</Button>
                </div>
            </form>
        </div>
    </section>
</template>

<script>
import Heading from '../../StyledComponents/Heading';
import Label from '../../StyledComponents/Form/Label';
import TextInput from '../../StyledComponents/Form/WithErrors/TextInput';
import Button from '../../StyledComponents/Button';
import {RepositoryFactory} from "../../Repositories/RepositoryFactory";
import FormHandling from '../../Mixins/FormHandling';

const ShopRepository = RepositoryFactory.get('shop');

export default {
    mixins: [FormHandling],
    components: {
        Heading,
        Label,
        TextInput,
        Button
    },
    data () {
        return {
            name: null
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


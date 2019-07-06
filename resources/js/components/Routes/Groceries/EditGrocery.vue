<template>
    <section>
        <div class="flex">
            <Heading>Edit Grocery</Heading>
        </div>
        <div class="flex flex-wrap" v-if="grocery">
            <form class="mt-4 w-full sm:w-1/2" @submit.prevent="update">
                <div>
                    <Label class="block">Grocery name</Label>
                    <Error v-for="(error, i) in errorMessages.name" :error="error" :key="i"></Error>
                    <TextInput
                        v-model="grocery.name"
                        class="mt-2 w-full block"
                        placeholder="Vlašské orechy"
                    >
                    </TextInput>
                </div>
                <div class="mt-2">
                    <Label class="block">Expiration in days</Label>
                    <Error v-for="(error, i) in errorMessages.expiration_days" :error="error" :key="i"></Error>
                    <TextInput
                            v-model="grocery.expiration_days"
                            class="mt-2 w-1/2 block"
                            placeholder="30"
                    ></TextInput>
                </div>
                <div class="mt-2">
                    <Label class="block">Price</Label>
                    <Error v-for="(error, i) in errorMessages.price" :error="error" :key="i"></Error>
                    <TextInput
                            v-model="grocery.price"
                            class="mt-2 w-1/2 block"
                            placeholder="20">
                    </TextInput>
                </div>
                <div class="mt-2">
                    <Label class="block">Shop</Label>
                    <Error v-for="(error, i) in errorMessages.shop_id" :error="error" :key="i"></Error>
                    <SelectInput
                        v-model="grocery.shop_id"
                        :options="shops"
                        class="mt-2 w-full block"
                    ></SelectInput>
                </div>
                <div class="mt-2">
                    <Label class="block">Units</Label>
                    <div class="flex flex-col">
                        <div class="flex">
                            <div class="w-1/2">
                                <Error class="w-full" v-for="(error, i) in errorMessages.units" :error="error" :key="i"></Error>
                            </div>
                            <div class="w-1/2 ml-4">
                                <Error class="w-full" v-for="(error, i) in errorMessages.unit_type_id" :error="error" :key="i"></Error>
                            </div>
                        </div>
                        <div class="flex">
                            <TextInput class="mt-2 w-full" v-model="grocery.units"></TextInput>
                            <SelectInput class="mt-2 w-full ml-4" :options="unit_types" v-model="grocery.unit_type_id"></SelectInput>
                        </div>
                    </div>
                </div>
                <div class="mt-4 text-right">
                    <Button class="btn-grey" type="submit">Save</Button>
                    <router-link :to="{ name: 'groceries' }"><Button class="text-gray-600">Cancel</Button></router-link>
                </div>
            </form>
            <div class="hidden sm:block ml-8 mt-4">
                <TextLabel class="block">Grocery item preview</TextLabel>
                <SquareItem
                        class="mt-2 w-40"
                        :title="grocery.name"
                        :sub-title="shop.text"
                        :bottom-left="formatUnits(grocery.units, grocery.unit_type_id)"
                        :bottom-right="formatPrice(grocery.price)">
                </SquareItem>
            </div>
        </div>
    </section>
</template>

<script>
import Heading from '../../StyledComponents/Heading';
import Label from '../../StyledComponents/Form/Label';
import TextInput from '../../StyledComponents/Form/TextInput';
import SelectInput from '../../StyledComponents/Form/SelectInput';
import Error from '../../StyledComponents/Form/WithErrors/Error';
import SquareItem from '../../StyledComponents/SquareItem';
import TextLabel from '../../StyledComponents/Form/TextLabel';
import Button from '../../StyledComponents/Buttons/Button';
import FormHandling from '../../Mixins/WithFormHandling';
import FormatGroceries from '../../Mixins/WithFormatGroceries';
import FormatUnitTypes from '../../Mixins/WithFormatUnitTypes';
import Groceries from '../../Mixins/WithGroceries';

import { RepositoryFactory } from "../../../Repositories/RepositoryFactory";


const GroceryRepository = RepositoryFactory.get('grocery');

export default {
    props: ['id'],
    mixins: [FormHandling, FormatGroceries, FormatUnitTypes, Groceries],
    components: {
        Heading,
        Label,
        TextInput,
        Error,
        SelectInput,
        SquareItem,
        TextLabel,
        Button
    },
    created () {
        this.fetchShops();
        this.fetchUnitTypes();
        this.fetchGrocery();
    },
    data () {
        return {
            name: null,
            expiration_days: null,
            price: null,
            shop_id: null,
            units: null,
            unit_type_id: null,
        }
    },
    computed: {
        shop () {
            return this.shops.find(shop => {
                return shop.id == this.grocery.shop_id
            }) || {};
        },
    },
    methods: {
        async update () {
            try {
                await GroceryRepository.update(this.id, this.grocery);
                this.$router.push({ name: 'groceries'});
            } catch (error) {
                this.handleErrors(error);
            }
        }
    }
};
</script>

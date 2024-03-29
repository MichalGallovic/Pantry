<template>
    <section>
        <div class="flex">
            <Heading>Add Grocery</Heading>
        </div>
        <div class="flex flex-wrap mt-4">
            <form class="w-full sm:w-1/2" @submit.prevent="create">
                <div>
                    <Label class="block">Grocery name</Label>
                    <Error v-for="(error, i) in errorMessages.name" :error="error" :key="i"></Error>
                    <TextInput
                        v-model="name"
                        class="mt-2 w-full block"
                        placeholder="Vlašské orechy"
                    >
                    </TextInput>
                </div>
                <div class="mt-2">
                    <Label class="block">Expiration in days</Label>
                    <Error v-for="(error, i) in errorMessages.expiration_days" :error="error" :key="i"></Error>
                    <TextInput
                        v-model="expiration_days"
                        class="mt-2 w-1/2 block"
                        placeholder="30"
                    ></TextInput>
                </div>
                <div class="mt-2">
                    <Label class="block">Expiration after open in days</Label>
                    <Error v-for="(error, i) in errorMessages.after_open_days" :error="error" :key="i"></Error>
                    <TextInput
                        v-model="after_open_days"
                        class="mt-2 w-1/2 block"
                        placeholder="30"
                    ></TextInput>
                </div>
                <div class="mt-2">
                    <Label class="block">Price</Label>
                    <Error v-for="(error, i) in errorMessages.price" :error="error" :key="i"></Error>
                    <TextInput
                        v-model="price"
                        class="mt-2 w-1/2 block"
                        placeholder="20">
                    </TextInput>
                </div>
                <div class="mt-2">
                    <Label class="block">Shop</Label>
                    <Error v-for="(error, i) in errorMessages.shop_id" :error="error" :key="i"></Error>
                    <SelectInput
                        v-model="shop_id"
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
                            <TextInput class="mt-2 w-full" v-model="units"></TextInput>
                            <SelectInput class="mt-2 w-full ml-4" :options="unit_types" v-model="unit_type_id"></SelectInput>
                        </div>
                    </div>
                </div>
                <div class="mt-4 text-right">
                    <Button class="btn-grey" type="submit">Save</Button>
                </div>
            </form>
            <div class="hidden sm:block ml-8 mt-4">
                <TextLabel class="block">Grocery item preview</TextLabel>
                <SquareItem
                    class="mt-2 w-40"
                    :title="name"
                    :sub-title="shop.text"
                    :bottom-left="formatUnits(units, unit_type_id)"
                    :bottom-right="formatPrice(price)">
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
import WithFormHandling from '../../Mixins/WithFormHandling';
import WithFormatGroceries from '../../Mixins/WithFormatGroceries';
import WithFormatUnitTypes from '../../Mixins/WithFormatUnitTypes';
import WithGroceries from '../../Mixins/WithGroceries';

import { RepositoryFactory } from "../../../Repositories/RepositoryFactory";

const GroceryRepository = RepositoryFactory.get('grocery');

export default {
    mixins: [WithFormHandling, WithFormatGroceries, WithFormatUnitTypes, WithGroceries],
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
    computed: {
        shop () {
            return this.shops.find(shop => {
                return shop.id == this.shop_id
            }) || {};
        },
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
    created () {
        this.fetchShops();
        this.fetchUnitTypes();
    },
    methods: {
        async create() {
            try {
                await GroceryRepository.create({
                    name: this.name,
                    expiration_days: this.expiration_days,
                    after_open_days: this.after_open_days,
                    price: this.price,
                    shop_id: this.shop_id,
                    units: this.units,
                    unit_type_id: this.unit_type_id
                });
                this.$router.push({ name: 'groceries'});
            } catch (error) {
                this.handleErrors(error);
            }
        }
    }
};
</script>

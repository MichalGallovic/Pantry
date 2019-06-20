<template>
    <section>
        <div class="flex">
            <Heading>Add Groceries</Heading>
        </div>
        <div class="flex flex-wrap">
            <form class="mt-4 w-full sm:w-1/2">
                <div>
                    <Label class="block">Grocery name</Label>
                    <TextInput v-model="name" class="mt-2 w-full block" placeholder="Vlašské orechy"></TextInput>
                </div>
                <div class="mt-2">
                    <Label class="block">Expiration in days</Label>
                    <TextInput class="mt-2 w-1/2 block" placeholder="30"></TextInput>
                </div>
                <div class="mt-2">
                    <Label class="block">Price</Label>
                    <TextInput class="mt-2 w-1/2 block" placeholder="20"></TextInput>
                </div>
                <div class="mt-2">
                    <Label class="block">Shop</Label>
                    <SelectInput class="mt-2 w-full block" :options="shops"></SelectInput>
                </div>
                <div class="mt-2">
                    <Label class="block">Units</Label>
                    <div class="flex justify-between">
                        <TextInput class="mt-2 w-full" placeholder="20" v-model="units"></TextInput>
                        <SelectInput class="mt-2 w-full ml-4" :options="shops" v-model="unit_type"></SelectInput>
                    </div>
                </div>
                <div class="mt-4 text-right">
                    <Button type="submit">Save</Button>
                </div>
            </form>
            <div class="hidden sm:block ml-8 mt-4">
                <TextLabel class="block">Grocery item preview</TextLabel>
                <SquareItem
                    class="mt-2 w-40"
                    :title="formattedName"
                    :bottom-title="formattedUnits">
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
import SquareItem from '../../StyledComponents/SquareItem';
import TextLabel from '../../StyledComponents/TextLabel';
import Button from '../../StyledComponents/Button';

export default {
    components: {
        Heading,
        Label,
        TextInput,
        SelectInput,
        SquareItem,
        TextLabel,
        Button
    },
    computed: {
        formattedUnits () {
            if (this.units && this.unit_type) {
                return `${this.units} ${this.unit_type}`;
            }
        },
        formattedName () {
            if (this.name) {
                return this.name;
            }
        }
    },
    data () {
        return {
            name: null,
            expiration: null,
            price: null,
            shop: null,
            units: null,
            unit_type: null,
            shops: [{
                id: 1,
                value: 1,
                name: "Lidl"
            }, {
                id: 2,
                value: 2,
                name: "Kaufland"
            }]
        }
    }
};
</script>

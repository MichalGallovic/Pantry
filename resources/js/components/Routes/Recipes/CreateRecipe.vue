<template>
    <section>
        <div class="flex">
            <Heading>Add recipe</Heading>
        </div>
        <div class="flex flex-wrap">
            <form class="mt-4 w-full sm:w-1/2">
                <div>
                    <Label class="block">Recipe name</Label>
                    <TextInput v-model="name" class="mt-2 w-full block" placeholder="Waldorf salad"></TextInput>
                </div>
                <div class="mt-2">
                    <Label class="block">Servings</Label>
                    <TextInput class="mt-2 w-1/2 block" placeholder="2"></TextInput>
                </div>
                <div class="mt-2">
                    <Label class="block">Preparation time (in minutes)</Label>
                    <TextInput class="mt-2 w-1/2 block" placeholder="20"></TextInput>
                </div>
                <div class="mt-2">
                    <TextLabel>Potraviny</TextLabel>
                    <div class="flex">
                        <SearchBar class="w-full"></SearchBar>
                        <Button class="flex-none ml-2"><i class="fa fa-plus text-gray-100"></i></Button>
                    </div>
                </div>
                <ul class="mt-2">
                    <Draggable>
                        <div v-for="i in 4" :key="i" class="flex items-center mt-2 cursor-pointer">
                            <ListItem class="w-full"></ListItem>
                            <TextInput class="ml-4 w-16" :placeholder="null"></TextInput>
                            <span class="ml-2 self-end">ml</span>
                        </div>
                    </Draggable>
                </ul>
                <div class="mt-4 text-right">
                    <Button type="submit">Save</Button>
                </div>
            </form>
            <div class="hidden sm:block ml-8 mt-4">
                <TextLabel class="block">Grocery item preview</TextLabel>
                <Card
                        heading="Vlašské orechy"
                        sub-heading="400g"
                        left-bottom="4.2 eura"
                        icon-visible="true"
                ></Card>
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
import Card from '../../StyledComponents/Card';
import SearchBar from '../../SearchBar';
import ListItem from '../../StyledComponents/ListItem';
import Draggable from 'vuedraggable';

export default {
    components: {
        Heading,
        Label,
        TextInput,
        SelectInput,
        SquareItem,
        TextLabel,
        Button,
        Card,
        SearchBar,
        ListItem,
        Draggable
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

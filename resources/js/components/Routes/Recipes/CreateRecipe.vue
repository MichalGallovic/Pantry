<template>
    <section>
        <div class="flex">
            <Heading>Add recipe</Heading>
        </div>
        <div class="flex flex-wrap">
            <form class="mt-4 w-full sm:w-1/2" @submit.prevent="create">
                <div>
                    <Label class="block">Recipe name</Label>
                    <Error v-for="(error, i) in errorMessages.name" :error="error" :key="i"></Error>
                    <TextInput v-model="name" class="mt-2 w-full block" placeholder="Waldorf salad"></TextInput>
                </div>
                <div class="mt-2">
                    <Label class="block">Servings</Label>
                    <Error v-for="(error, i) in errorMessages.servings" :error="error" :key="i"></Error>
                    <TextInput v-model="servings" class="mt-2 w-1/2 block" placeholder="2"></TextInput>
                </div>
                <div class="mt-2">
                    <Label class="block">Preparation time (in minutes)</Label>
                    <Error v-for="(error, i) in errorMessages.preparation_minutes" :error="error" :key="i"></Error>
                    <TextInput v-model="preparation_minutes" class="mt-2 w-1/2 block" placeholder="20"></TextInput>
                </div>
                <div class="mt-2">
                    <TextLabel>Description</TextLabel>
                    <TextArea v-model="description" class="block w-full h-32 mt-2"></TextArea>
                </div>
                <div class="mt-4 text-right">
                    <Button class="btn-grey" type="submit">Save</Button>
                </div>
            </form>
            <div class="flex flex-col w-full sm:w-1/2">
                <div class="hidden sm:block ml-8 mt-4">
                    <TextLabel class="block">Grocery item preview</TextLabel>
                    <Card
                        :heading="name"
                        :left-bottom="price"
                        icon-visible="false"
                    ></Card>
                </div>
                <div class="ml-8 mt-4">
                    <TextLabel class="block">Groceries</TextLabel>
                    <Error v-for="(error, i) in errorMessages.groceries" :error="error" :key="i"></Error>
                    <RecipeGroceryItems v-model="groceries"></RecipeGroceryItems>
                </div>
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
import TextLabel from '../../StyledComponents/Form/TextLabel';
import Button from '../../StyledComponents/Buttons/Button';
import Card from '../../StyledComponents/Card';
import TextArea from '../../StyledComponents/Form/TextArea';
import RecipeGroceryItems from './RecipeGroceryItems';
import WithFormatGroceries from '../../Mixins/WithFormatGroceries';
import WithFormHandling from '../../Mixins/WithFormHandling'
import Error from '../../StyledComponents/Form/WithErrors/Error';

import { RepositoryFactory } from "../../../Repositories/RepositoryFactory";
const RecipeRepository = RepositoryFactory.get('recipe');

export default {
    mixins: [WithFormHandling, WithFormatGroceries],
    components: {
        Heading,
        Label,
        TextInput,
        SelectInput,
        SquareItem,
        TextLabel,
        Button,
        Card,
        TextArea,
        RecipeGroceryItems,
        Error
    },
    computed: {
        price () {
            const price = this.groceries.reduce((carry, grocery) => {
                return carry + grocery.recipe_units / grocery.units;
            }, 0);

            return this.formatPrice(price.toFixed(2));
        }
    },
    data () {
        return {
            name: null,
            servings: null,
            preparation_minutes: null,
            description: null,
            groceries: []
        }
    },
    methods: {
        async create() {
            try {
                await RecipeRepository.create({
                    name: this.name,
                    servings: this.servings,
                    preparation_minutes: this.preparation_minutes,
                    description: this.description,
                    groceries: this.mapGroceriesForRecipe(this.groceries)
                });
                this.$router.push({ name: 'recipes'});
            } catch (error) {
                this.handleErrors(error);
            }
        },
        mapGroceriesForRecipe (groceries) {
            return groceries.map(grocery => {
                return {
                    grocery_id: grocery.grocery_id,
                    units: grocery.recipe_units
                };
            });
        }
    }
};
</script>

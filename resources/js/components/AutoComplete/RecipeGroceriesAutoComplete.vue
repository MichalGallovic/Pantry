<template>
    <div class="relative">
        <div class="flex">
            <SearchBar
                :value="query"
                @change="search"
                @focus="show"
                ref="searchBar"
                class="w-full"
            >
            </SearchBar>
        </div>
        <GroupedSuggestions
            v-show="suggestionsVisible"
            @click:outside="hide"
            @select="select"
            :suggestions="suggestionGroups"
            :loading="isLoading"
            :has-results="hasResults"
        ></GroupedSuggestions>
    </div>
</template>

<script>
import SearchBar from '../SearchBar';
import Draggable from 'vuedraggable';
import TextLabel from '../StyledComponents/Form/TextLabel';
import Button from '../StyledComponents/Buttons/Button';
import TextInput from '../StyledComponents/Form/TextInput';
import ShoppingListGroceriesAutoComplete from "./ShoppingListGroceriesAutoComplete";
import GroupedSuggestions from "./GroupedSuggestions";
import UnitType from '../../Utils/UnitType';

export default {
    extends: ShoppingListGroceriesAutoComplete,
    components: {
        GroupedSuggestions,
        SearchBar,
        Draggable,
        TextLabel,
        Button,
        TextInput
    },
    computed: {
        suggestionGroups () {
            let suggestions = [];

            if (this.suggestions.length > 0) {

                suggestions.push(
                    ...this.groupSuggestionsByShop(this.suggestions)
                );
            }

            return suggestions;
        }
    },
    methods: {
        mapGroceries (groceries) {
            return groceries.map((grocery) => {
                return {
                    id: this.makeGroceryId(grocery.id),
                    text: grocery.name,
                    small_text: `${grocery.units} ${UnitType.getNameById(grocery.unit_type_id)}`,
                    shop_name: grocery.shop.name,
                    grocery_id: grocery.id,
                    units: grocery.units,
                    recipe_units: grocery.units,
                    unit_type_id: grocery.unit_type_id
                };
            });
        },
    }
};
</script>

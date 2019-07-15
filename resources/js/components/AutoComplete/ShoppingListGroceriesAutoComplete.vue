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
            <AddButton @click.native="select(textItem)" class="flex-none ml-2"></AddButton>
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
import AutoComplete from './AutoComplete';
import GroupedSuggestions from './GroupedSuggestions';
import WithFormatShoppingListItem from '../Mixins/WithFormatShoppingListItem';
import groupBy from 'lodash/groupBy';
import map from 'lodash/map';
import UnitType from '../../Utils/UnitType';
import SearchBar from '../SearchBar';
import AddButton from '../StyledComponents/Buttons/AddButton';

import { RepositoryFactory } from "../../Repositories/RepositoryFactory";
const GroceryRepository = RepositoryFactory.get('grocery');

export default {
    extends: AutoComplete,
    components: {
        GroupedSuggestions,
        SearchBar,
        AddButton
    },
    data () {
        return {
            initialSuggestions: [],
            hasResults: null
        }
    },
    computed: {
        suggestionGroups () {
            let suggestions = [];

            if (this.query) {
                suggestions.push({
                    name: 'Shopping list note',
                    suggestions: [this.textItem]
                });
            }

            if (this.suggestions.length > 0) {

                suggestions.push(
                    ...this.groupSuggestionsByShop(this.suggestions)
                );
            }

            return suggestions;
        },
        textItem () {
            return {
                id: this.makeTextItemId(this.query),
                text: this.query
            }
        }
    },
    methods: {
        ...WithFormatShoppingListItem,
        select (item) {
            this.query = null;
            this.setSuggestions(this.initialSuggestions);

            this.$emit('select', item);
        },
        search (query) {
            this.query = query;
            this.searchGroceries(query);
        },
        beforeFirstShow () {
            this.fetchGroceries()
        },
        async searchGroceries (query) {
            if (query === null || query.length === 0) {
                this.setSuggestions(this.initialSuggestions);
                return;
            }

            this.isLoading = true;
            const { data } = await GroceryRepository.search(query);
            this.setSuggestions(this.mapGroceries(data));
            this.isLoading = false;
        },
        async fetchGroceries () {
            this.isLoading = true;
            const { data } = await GroceryRepository.paginate();
            this.initialSuggestions = this.mapGroceries(data);
            this.setSuggestions(this.initialSuggestions);
            this.isLoading = false;
        },
        setSuggestions (suggestions) {
            this.suggestions = suggestions;
            this.hasResults = suggestions.length > 0;
        },
        mapGroceries (groceries) {
            return groceries.map((grocery) => {
                return {
                    id: this.makeGroceryId(grocery.id),
                    text: grocery.name,
                    small_text: `${grocery.units} ${UnitType.getNameById(grocery.unit_type_id)}`,
                    shop_name: grocery.shop.name,
                    grocery_id: grocery.id
                };
            });
        },
        groupSuggestionsByShop (suggestions) {
            return map(groupBy(suggestions, 'shop_name'), (shopSuggestions, shopName) => {
                return {
                    name: `Groceries of ${shopName}`,
                    suggestions: shopSuggestions
                };
            });
        }
    }
};
</script>

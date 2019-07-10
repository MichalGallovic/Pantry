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
        <ShoppingListSuggestions
            v-show="suggestionsVisible"
            @click:outside="hide"
            @select="select"
            :suggestions="suggestionGroups"
            :loading="isLoading"
            :has-results="hasResults"
        ></ShoppingListSuggestions>
    </div>
</template>

<script>
import AutoComplete from './AutoComplete';
import ShoppingListSuggestions from './ShoppingListSuggestions';
import WithFormatShoppingListItem from '../Mixins/WithFormatShoppingListItem';
import { RepositoryFactory } from "../../Repositories/RepositoryFactory";

const GroceryRepository = RepositoryFactory.get('grocery');

export default {
    extends: AutoComplete,
    components: {
        ShoppingListSuggestions
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
                suggestions.push({
                    name: "Groceries",
                    suggestions: this.suggestions
                });
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
                    grocery_id: grocery.id
                }
            });
        }
    }
};
</script>

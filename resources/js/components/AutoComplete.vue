<template>
    <div class="relative">
        <div class="flex">
            <SearchBar
                class="w-full"
                @change="search"
                @focus="show"
                ref="searchBar"
            >
            </SearchBar>
            <AddButton class="flex-none ml-2"></AddButton>
        </div>
        <Suggestions
            v-show="suggestionsVisible"
            @click:outside="hide"
            @select="select"
            :suggestions="suggestions"
            :loading="isLoading"
        ></Suggestions>
        <InteractiveListItem
            v-for="item in items"
            :key="item.id"
            :text="item.text"
            @delete="deselect(item)"
            class="w-full mt-2">
        </InteractiveListItem>
    </div>
</template>

<script>
import SearchBar from './SearchBar';
import AddButton from './StyledComponents/Buttons/AddButton';
import Suggestions from './Suggestions';
import InteractiveListItem from './StyledComponents/ListItem/InteractiveListItem.vue';
import { RepositoryFactory } from "../Repositories/RepositoryFactory";

const GroceryRepository = RepositoryFactory.get('grocery');

export default {
    data () {
        return {
            query: '',
            suggestions: [{id: 1, text: "Sth"}, {id: 2, text: "Sth else"}],
            items: [],
            suggestionsVisible: false,
            isLoading: false,
            preFetched: false
        }
    },
    components: {
        SearchBar,
        AddButton,
        Suggestions,
        InteractiveListItem
    },
    methods: {
        select (suggestion) {
            this.items.push(suggestion);
            this.suggestionsVisible = false;
        },
        deselect (deselectedItem) {
            this.items = this.items.filter(item => {
                return item.id !== deselectedItem.id;
            });
        },
        mapGroceriesToSuggestions (groceries) {
            return groceries.map((grocery) => {
                return {
                    id: grocery.id,
                    text: grocery.name
                }
            });
        },
        async fetchGroceries () {
            const { data } = await GroceryRepository.paginate(5);
            this.suggestions = this.mapGroceriesToSuggestions(data);
        },
        async search (query) {
            const { data } = await GroceryRepository.search(query);
            this.suggestions = this.mapGroceriesToSuggestions(data);
        },
        show () {
            this.suggestionsVisible = true;

            if (!this.preFetched) {
                this.fetchGroceries();
                this.preFetched = true;
            }
        },
        hide (e) {
            const clickedOnSearchBar = Array.from(this.$refs.searchBar.$el.children).some((element) => {
                return e.target === element;
            });

            if (!clickedOnSearchBar) {
                this.suggestionsVisible = false;
            }
        }
    }
};
</script>

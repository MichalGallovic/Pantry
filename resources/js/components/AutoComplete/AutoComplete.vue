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
            <AddButton @click.native="$emit('select')" class="flex-none ml-2"></AddButton>
        </div>
        <Suggestions
            v-show="suggestionsVisible"
            @click:outside="hide"
            @select="item => $emit('select', item)"
            :suggestions="suggestions"
            :loading="isLoading"
        ></Suggestions>
    </div>
</template>

<script>
import SearchBar from '../SearchBar';
import AddButton from '../StyledComponents/Buttons/AddButton';
import Suggestions from './Suggestions';

export default {
    data () {
        return {
            query: '',
            suggestions: [],
            suggestionsVisible: false,
            isLoading: false,
            firstShow: false
        }
    },
    components: {
        SearchBar,
        AddButton,
        Suggestions
    },
    methods: {
        search (query) {},
        // Ideal place to prefetch suggestions
        beforeFirstShow () {},
        show () {
            this.$emit('show');
            this.suggestionsVisible = true;

            if (!this.firstShow) {
                this.beforeFirstShow();
                this.firstShow = true;
            }
        },
        hide (e) {
            const clickedOnSearchBar = Array.from(this.$refs.searchBar.$el.children).some((element) => {
                return e.target === element;
            });

            if (!clickedOnSearchBar) {
                this.$emit('hide');
                this.suggestionsVisible = false;
            }
        }
    }
};
</script>

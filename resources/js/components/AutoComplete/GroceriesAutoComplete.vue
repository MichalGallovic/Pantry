<script>
import AutoComplete from './AutoComplete';
import { RepositoryFactory } from "../../Repositories/RepositoryFactory";

const GroceryRepository = RepositoryFactory.get('grocery');

export default {
    extends: AutoComplete,
    data () {
        return {
            initialSuggestions: []
        }
    },
    methods: {
        search (query) {
            this.searchGroceries(query);
        },
        showSuggestionsFirstTime () {
            this.fetchGroceries()
        },
        async searchGroceries (query) {
            if (query.length === 0) {
                this.suggestions = this.initialSuggestions;
                return;
            }

            this.isLoading = true;
            const { data } = await GroceryRepository.search(query);
            this.suggestions = this.mapGroceries(data);
            this.isLoading = false;
        },
        async fetchGroceries () {
            this.isLoading = true;
            const { data } = await GroceryRepository.paginate();
            this.suggestions = this.mapGroceries(data);
            this.initialSuggestions = this.mapGroceries(data);
            this.isLoading = false;
        },
        mapGroceries (groceries) {
            return groceries.map((grocery) => {
                return {
                    id: grocery.id,
                    text: grocery.name
                }
            });
        },
    }
};
</script>

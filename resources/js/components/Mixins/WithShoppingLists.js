import { RepositoryFactory } from "../../Repositories/RepositoryFactory";
const ShoppingListRepository = RepositoryFactory.get('shoppingList');

export default {
    data () {
        return {
            shoppingList: null
        }
    },
    methods: {
        async fetchShoppingList () {
            let { data } = await ShoppingListRepository.find(this.id);
            data.items = data.items.sort((a, b) => a.order - b.order);
            this.shoppingList = data;
        },
        mapItems (items) {
            return items.map((item, index) => {
                let shoppingListItem = {
                    order: index
                };

                if (item.hasOwnProperty('grocery_id')) {
                    shoppingListItem['grocery_id'] = item.grocery_id;
                } else {
                    shoppingListItem['name'] = item.text;
                }

                return shoppingListItem;
            });
        },
    }
};

export default {
    hasGrocery (item) {
        return item.hasOwnProperty('grocery') && item.grocery && item.grocery.hasOwnProperty('name');
    },
    formatItemName (item) {
        if (this.hasGrocery(item)) {
            return item.grocery.name;
        }

        return item.name;
    },
    makeGroceryId (id) {
        return `grocery_${id}`;
    },
    makeTextItemId (text) {
        return `text_item_${text}`;
    }
};

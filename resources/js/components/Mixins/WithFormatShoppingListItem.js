export default {
    formatItemName (item) {
        if (item.hasOwnProperty('grocery') && item.grocery && item.grocery.hasOwnProperty('name')) {
            return item.grocery.name;
        }

        return item.name;
    }
};

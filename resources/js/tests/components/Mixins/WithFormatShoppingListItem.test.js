import WithFormatShoppingListItem from '../../../components/Mixins/WithFormatShoppingListItem';

test('use grocery name for item when available', () => {
    const item = {
        grocery: {
            name: 'Grocery name'
        },
        name: 'Just a name'
    };

    expect(WithFormatShoppingListItem.formatItemName(item)).toBe(item.grocery.name);
});

test('use item name when grocery not available', () => {
    const item = {
        grocery: null,
        name: 'This is the name'
    };

    expect(WithFormatShoppingListItem.formatItemName(item)).toBe(item.name);
});

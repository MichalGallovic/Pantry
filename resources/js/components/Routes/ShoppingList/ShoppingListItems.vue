<template>
    <div>
        <ShoppingListAutoComplete @select="add"></ShoppingListAutoComplete>
        <Draggable @input="orderChanged" :value="items">
            <InteractiveListItem
                    v-for="item in items"
                    :key="item.id"
                    :value="item"
                    :text="item.text"
                    @remove="remove"
                    class="w-full mt-2">
            </InteractiveListItem>
        </Draggable>
    </div>
</template>

<script>
import ShoppingListAutoComplete from '../../AutoComplete/ShoppingListAutoComplete';
import Draggable from 'vuedraggable';
import InteractiveListItem from '../../StyledComponents/ListItem/InteractiveListItem';

const MODEL_EVENT = 'items_change';

export default {
    model: {
        prop: 'items',
        event: MODEL_EVENT
    },
    props: {
        items: {
            default: [],
            type: Array
        }
    },
    components: {
        ShoppingListAutoComplete,
        Draggable,
        InteractiveListItem
    },
    methods: {
        add (selectedItem) {
            if (this.items.some((item) => item.id === selectedItem.id)) {
                return;
            }


            this.$emit(MODEL_EVENT, [selectedItem, ...this.items]);
        },
        remove (removedItem) {
            const newItems = this.items.filter(item => {
                return item.id !== removedItem.id;
            });

            this.$emit(MODEL_EVENT, newItems);
        },
        orderChanged (items) {
            this.$emit(MODEL_EVENT, items);
        }
    }
};
</script>

<template>
    <div>
        <RecipeGroceriesAutoComplete @select="add"></RecipeGroceriesAutoComplete>
        <ul>
            <li
                v-for="item in items"
                class="flex items-center px-2 py-2 mt-2 rounded rounded-lg cursor-pointer bg-gray-600 hover:bg-gray-800"
                >
                <span class="ml-4 text-gray-100">{{ item.text }}</span>
                <span class="flex items-center w-1/4 ml-auto">
                    <input
                        v-model="item.recipe_units"
                        type="text"
                        class="w-16 pl-4 py-1 mr-2 bg-gray-300 text-gray-800 font-medium rounded-lg focus:outline-none"
                    >
                    <span class="mr-4 text-gray-300">{{ unitType(item.unit_type_id) }}</span>
                    <CloseIcon @click.native.stop="remove(item)" class="ml-auto mr-2 text-gray-200"></CloseIcon>
                </span>
            </li>
        </ul>
    </div>
</template>

<script>
import RecipeGroceriesAutoComplete from '../../AutoComplete/RecipeGroceriesAutoComplete';
import Draggable from 'vuedraggable';
import TextInput from "../../StyledComponents/Form/TextInput";
import Checkbox from '../../StyledComponents/Checkbox';
import CloseIcon from '../../StyledComponents/CloseIcon';
import WithFormatUnitTypes from '../../Mixins/WithFormatUnitTypes';

const MODEL_EVENT = 'items_change';

export default {
    mixins: [WithFormatUnitTypes],
    model: {
        prop: 'items',
        event: MODEL_EVENT
    },
    props: {
        items: {
            default: () => [],
            type: Array
        }
    },
    components: {
        TextInput,
        RecipeGroceriesAutoComplete,
        Draggable,
        Checkbox,
        CloseIcon
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
        }
    }
};
</script>

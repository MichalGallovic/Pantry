<template>
    <section>
        <div class="flex">
            <Heading>Groceries</Heading>
            <router-link :to="{ name: 'groceries.create' }">
                <PlusButton></PlusButton>
            </router-link>
            <SearchBar class="ml-auto"></SearchBar>
        </div>
        <SquareGrid>
            <router-link
                :to="{ name: 'groceries.show', params: { 'id': grocery.id} }"
                v-for="grocery in groceries"
                :key="grocery.id"
            >
                <SquareItem
                    :title="grocery.name"
                    :sub-title="grocery.shop.name"
                    :bottom-left="formatUnits(grocery.units, grocery.unit_type_id)"
                    :bottom-right="formatPrice(grocery.price)"
                >
                </SquareItem>
            </router-link>
        </SquareGrid>
    </section>
</template>

<script>
import Heading from '../../StyledComponents/Heading';
import SearchBar from '../../SearchBar';
import PlusButton from '../../StyledComponents/Buttons/PlusButton';
import SquareGrid from '../../StyledComponents/SquareGrid';
import SquareItem from '../../StyledComponents/SquareItem';
import FormatGroceries from '../../Mixins/WithFormatGroceries';
import FormatUnitTypes from '../../Mixins/WithFormatUnitTypes';
import { RepositoryFactory } from "../../../Repositories/RepositoryFactory";

const GroceryRepository = RepositoryFactory.get('grocery');

export default {
    mixins: [FormatGroceries, FormatUnitTypes],
    components: {
        Heading,
        PlusButton,
        SearchBar,
        SquareGrid,
        SquareItem
    },
    data () {
        return {
            groceries: null
        };
    },
    created () {
        this.fetchGroceries();
    },
    methods: {
        async fetchGroceries () {
            const { data } = await GroceryRepository.paginate();
            this.groceries = data;
        }
    }
};
</script>

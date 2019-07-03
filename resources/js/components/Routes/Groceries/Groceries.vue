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
            <SquareItem
                v-for="(grocery, i) in groceries"
                :key="i"
                :title="grocery.title"
                :bottom-title="grocery.bottomTitle"
            >
            </SquareItem>
        </SquareGrid>
    </section>
</template>

<script>
import Heading from '../../StyledComponents/Heading';
import SearchBar from '../../SearchBar';
import PlusButton from '../../StyledComponents/Buttons/PlusButton';
import SquareGrid from '../../StyledComponents/SquareGrid';
import SquareItem from '../../StyledComponents/SquareItem';
import UnitTypeFactory from '../../../UnitType';

import { RepositoryFactory } from "../../../Repositories/RepositoryFactory";

const GroceryRepository = RepositoryFactory.get('grocery');
const UnitTypeRepository = RepositoryFactory.get('unitType');
let UnitType = null;

export default {
    components: {
        Heading,
        PlusButton,
        SearchBar,
        SquareGrid,
        SquareItem
    },
    data () {
        return {
            groceries: []
        };
    },
    created () {
        this.fetchUnitTypes();
        this.fetchGroceries();
    },
    methods: {
        mapGroceries (groceries) {
            return groceries.map(grocery => {
                return {
                    title: grocery.name,
                    bottomTitle: `${grocery.units} ${UnitType.getNameById(grocery.unit_type_id)}`
                }
            });
        },
        async fetchUnitTypes () {
            const { data } = await UnitTypeRepository.get();
            UnitType = UnitTypeFactory(data);
        },
        async fetchGroceries () {
            const { data } = await GroceryRepository.paginate();
            this.groceries = this.mapGroceries(data);
        }
    }
};
</script>

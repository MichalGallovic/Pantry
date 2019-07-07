<template>
    <section>
        <div class="flex">
            <Heading>Groceries</Heading>
            <router-link :to="{ name: 'groceries.create' }">
                <PlusButton></PlusButton>
            </router-link>
            <SearchBar @change="searchGroceries" class="ml-auto"></SearchBar>
        </div>
        <div v-for="groceriesByShop in groceriesByShops" :key="groceriesByShop.shopName">
            <Subheading class="block mt-4">{{ groceriesByShop.shopName }}</Subheading>
            <SquareGrid>
                <router-link
                    :to="{ name: 'groceries.show', params: { 'id': grocery.id} }"
                    v-for="grocery in groceriesByShop.groceries"
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
        </div>
        <NoResults v-if="groceriesByShops && groceriesByShops.length === 0">No groceries found for term "{{ query }}"</NoResults>
    </section>
</template>

<script>
import groupBy from 'lodash/groupBy';
import orderBy from 'lodash/orderBy';
import Heading from '../../StyledComponents/Heading';
import SearchBar from '../../SearchBar';
import PlusButton from '../../StyledComponents/Buttons/PlusButton';
import SquareGrid from '../../StyledComponents/SquareGrid';
import SquareItem from '../../StyledComponents/SquareItem';
import Subheading from '../../StyledComponents/Subheading';
import NoResults from '../../NoResults';
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
        SquareItem,
        Subheading,
        NoResults
    },
    data () {
        return {
            groceriesByShops: null,
            query: null
        };
    },
    created () {
        this.fetchGroceries();
    },
    methods: {
        mapGroceries (groceries) {
            groceries = groupBy(groceries, (grocery) => {
                return grocery.shop.name;
            });

            let groceriesByShops = [];

            for (let shopName in groceries) {
                groceriesByShops.push({
                    shopName: shopName,
                    groceries: groceries[shopName]
                });
            }

            return orderBy(groceriesByShops, groceriesByShop => {
                return groceriesByShop.groceries.length;
            }, ['desc']);
        },
        async fetchGroceries () {
            const { data } = await GroceryRepository.get();
            this.groceriesByShops = this.mapGroceries(data);
        },
        async searchGroceries (term) {
            const { data } = await GroceryRepository.search(term);
            this.groceriesByShops = this.mapGroceries(data);
            this.query = term;
        }
    }
};
</script>

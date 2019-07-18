<template>
    <!--Do we need this ref ?-->
    <VueTable ref="vuetable"
        :data="unitTypes"
        :api-mode="false"
        :fields="['id', 'shorthand', 'category']"
        pagination-path=""
    >
    </VueTable>
</template>

<script>
import VueTable from 'vuetable-2/src/components/Vuetable';

import { RepositoryFactory } from "../../../../Repositories/RepositoryFactory";
const UnitTypeRepository = RepositoryFactory.get('unitType');

export default {
    components: {
        VueTable
    },
    data () {
        return {
            unitTypes: []
        }
    },
    created () {
        this.fetchUnitTypes();
    },
    methods: {
        async fetchUnitTypes () {
            const { data } = await UnitTypeRepository.get();
            this.unitTypes = data;
        }
    }
};
</script>

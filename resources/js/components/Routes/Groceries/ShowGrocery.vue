<template>
    <section v-if="grocery">
        <Heading>Grocery detail</Heading>
        <div class="flex flex-wrap mt-4">
            <div class="w-64">
                <SquareItem
                    v-if="grocery"
                    :title="grocery.name"
                    :sub-title="grocery.shop.name"
                    :bottom-left="formatUnits(grocery.units, grocery.unit_type_id)"
                    :bottom-right="formatPrice(grocery.price)"
                >
                </SquareItem>
                <div class="mt-4">
                    <router-link :to="{ name: 'groceries.edit', params: { id: grocery.id } }"><Button class="btn-grey">Edit</Button></router-link>
                    <Button class="text-gray-600" @click.native="askQuestion = true">Delete</Button>
                </div>
            </div>
        </div>

        <DeleteDialog v-if="askQuestion" @cancel="askQuestion = false" @confirm="deleteGrocery">
            <template #header>Delete {{ grocery.name }}</template>
            <template #body>
                Do you really wish to <strong>delete grocery</strong> ?
            </template>
        </DeleteDialog>
    </section>
    <section v-else>
        <Loading>Loading grocery detail ...</Loading>
    </section>
</template>

<script>
import Heading from '../../StyledComponents/Heading';
import Loading from '../../Loading';
import Button from '../../StyledComponents/Buttons/Button';
import DeleteDialog from '../../StyledComponents/Modals/DeleteDialog';
import TextLabel from '../../StyledComponents/Form/TextLabel';
import SquareItem from '../../StyledComponents/SquareItem';
import Groceries from '../../Mixins/WithGroceries';
import FormatGroceries from '../../Mixins/WithFormatGroceries';
import FormatUnitTypes from '../../Mixins/WithFormatUnitTypes';

export default {
    props: ['id'],
    mixins: [Groceries, FormatGroceries, FormatUnitTypes],
    components: {
        Heading,
        DeleteDialog,
        Button,
        Loading,
        TextLabel,
        SquareItem
    },
    created () {
        this.fetchGrocery();
        this.fetchShops();
        this.fetchUnitTypes();
    },
    data () {
        return {
            askQuestion: false
        }
    }
};
</script>

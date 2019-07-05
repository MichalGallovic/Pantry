import UnitType from '../../Utils/UnitType';
import { RepositoryFactory } from "../../Repositories/RepositoryFactory";

const ShopRepository = RepositoryFactory.get('shop');
const GroceryRepository = RepositoryFactory.get('grocery');

export default {
    data () {
        return {
            grocery: null,
            shops: [],
            unit_types: []
        }
    },
    methods: {
        async fetchGrocery () {
            const { data } = await GroceryRepository.find(this.id);
            this.grocery = data;
        },
        async deleteGrocery () {
            await GroceryRepository.delete(this.id);
            this.$router.push({ name: 'groceries' });
        },
        mapShops (shops) {
            return shops.map(shop => {
                return {
                    id: shop.id,
                    text: shop.name,
                    value: shop.id
                }
            });
        },
        mapUnitTypes (unitTypes) {
            return unitTypes.map(unitType => {
                return {
                    id: unitType.id,
                    text: unitType.shorthand,
                    value: unitType.id
                };
            });
        },
        async fetchShops () {
            const { data } = await ShopRepository.get();
            this.shops = this.mapShops(data);
        },
        fetchUnitTypes () {
            this.unit_types = this.mapUnitTypes(UnitType.all());
        },
    }
};

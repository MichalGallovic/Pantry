import Settings from "../../Utils/Settings";

export default {
    methods: {
        formatPrice (price) {
            if (price) {
                return `${price} ${Settings.currencySymbol()}`;
            }

            return null;
        },
    }
};

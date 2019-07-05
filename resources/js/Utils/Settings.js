let settings = {};

export default {
    init (appSettings) {
        settings = appSettings;
    },
    currencyName () {
        return settings.currency.name;
    },
    currencySymbol () {
        return settings.currency.symbol;
    }
}

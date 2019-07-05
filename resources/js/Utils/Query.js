export default {
    serialize (queryDefinition) {
        let query = [];
        for (let key in queryDefinition) {
            if (queryDefinition.hasOwnProperty(key)) {
                query.push(`${encodeURIComponent(key)}=${encodeURIComponent(queryDefinition[key])}`);
            }
        }
        return query.join('&');
    },
    make (path, parameters = {}) {
        if (Object.keys(parameters).length === 0) {
            return path;
        }

        const query = this.serialize(parameters);

        return `${path}?${query}`;
    }
};

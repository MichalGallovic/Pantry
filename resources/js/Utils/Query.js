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
        parameters = this.filterEmptyParameters(parameters);
        if (Object.keys(parameters).length === 0) {
            return path;
        }

        const query = this.serialize(parameters);

        return `${path}?${query}`;
    },
    filterEmptyParameters (parameters) {
        for (let key in parameters) {
            const isEmpty = parameters.hasOwnProperty(key) &&
                (parameters[key] === null || parameters[key] === undefined);

            if (isEmpty) {
                delete parameters[key];
            }
        }

        return parameters;
    }
};

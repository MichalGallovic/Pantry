import Query from '../../Utils/Query';

test('filters out parameters with empty values', () => {
    const parameters = {
        q: null,
        page: 2
    };

    expect(Query.filterEmptyParameters(parameters)).toEqual({page: 2});
});

test('serialize object parameters to url query parameters', () => {
    const parameters = {
        q: "term",
        page: 5
    };

    expect(Query.serialize(parameters)).toBe('q=term&page=5');
});

test('makes url with path and parameters', () => {
    const path = 'shops/1/groceries';

    const parameters = {
        q: "term",
        page: 2
    };

    expect(Query.make(path, parameters)).toBe('shops/1/groceries?q=term&page=2');
});

module.exports = {
    "moduleFileExtensions": [
        "js",
        "vue"
    ],
    "moduleNameMapper": {
        "^@/(.*)$": "<rootDir>/resources/js/components/$1"
    },
    "transform": {
        "^.+\\.js$": "<rootDir>/node_modules/babel-jest",
        ".*\\.(vue)$": "<rootDir>/node_modules/vue-jest"
    },
    "snapshotSerializers": [
        "<rootDir>/node_modules/jest-serializer-vue"
    ]
};

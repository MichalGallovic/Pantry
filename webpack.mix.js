const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');
const whitelister = require("purgecss-whitelister");

const purgecss = require('@fullhuman/postcss-purgecss')({
    content: [
        "./resources/js/**/*.vue",
        "./resources/views/**/*.php"
    ],
    whitelist: [
        ...whitelister('node_modules/tailwindcss/dist/base.css')
    ],
    defaultExtractor: content => content.match(/[A-Za-z0-9-_:/]+/g) || []
});
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .less('resources/less/app.less', 'public/css')
    .options({
        hmrOptions: {
            host: 'pantry.test'
        },
        postCss: [
            tailwindcss('./tailwind.config.js'),

            ...process.env.NODE_ENV === 'production' ? [purgecss] : []
        ]
    })
    .webpackConfig({
        watchOptions: {
            ignored: /node_modules/
        }
    });

mix.disableSuccessNotifications();

if (mix.inProduction()) {
    mix.version();
}

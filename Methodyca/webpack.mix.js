const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */
mix.setPublicPath('../htdocs/methodyca');
mix.js('resources/js/app.js', '../htdocs/methodyca/js')
    .sourceMaps()
    .vue()
    .copyDirectory('resources/fonts', '../htdocs/methodyca/fonts')
    .postCss('resources/css/app.css', '../htdocs/methodyca/css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
    ])
    .webpackConfig(require('./webpack.config'));

if (mix.inProduction()) {
    mix.version();
}


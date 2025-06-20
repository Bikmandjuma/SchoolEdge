// const mix = require('laravel-mix');

// mix.js('resources/js/app.js', 'public/js')
//    .css('resources/css/app.css', 'public/css')
//    .version();

const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .postCss('resources/css/app.css', 'public/css', [
       require('tailwindcss'),
   ])
   .version();

mix.webpackConfig({
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['@babel/preset-env'],
                        sourceType: 'unambiguous'
                    }
                }
            }
        ]
    }
});
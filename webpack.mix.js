/*========Requires=======*/
const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');


/*
 |--------------------------------------------------------------------------
 | Site Management
 |--------------------------------------------------------------------------
 |
 |  It has been commented because it needs node v14 for Tailwinf to work
 | Feel free To use any UI Frameworks for the website
 |
 */

// mix.copy('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/fonts/webfonts');
// mix.js('resources/assets/front/js/app.js', 'public/front/js')
//     .sass('resources/assets/front/sass/app.scss', 'public/front/css/app.css')
//     .options({
//         processCssUrls: false,
//         postCss: [ 
//             tailwindcss('tailwind.config.js'),
//          ],
//     }).sourceMaps();



/*
 |--------------------------------------------------------------------------
 | Admin Management
 |--------------------------------------------------------------------------
 */
// mix.minify('resources/assets/admin/js/ckeditor/ckeditor.js');

// mix.js('resources/assets/admin/js/app.js', 'public/admin/js').sourceMaps();
mix.sass('resources/assets/admin/sass/app.scss', 'public/admin/css/app.css').sourceMaps();

/*
 |--------------------------------------------------------------------------
 | Watcher Management
 |--------------------------------------------------------------------------
 */
mix.browserSync('http://127.0.0.1:8000');
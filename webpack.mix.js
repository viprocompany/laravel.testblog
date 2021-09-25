const mix = require('laravel-mix');

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

//для того чтобы была применена библиотека Vue.js для работы с компонентами вью и помещения их  в итоговый файл скриптов применяем .vue(),  используем .version() для создания файла манифеста, после каждого запуска сборщика кода он буде т обновляться и соответственно браузер будет брать новые стили а не пользоваться кэшем
mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css').version();

mix.copy('resources/img', 'public/img');

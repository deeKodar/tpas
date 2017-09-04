// let mix = require('laravel-mix');
const { mix } = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application, as well as bundling up your JS files.
 |
 */

// mix.js('src/app.js', 'dist/')
//    .sass('src/app.scss', 'dist/');

// mix.js('resources/assets/js/main.js', 'public/js')
//     .sass('resources/assets/sass/app.scss', 'public/css/app.css')
//     .version();

// Full API
// mix.js(src, output);
// mix.react(src, output); <-- Identical to mix.js(), but registers React Babel compilation.
// mix.extract(vendorLibs);
// mix.sass(src, output);
// mix.standaloneSass('src', output); <-- Faster, but isolated from Webpack.
// mix.fastSass('src', output); <-- Alias for mix.standaloneSass().
// mix.less(src, output);
// mix.stylus(src, output);
// mix.postCss(src, output, [require('postcss-some-plugin')()]);
// mix.browserSync('my-site.dev');
// mix.combine(files, destination);
// mix.babel(files, destination); <-- Identical to mix.combine(), but also includes Babel compilation.
// mix.copy(from, to);
// mix.copyDirectory(fromDir, toDir);
// mix.minify(file);
// mix.sourceMaps(); // Enable sourcemaps
// mix.version(); // Enable versioning.
// mix.disableNotifications();
// mix.setPublicPath('path/to/public');
// mix.setResourceRoot('prefix/for/resource/locators');
// mix.autoload({}); <-- Will be passed to Webpack's ProvidePlugin.
//Override webpack.config.js, without editing the file directly.
mix.webpackConfig({
    // resolve: {
    //     alias: {
    //         vue: 'vue/dist/vue.js'
    //     }
    // }
    resolve: {
        alias: {
            'vue$': 'vue/dist/vue.esm.js' // 'vue/dist/vue.common.js' for webpack 1
        }
    }
});
// mix.then(function () {}) <-- Will be triggered each time Webpack finishes building.
// mix.options({
//   extractVueStyles: false, // Extract .vue component styling to file, rather than inline.
//   processCssUrls: true, // Process/optimize relative stylesheet url()'s. Set to false, if you don't want them touched.
//   purifyCss: false, // Remove unused CSS selectors.
//   uglify: {}, // Uglify-specific options. https://webpack.github.io/docs/list-of-plugins.html#uglifyjsplugin
//   postCss: [] // Post-CSS options: https://github.com/postcss/postcss/blob/master/docs/plugins.md
// });

/********************/
/* Copy Stylesheets */
/********************/

// Bootstrap
mix.copy('vendor/bower_components/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css', 'public/css/bootstrap.min.css');

// Font awesome
mix.copy('vendor/bower_components/gentelella/vendors/font-awesome/css/font-awesome.min.css', 'public/css/font-awesome.min.css');

// Gentelella
mix.copy('vendor/bower_components/gentelella/build/css/custom.min.css', 'public/css/gentelella.min.css');

/****************/
/* Copy Scripts */
/****************/

// Bootstrap
mix.copy('vendor/bower_components/gentelella/vendors/bootstrap/dist/js/bootstrap.min.js', 'public/js/bootstrap.min.js');

// jQuery
mix.copy('vendor/bower_components/gentelella/vendors/jquery/dist/jquery.min.js', 'public/js/jquery.min.js');

// Gentelella
mix.copy('vendor/bower_components/gentelella/build/js/custom.min.js', 'public/js/gentelella.min.js');

/**************/
/* Copy Fonts */
/**************/

// Bootstrap
mix.copy('vendor/bower_components/gentelella/vendors/bootstrap/fonts/', 'public/fonts');

// Font awesome
mix.copy('vendor/bower_components/gentelella/vendors/font-awesome/fonts/', 'public/fonts');

//Added for Chart.js tutorial by Jeffrey!
//mix.browserify('main.js');


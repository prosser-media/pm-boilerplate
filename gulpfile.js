// Require our dependencies.
var browserSync = require('browser-sync').create();
var gulp = require('gulp');

var siteName = 'pm-boilerplate'; // set your siteName here
var userName = 'owen'; // set your macOS userName here

// Set assets paths.
var paths = {
    php: ['*.php', '**/*.php'],
    scripts: ['js/*.js', 'js/*.vue'],
    styles: ['*.css', 'css/*.css', 'scss/*.scss']
};

/**
 * Reload browser after PHP & JS file changes and inject CSS changes.
 *
 * https://browsersync.io/docs/gulp
 */
gulp.task('default', function () {
    browserSync.init({
        proxy: 'https://' + siteName + '.test',
        host: siteName + '.test',
        open: 'external',
        port: 8000,
        https: {
            key: '/Users/' +
                userName +
                '/.config/valet/Certificates/' +
                siteName +
                '.test.key',
            cert: '/Users/' +
                userName +
                '/.config/valet/Certificates/' +
                siteName +
                '.test.crt'
        }
    });

    gulp.watch(paths.php).on('change', browserSync.reload);
    gulp.watch(paths.scripts).on('change', browserSync.reload);

    gulp.watch(paths.styles, function () {
        gulp.src(paths.styles).pipe(browserSync.stream());
    });
});

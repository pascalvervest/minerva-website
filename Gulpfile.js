'use strict';

var browserify = require('browserify');
var buffer = require('gulp-buffer');
var cleanCss = require('gulp-clean-css');
var concat = require('gulp-concat');
var gulp = require('gulp');
var gutil = require('gulp-util');
var merge = require('merge-stream');
var plumber = require('gulp-plumber');
var prettify = require('pretty-hrtime');
var rebase = require('gulp-css-rebase-urls');
var sass = require('gulp-sass');
var source = require('vinyl-source-stream');
var sourcemaps = require('gulp-sourcemaps');
var uglify = require('gulp-uglify');
var watchify = require('watchify');
var path = require('path');

// CSS resources
var CSS = {
    'app.css': [
        './web/assets/vendor/foundation-sites/assets/foundation.scss',
        // './web/assets/vendor/font-awesome/css/font-awesome.css',
        // './vendor/prezent/grid-bundle/Resources/public/css/prezent-grid.css',
        './app/Resources/assets/css/app.scss',
    ],
};

// Javascript libraries (from e.g. bower)
var JS_LIBS = [
    './web/assets/vendor/jquery/dist/jquery.js',
    './web/assets/vendor/foundation-sites/dist/js/foundation.min.js',
    // './src/Prezent/CrudBundle/Resources/public/js/crud.js',
    // './vendor/a2lix/translation-form-bundle/A2lix/TranslationFormBundle/Resources/public/js/a2lix_translation_default.js',
];

// Application javascripts
var JS_APP = [
    './app/Resources/assets/js/common.js',
];

var JS_MODERNIZR = [
    './web/assets/vendor/modernizr/modernizr.js',
];

// Compile modules using Browserify
function bundle(b, file) {
    gutil.log('Bundling', gutil.colors.cyan(file));
    var start = process.hrtime();

    return b.bundle()
        .on('error', function(err) {
            gutil.log(gutil.colors.red('Browserify Error'), err.message, 'in', err.filename);
        })
        .pipe(source(path.basename(file)))
        .pipe(buffer())
        // .pipe(sourcemaps.init({loadMaps: true})) // loads map from browserify file
        .pipe(uglify({mangle: false, preserveComments: 'some'}))
        // .pipe(sourcemaps.write('./maps')) // writes .map file
        .pipe(gulp.dest('./web/js'))
        .on('end', function() {
            gutil.log('Finished', gutil.colors.cyan(file), 'after', gutil.colors.magenta(prettify(process.hrtime(start))));
        });
}

// Compile CSS
function bundleCss(target, files) {
    return gulp.src(files)
        .pipe(plumber())
        // .pipe(sourcemaps.init({loadMaps: true}))
        .pipe(sass().on('error', sass.logError))
        .pipe(rebase({root: '/web/css'}))
        .pipe(cleanCss())
        .pipe(concat(target))
        // .pipe(sourcemaps.write('./maps'))
        .pipe(gulp.dest('./web/css'));
};

// Compile generic JS
function bundleJs(target, files) {
    return gulp.src(files)
        .pipe(plumber())
        // .pipe(sourcemaps.init({loadMaps: true}))
        .pipe(concat(target))
        .pipe(uglify({mangle: false, preserveComments: 'some'}))
        // .pipe(sourcemaps.write('./maps'))
        .pipe(gulp.dest('web/js'));
}

gulp.task('css', function () {
    return merge(Object.keys(CSS).map(function (target) {
        return bundleCss(target, CSS[target]);
    }));
});

gulp.task('css-watch', function() {
    gulp.watch(['app/**/*.scss', 'src/**/*.scss'], ['css']);
});

gulp.task('modernizr', function() {
    return bundleJs('modernizr.js', JS_MODERNIZR);
});

gulp.task('libs', ['modernizr'], function() {
    return bundleJs('libs.js', JS_LIBS);
});

gulp.task('js', function () {
    return merge(JS_APP.map(function (file) {
        return bundle(browserify(file, {debug: true}), file);
    }));
});

gulp.task('js-watch', function () {
    var tasks = JS_APP.map(function (file) {
        var b = watchify(browserify(file, {cache: {}, packageCache: {}, debug: true}), {poll: true});
        b.on('update', bundle.bind(null, b, file));

        return bundle(b, file);
    });

    return merge(tasks);
});

gulp.task('default', ['css', 'libs', 'js']);
gulp.task('watch', ['libs', 'css-watch', 'js-watch']);
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
var sass = require('gulp-sass');
var source = require('vinyl-source-stream');
var sourcemaps = require('gulp-sourcemaps');
var uglify = require('gulp-uglify');
var watchify = require('watchify');
var path = require('path');

// CSS resources
var CSS = [
    './web/bower/foundation/css/normalize.css',
    './web/bower/font-awesome/css/font-awesome.css',
    './web/bundles/flobfoundation/css/foundationtosymfony.css',
    './app/Resources/assets/css/app.scss',
    './web/bower/jquery.ui/themes/base/all.css'
];

// Javascript libraries (from e.g. bower)
var JS_LIBS = [
    './web/bower/jquery/dist/jquery.js',
    './web/bower/fastclick/lib/fastclick.js',
    './web/bower/foundation/js/foundation/foundation.js',
    './web/bower/foundation/js/foundation/foundation.topbar.js'
];

// Application javascripts
var JS_APP = [
    './app/Resources/assets/js/common.js'
];

function bundle(b, file) {
    gutil.log('Bundling', gutil.colors.cyan(file));
    var start = process.hrtime();

    return b.bundle()
        .on('error', function(err) {
            gutil.log(gutil.colors.red('Browserify Error'), err.message, 'in', err.filename);
        })
        .pipe(source(path.basename(file)))
        .pipe(buffer())
        .pipe(sourcemaps.init({loadMaps: true})) // loads map from browserify file
        .pipe(uglify({mangle: false, preserveComments: 'some'}))
        .pipe(sourcemaps.write('./maps')) // writes .map file
        .pipe(gulp.dest('./HTML/js'))
        .on('end', function() {
            gutil.log('Finished', gutil.colors.cyan(file), 'after', gutil.colors.magenta(prettify(process.hrtime(start))));
        });
}

gulp.task('css', function() {
    return gulp.src(CSS)
        .pipe(plumber())
        .pipe(sourcemaps.init({loadMaps: true}))
        .pipe(sass().on('error', sass.logError))
        .pipe(cleanCss())
        .pipe(concat('app.css'))
        .pipe(sourcemaps.write('./maps'))
        .pipe(gulp.dest('./web/css'));
});

gulp.task('css-watch', function() {
    gulp.watch(['app/**/*.scss', 'src/**/*.scss'], ['css']);
});

gulp.task('modernizr', function() {
    return gulp.src('./web/bower/modernizr/modernizr.js')
        .pipe(plumber())
        .pipe(sourcemaps.init({loadMaps: true}))
        .pipe(uglify({mangle: false, preserveComments: 'some'}))
        .pipe(sourcemaps.write('./maps'))
        .pipe(gulp.dest('web/js'));
});

gulp.task('libs', ['modernizr'], function() {
    return gulp.src(JS_LIBS)
        .pipe(plumber())
        .pipe(sourcemaps.init({loadMaps: true}))
        .pipe(concat('libs.js'))
        .pipe(uglify({mangle: false, preserveComments: 'some'}))
        .pipe(sourcemaps.write('./maps'))
        .pipe(gulp.dest('web/js'));
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

        b.on('update', bundle.bind(null, b, file));

        return bundle(b, file);
    });

    return merge(tasks);
});

gulp.task('default', ['css', 'libs', 'js']);
gulp.task('watch', ['libs', 'css-watch', 'js-watch']);
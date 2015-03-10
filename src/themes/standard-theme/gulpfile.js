var gulp = require('gulp'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    minifyCSS = require('gulp-minify-css'),
    rename = require('gulp-rename');

var paths = {
    sass: './scss/app.scss',
    css: './css'
};

gulp.task('sass', function() {
    return gulp.src(paths.sass)
        .pipe(sass())
        .pipe(autoprefixer())
        .pipe(gulp.dest(paths.css));
});

gulp.task('sass:prod', ['sass'], function() {
    return gulp.src(paths.css + '/*.css')
        .pipe(minifyCSS({keepSpecialComments: 0}))
        .pipe(rename({
            basename: 'app',
            suffix: '.min'
        }))
        .pipe(gulp.dest(paths.css));
});

gulp.task('watch', function() {
    gulp.watch(assets.sass, ['sass']);
});
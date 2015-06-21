'use strict';

var gulp = require('gulp'),
  sass = require('gulp-sass'),
  autoprefixer = require('gulp-autoprefixer'),
  minifyCSS = require('gulp-minify-css'),
  rename = require('gulp-rename'),
  scsslint = require('gulp-scss-lint'),
  file = require('gulp-file'),
  concat = require('gulp-concat'),
  uglify = require('gulp-uglify');

var paths = {
  sass: './Resources/assets/scss',
  js: './Resources/assets/js',
  css: './Resources/build/css',
  buildJs: './Resources/build/js'
};

var watch = {
  sass: './Resources/assets/scss/**/*.scss'
};

gulp.task('wp-style', function () {
  var content = '/*\n * Author: LIN3S\n * Author URI: http://www.lin3s.com/\n */';

  return file('style.css', content, {src: true}).pipe(gulp.dest('.'));
});

gulp.task('sass', ['wp-style', 'scss-lint'], function () {
  return gulp.src(paths.sass + '/app.scss')
    .pipe(sass({
      errLogToConsole: true
    }))
    .pipe(autoprefixer())
    .pipe(gulp.dest(paths.css));
});

gulp.task('scss-lint', function () {
  return gulp.src([watch.sass, '!' + paths.sass + '/base/_reset.scss'])
    .pipe(scsslint());
});

gulp.task('sass:prod', ['sass'], function () {
  return gulp.src(paths.css + '/app.css')
    .pipe(minifyCSS({keepSpecialComments: 0}))
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(gulp.dest(paths.css));
});

gulp.task('js:prod', function () {
  return gulp.src([paths.js + '/*.js'])
    .pipe(concat('app.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest(paths.buildJs));
});

gulp.task('watch', function () {
  gulp.watch(watch.sass, ['sass']);
});

gulp.task('prod', ['sass:prod', 'js:prod']);

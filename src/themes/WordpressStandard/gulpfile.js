/*
 * This file is part of the Wordpress Standard project.
 *
 * Copyright (c) 2015 LIN3S <info@lin3s.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 * @author Beñat Espiña <benatespina@gmail.com>
 */

'use strict';

var gulp = require('gulp'),
  autoprefixer = require('gulp-autoprefixer'),
  concat = require('gulp-concat'),
  file = require('gulp-file'),
  minifyCSS = require('gulp-minify-css'),
  rename = require('gulp-rename'),
  sass = require('gulp-sass'),
  scsslint = require('gulp-scss-lint'),
  svgSprite = require('gulp-svg-sprite'),
  uglify = require('gulp-uglify'),
  modernizr = require('gulp-modernizr');

var paths = {
  assets: './Resources/assets',
  sass: './Resources/assets/scss',
  js: './Resources/assets/js',
  css: './Resources/build/css',
  buildJs: './Resources/build/js',
  svg: './Resources/assets/svg',
  buildSvg: './Resources/build/svg'
};

var watch = {
  sass: './Resources/assets/scss/**/*.scss',
  svg: './Resources/assets/svg/**/*.svg'
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
    .pipe(scsslint({
      'config': './.scss_lint.yml'
    }));
});

gulp.task('sass:prod', ['sass'], function () {
  return gulp.src(paths.css + '/app.css')
    .pipe(minifyCSS({keepSpecialComments: 0}))
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(gulp.dest(paths.css));
});

gulp.task('sprites', function () {
  return gulp.src(paths.svg + '/*.svg')
    .pipe(svgSprite({
      mode: {
        symbol: {
          dest: '',
          sprite: 'symbols',
          example: {dest: 'symbols'}
        }
      }
    }))
    .pipe(gulp.dest(paths.buildSvg));
});

gulp.task('modernizr', function() {
  return gulp.src([paths.js + '/*.js'])
    .pipe(modernizr({
      'options' : [
        'setClasses', 'addTest', 'html5printshiv', 'testProp', 'fnBind'
      ],
      'tests' : ['objectfit', 'flexbox']
    }))
    .pipe(gulp.dest(paths.buildJs))
});

gulp.task('js:prod', function () {
  return gulp.src([paths.js + '/*.js'])
    .pipe(concat('app.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest(paths.buildJs));
});

gulp.task('watch', function () {
  gulp.watch(watch.sass, ['sass']);
  gulp.watch(watch.svg, ['sprites']);
});

gulp.task('default', ['sass', 'sprites', 'modernizr']);

gulp.task('prod', ['sass:prod', 'js:prod', 'sprites', 'modernizr']);

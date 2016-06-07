/*
 * This file is part of the WordPress Standard project.
 *
 * Copyright (c) 2015-2016 LIN3S <info@lin3s.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 * @author Beñat Espiña <benatespina@gmail.com>
 * @author Jon Torrado <jontorrado@gmail.com>
 */

'use strict';

var gulp = require('gulp'),
  concat = require('gulp-concat'),
  cssnext = require('postcss-cssnext'),
  cssnano = require('gulp-cssnano'),
  file = require('gulp-file'),
  livereload = require('gulp-livereload'),
  modernizr = require('gulp-modernizr'),
  plumber = require('gulp-plumber'),
  postcss = require('gulp-postcss'),
  rename = require('gulp-rename'),
  sass = require('gulp-sass'),
  stylelint = require('gulp-stylelint'),
  svgSprite = require('gulp-svg-sprite'),
  uglify = require('gulp-uglify');

var paths = {
  npm: './node_modules',
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

// Plumber error function
function onError(err) {
  console.log(err);
  this.emit('end');
}

gulp.task('wp-style', function () {
  var content = '/*\nTheme Name: WordPress Standard';
  content += '\nAuthor: LIN3S';
  content += '\nAuthor URI: http://www.lin3s.com/\n*/';

  return file('style.css', content, {src: true}).pipe(gulp.dest('.'));
});

gulp.task('stylelint', function () {
  return gulp.src([
    watch.sass,
    '!' + paths.sass + '/base/_reset.scss',
    '!' + paths.sass + '/base/_grid.scss'
  ])
    .pipe(plumber({
      errorHandler: onError
    }))
    .pipe(stylelint({
      configFile: './stylelint/.stylelintrc',
      failAfterError: false,
      syntax: 'scss',
      reporters: [{
        formatter: 'string',
        console: true
      }]
    }));
});

gulp.task('sass', ['wp-style', 'stylelint'], function () {
  return gulp.src(paths.sass + '/app.scss')
    .pipe(plumber({
      errorHandler: onError
    }))
    .pipe(sass({
      errLogToConsole: true
    }))
    .pipe(postcss([cssnext]))
    .pipe(gulp.dest(paths.css))
    .pipe(livereload());
});

gulp.task('sass:prod', function () {
  return gulp.src(paths.sass + '/app.scss')
    .pipe(plumber({
      errorHandler: onError
    }))
    .pipe(sass())
    .pipe(postcss([cssnext]))
    .pipe(cssnano({
      keepSpecialComments: 1,
      rebase: false
    }))
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(gulp.dest(paths.css));
});

gulp.task('sprites', function () {
  return gulp.src(paths.svg + '/*.svg')
    .pipe(plumber({
      errorHandler: onError
    }))
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

gulp.task('modernizr', function () {
  return gulp.src([paths.js + '/*.js'])
    .pipe(plumber({
      errorHandler: onError
    }))
    .pipe(modernizr({
      'options': [
        'setClasses', 'addTest', 'html5printshiv', 'testProp', 'fnBind'
      ],
      'tests': ['objectfit', 'flexbox']
    }))
    .pipe(gulp.dest(paths.buildJs))
});

gulp.task('js:prod', ['modernizr'], function () {
  return gulp.src([
    paths.buildJs + '/modernizr.js',
    paths.npm + '/fastclick/lib/fastclick.js',
    paths.npm + '/svg4everybody/dist/svg4everybody.min.js',
    paths.npm + '/picturefill/dist/picturefill.min.js',
    // Put here js vendor files, for example:
    // paths.npm + '/slick-carousel/slick/slick.min.js'
    paths.js + '/*.js'
  ])
    .pipe(plumber({
      errorHandler: onError
    }))
    .pipe(concat('app.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest(paths.buildJs));
});

gulp.task('watch', function () {
  livereload.listen();
  gulp.watch(watch.sass, ['sass']);
  gulp.watch(watch.svg, ['sprites']);
});

gulp.task('default', ['sass', 'sprites', 'modernizr']);

gulp.task('prod', ['sass:prod', 'sprites', 'modernizr', 'js:prod']);

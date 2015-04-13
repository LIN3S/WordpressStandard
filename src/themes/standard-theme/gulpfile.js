var gulp = require('gulp'),
  sass = require('gulp-sass'),
  autoprefixer = require('gulp-autoprefixer'),
  minifyCSS = require('gulp-minify-css'),
  rename = require('gulp-rename'),
  scsslint = require('gulp-scss-lint');

var paths = {
  sass: './Resources/assets/scss',
  css: './Resources/build/css'
};

var watch = {
  sass: './Resources/assets/scss/**/*.scss'
};

gulp.task('sass', ['scss-lint'], function() {
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
  gulp.watch(watch.sass, ['sass']);
});
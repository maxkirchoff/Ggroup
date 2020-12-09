'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var livereload = require('gulp-livereload');

sass.compiler = require('node-sass');

gulp.task('sass', function () {
  return gulp.src('./css/theme.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('./css'))
    .pipe(livereload());
});

gulp.task('sass:watch', function () {
  livereload.listen();
  gulp.watch('./css/**/*.scss', gulp.series('sass'));
});

gulp.task('dev', gulp.series('sass:watch'));

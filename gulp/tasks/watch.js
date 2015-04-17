var gulp = require('gulp'),
    configs = require('../config');

gulp.task('watch', function() {
    gulp.watch(configs.compass.watch, ['compass']);
    gulp.watch(configs.coffee.watch, ['coffee']);
});
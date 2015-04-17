var gulp = require('gulp'),
    coffee = require('gulp-coffee'),
    handleErrors = require('../util/handleErrors'),
    config = require('../config').coffee,
    notify = require('gulp-notify');

gulp.task('coffee', function() {
    gulp.src(config.src + '/*.coffee')
        .pipe(coffee({
            config_file: config.configFile,
            coffee: config.src,
            js: './js'
        }))
        .on('error', handleErrors)
        .pipe(gulp.dest(config.dest))
        .pipe(notify('Compiled <%=file.relative %>!'));
});

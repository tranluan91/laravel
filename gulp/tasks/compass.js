var gulp = require('gulp'),
    compass = require('gulp-compass'),
    handleErrors = require('../util/handleErrors'),
    config = require('../config').compass,
    notify = require('gulp-notify');

gulp.task('compass', function() {
    gulp.src(config.src + '/*.sass')
        .pipe(compass({
            config_file: config.configFile,
            sass: config.src,
            css: config.dest
        }))
        .on('error', handleErrors)
        .pipe(gulp.dest(config.dest))
        .pipe(notify('Compiled <%=file.relative %>!'));
});

var gulp = require('gulp');
var babel = require('gulp-babel');
var gutil = require('gulp-util')
var browserify = require('browserify');
var reactify = require('reactify');
var source = require('vinyl-source-stream');
var minify = require('gulp-minify');
function fuckTheErrors(error){
    console.log(error.toString());

    this.emit('end');
}
gulp.task('default',function(){
    var bundler = browserify({
        entries:['backend/web/js/source/index.js'],
        transform:[reactify],
        debug:true,
    })
    return bundler
        .bundle()
        .pipe(source('hugebundle.js'))
        .pipe(gulp.dest('backend/web/js/dist'));
});
gulp.task('frontend',function(){
    var bundler = browserify({
        entries:['frontend/web/js/source/react.js'],
        transform:[reactify],
        debug:true,
    })
    return bundler
        .bundle()
        .pipe(source('reactbundle.js'))
        .pipe(gulp.dest('frontend/web/js'));
})
gulp.task('watch',function(cb){
    gulp.watch('backend/web/js/source/**/*',['default'])
    .on('error',fuckTheErrors);
})

gulp.task('watchfront',function(cb){
    gulp.watch('frontend/web/js/source/*',['frontend'])
        .on('error',fuckTheErrors);
})
var gulp = require('gulp');
var sass = require('gulp-sass');

gulp.task('hello', function(){
    console.log('salut');
});
gulp.task('sass', function(){
    return gulp.src('public/assets/css/style.scss').pipe(sass()).pipe(gulp.dest('public/assets/css'));
});

gulp.task('default', gulp.parallel('sass'));

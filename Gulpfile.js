var gulp            = require('gulp');
var sass            = require('gulp-ruby-sass');
var autoprefixer    = require('gulp-autoprefixer');
var cssnano         = require('gulp-cssnano');
var uglify          = require('gulp-uglify');
var imagemin        = require('gulp-imagemin');
var rename          = require('gulp-rename');
var concat          = require('gulp-concat');
var notify          = require('gulp-notify');
var cache           = require('gulp-cache');
var livereload      = require('gulp-livereload');
var del             = require('del');

gulp.task('default', function () {
    gulp.start('styles', 'scripts');
})

gulp.task('clean', function () {
    return del(['./assets/css', './assets/js']);
});

gulp.task('styles', function () {
    return sass(['./resources/sass/signin.scss', './resources/sass/custom.scss'], { style: 'expanded' })
        .pipe(autoprefixer('last 2 version'))
        .pipe('./assets/css')
        .pipe(rename({ suffix: '.min'}))
        .pipe(cssnano())
        .pipe(gulp.dest('./assets/css'))
        .pipe(notify({ message: 'Styles task complete'}));
})

gulp.task('scripts', function () {
    return gulp.src('./resources/js/**/*.js')
        .pipe(concat('main.js'))
        .pipe(gulp.dest('./assets/js'))
        .pipe(rename({ suffix: '.min'}))
        .pipe(uglify())
        .pipe(gulp.dest('./assets/js'))
        .pipe(notify({ message: 'Script task complete.'}));
});

gulp.task('watch', function () {
    gulp.watch('./resources/sass/**/*.scss', ['styles']);
    gulp.watch('./resources/js/**/*.js', ['scripts']);
});

const gulp = require('gulp'),
      sass = require('gulp-sass'),
      cssmin = require('gulp-cssmin'),
      rename = require('gulp-rename')
      refresh = require('gulp-refresh'),
      terser = require('gulp-terser'),
      pump = require('pump');

/**
 *
 * CSS Handling
 *
 */

// CSS
gulp.task('sass', () => {
	gulp.src('src/sass/*.scss')
    	.pipe(sass().on('error', sass.logError))
    	.pipe(gulp.dest('src/css'))
    	.pipe(refresh())
});

gulp.task('cssmin', () => {
	
	gulp.src('src/css/*.css')
        .pipe(cssmin())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('dist/css'))
});

/**
 *
 * JavaScript Handling
 *
 */

// Uglify
gulp.task("minify", () => {
    return gulp.src('src/js/*.js')
    .pipe(terser())
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest('dist/js'))
    .pipe(refresh())
});
 
/**
 *
 * Defaults and listeners
 *
 */

// Watch
gulp.task('watch', () => {
  refresh.listen()
  gulp.watch('src/sass/**/*.scss', ['sass','cssmin']);
  gulp.watch('src/js/*.js', ['minify']);
});

gulp.task('build', () => {

  gulp.task('sass');
  gulp.task('cssmin');
  gulp.task('minify');

});

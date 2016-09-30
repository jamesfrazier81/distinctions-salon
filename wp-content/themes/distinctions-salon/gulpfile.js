var gulp = require('gulp');
var sass = require('gulp-sass');
var jshint = require('gulp-jshint');
var imagemin = require('gulp-imagemin');
var rename = require('gulp-rename');
var uglify = require('gulp-uglify');
var notify = require('gulp-notify');
var browserSync = require('browser-sync').create();

// BrowserSync replace with your local dev site
gulp.task('serve', function() {

	var files = [
	    './*.php',
	    './includes/*.php',
	    './sass/*.scss',
	    './js/*.js'
    ];

    browserSync.init(files, {
        proxy: 'distinctionssalon.dev'
    });

    gulp.watch("./sass/*.scss", ['sass']);
    gulp.watch(files).on('change', browserSync.reload);    
});

gulp.task('sass', function() {
	gulp.src('./sass/*.scss')
		.pipe(sass())
		.pipe(gulp.dest('./'))
		.pipe(browserSync.stream())
		.pipe( notify( { message: 'TASK: "sass" 👍', onLast: true } ) );
});

gulp.task('js', function() {
	gulp.src('./js/*.js')
		.pipe(jshint())
		.pipe(jshint.reporter('fail'))
		.pipe(rename(function (path) {
		    path.dirname += "/dist";
		    path.basename += ".min";
		 	path.extname = ".js"
		 }))
		.pipe(uglify())
		.pipe(gulp.dest('./js/dist'))
		.pipe( notify( { message: 'TASK: "js" 👍', onLast: true } ) );
});

gulp.task('img', function() {
	gulp.src('./img/*.{png, jpg, gif}')
		.pipe(imagemin({
			optimizationLevel: 7,
			progressive: true
		}))

		.pipe(gulp.dest('./img/dist'))
		.pipe( notify( { message: 'TASK: "img" 👍', onLast: true } ) );
});

gulp.task('watch', function() {
	gulp.watch('./sass/*.scss', ['sass']);
	gulp.watch('./js/*.js', ['js']);
	gulp.watch('./img/*.{png, jpg, gif}', ['img']);
	gulp.watch('./*.php');
});

gulp.task('default', ['serve', 'sass', 'js', 'img', 'watch']);
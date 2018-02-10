var gulp = require('gulp');
var sass = require('gulp-sass');
var jshint = require('gulp-jshint');
var imagemin = require('gulp-imagemin');
var rename = require('gulp-rename');
var uglify = require('gulp-uglify');
var notify = require('gulp-notify');
var plumber = require('gulp-plumber');
var autoprefixer = require('gulp-autoprefixer');
var browserSync = require('browser-sync').create();

// Event handler message - the variable has been added to all tasks to show an error in any one via the Terminal
var plumberErrorHandler = { errorHandler: notify.onError({
    title: 'Gulp',
    message: 'Error: <%= error.message %>'
  })
};

// BrowserSync replace with your local dev site
gulp.task('serve', function() {

	var files = [
	    './*.php',
	    './includes/*.php',
	    './sass/*.scss',
	    './js/*.js'
    ];

    browserSync.init(files, {
        proxy: 'distinctionssalon.test'
    });

    gulp.watch("./sass/*.scss", ['sass']);
    gulp.watch(files).on('change', browserSync.reload);    
});

// Compile sass into CSS & auto-inject into browsers
gulp.task('sass', function() {
    return gulp.src('./sass/*.scss')
    	.pipe(plumber(plumberErrorHandler))
        .pipe(sass())
        .pipe(autoprefixer({
            browsers: ['last 2 versions', '> 5%', 'Firefox <= 20'],
            cascade: false
        }))
        .pipe(gulp.dest("./"))
        .pipe(browserSync.stream())
        .pipe(notify( { message: 'TASK: "sass" 👍', onLast: true } ));
});

gulp.task('js', function() {
	gulp.src('./js/*.js')
		.pipe(plumber(plumberErrorHandler))
		.pipe(jshint())
		.pipe(uglify())
		.pipe(rename(function (path) {
			path.dirname += '';
			path.basename += '.min';
			path.extname = '.js'
		}))
		.pipe(gulp.dest('./js/dist'))
		.pipe(notify( { message: 'TASK: "js" 👍', onLast: true } ));
});

gulp.task('img', function() {
	gulp.src('./img/*.{png,jpg,gif}')
		.pipe(plumber(plumberErrorHandler))
		.pipe(imagemin({
			optimizationLevel: 7,
			progressive: true
		}))
		.pipe(gulp.dest('./img/dist'))
		.pipe(notify( { message: 'TASK: "img" 👍', onLast: true } ));
});

gulp.task('watch', function() {
	gulp.watch('./sass/*.scss', ['sass']);
	gulp.watch('./js/*.js', ['js']);
	gulp.watch('./img/*.{png,jpg,gif}', ['img']);
	gulp.watch('./*.php');
});

gulp.task('default', ['serve', 'sass', 'js', 'img', 'watch']);
var gulp = require('gulp');
var less = require('gulp-less');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var jshint = require('gulp-jshint');

var assets_path = 'public/assets/';
var bower_path = assets_path + 'bower/';

var paths = {
	styles: [
		assets_path + 'less/parking.less',
		assets_path + 'less/parking_custom.less',
		assets_path + 'less/parking_variables.less'
	],
	vendor_scripts: [
		bower_path + 'jquery/dist/jquery.js',
		bower_path + 'bootstrap/dist/js/bootstrap.js'
	]
}
gulp.task('styles', function(){
	gulp.src('public/assets/less/parking.less')
		.pipe(less({ compress: true }))
		.pipe(gulp.dest('public/assets/css'));
});

gulp.task('vendor_scripts', function() {
	gulp.src(paths.vendor_scripts)
		.pipe(concat('plugins.min.js'))
		.pipe(uglify({outSourceMap: true}))
		.pipe(gulp.dest('public/assets/js'))

	/*gulp.src('public/assets/js/src*//*.js')
	 .pipe(jshint())
	 .pipe(jshint.reporter('fail'))
	 .pipe(concat('app.min.js'))
	 .pipe(uglify({outSourceMap: true}))
	 .pipe(gulp.dest('public/assets/js'))*/
});

gulp.task('watch', function () {
	gulp.watch(paths.styles, ['styles']);
	gulp.watch(paths.vendor_scripts, ['vendor_scripts']);
});

gulp.task('default', ['styles','vendor_scripts','watch']);
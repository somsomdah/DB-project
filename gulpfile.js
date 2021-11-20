// Shopo Template
var gulp = require('gulp');
var browserSync = require('browser-sync').create();

var plugins = require("gulp-load-plugins")({
	pattern: ['gulp-*', 'gulp.*'],
	replaceSting: /\bgulp[\-.]/
});

var reload  = browserSync.reload;

// Bower Files - move bower files to related folders
gulp.task('copyCss', function() {
	// Copy All Css files from bower_components folder
	return gulp.src([
			'bower_components/bootstrap/dist/css/bootstrap.css',
			'bower_components/animate.css/animate.min.css',
			'bower_components/font-awesome/css/font-awesome.css'
		])
		.pipe(gulp.dest('assets/css/plugins'));
});

gulp.task('copyJs', function() {
	// Copy All Js files from bower_components folder
	return gulp.src([
			'bower_components/jquery/dist/jquery.min.js',
			'bower_components/bootstrap/dist/js/bootstrap.min.js',
			'bower_components/metisMenu/dist/metisMenu.min.js',
			'bower_components/imagesloaded/imagesloaded.pkgd.min.js',
			'bower_components/isotope/dist/isotope.pkgd.min.js',
			'bower_components/waypoints/lib/jquery.waypoints.min.js',
			'bower_components/waypoints/lib/shortcuts/sticky.min.js',
			'bower_components/owl.carousel/dist/owl.carousel.min.js',
			'bower_components/fitvids/jquery.fitvids.js',
			'bower_components/jquery-countTo/jquery.countTo.js',
			'bower_components/nouislider/distribute/nouislider.min.js',
			'bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js'
		])
		.pipe(gulp.dest('assets/js/plugins'));
});

gulp.task('copyFonts', function() {
	// Copy All Fonts files from bower_components folder
	return gulp.src([
			'bower_components/bootstrap/fonts/*',
			'bower_components/font-awesome/fonts/*'
		])
		.pipe(gulp.dest('assets/fonts/'));
});

// Js
// Concat + Minifiy Js Files and move to vendor folder
var jsFiles = ['assets/js/plugins/*.js'];
var jsDest = 'assets/js/';

gulp.task('js', ['copyJs'], function () {
	return gulp.src(jsFiles)
		.pipe(plugins.order([
			'jquery.min.js',
			'bootstrap.min.js',
			'imagesloaded.pkgd.min.js',
			'jquery.waypoints.min.js',
			'*.js'
		]))
		.pipe(plugins.concat('plugins.js'))
		.pipe(gulp.dest(jsDest));
});

// Css
// Concat + Minifiy Css Files and move to vendor folder
var cssFiles = 'assets/css/plugins/*.css';
var cssDest = 'assets/css/';

gulp.task('css',  function () {
	return gulp.src(cssFiles)
		.pipe(plugins.order([
			'bootstrap.css',
			'*.css'
		]))
		.pipe(plugins.concat('plugins.css'))
		.pipe(gulp.dest(cssDest))
		.pipe(plugins.rename({ suffix:'.min' }))
		.pipe(plugins.cssmin({keepBreaks: true, keepSpecialComments : '*' }))
		.pipe(gulp.dest(cssDest));
});


// Sass Skins files/folder
gulp.task('skins', function () {
	return gulp.src('assets/sass/skins/*.scss')
		.pipe(plugins.sass({outputStyle: 'expanded'}))
		.pipe(gulp.dest('assets/css/skins/'));
});

gulp.task('build', ['copyFonts', 'css', 'js'], function() {
	// Copy Elevetazoom to js folder - used only in product page
	return gulp.src([
			'bower_components/xzoom/dist/xzoom.min.js'
		])
		.pipe(gulp.dest('assets/js/'));
});

// Sass
var sassFile = 'assets/sass/*.scss';
var sassDest = 'assets/css/';
gulp.task('sass', function () {
	return gulp.src(sassFile)
		.pipe(plugins.sass({outputStyle: 'expanded'})) // expanded - compressed - compact - nested
		.pipe(plugins.autoprefixer({
			browsers: ['last 2 versions'],
			cascade: false
		}))
		.pipe(gulp.dest(sassDest));
});

// Sass Skins files/folder
gulp.task('skins', function () {
	return gulp.src('assets/sass/skins/*.scss')
		.pipe(plugins.sass({outputStyle: 'expanded'}))
		.pipe(plugins.autoprefixer({
			browsers: ['last 2 versions'],
			cascade: false
		}))
		.pipe(gulp.dest('assets/css/skins/'));
});

// call - gulp htmlmin
// Html files minify 
// this will make your html files minified 
// make sure to copy all html files before using this
gulp.task('htmlmin', function () {
	return gulp.src('*.html')
	    .pipe(plugins.htmlmin({
	    	collapseWhitespace: true,
	    	removeComments: true,
	    	minifyJS: true, // minify js too
	    	minifyCSS: true // minify css too
	    }))
	    .pipe(gulp.dest(''))
});

// Images - Optimize jpeg and png images
gulp.task('imagemin', function () {
	return gulp.src('assets/images/**/*')
	    .pipe(plugins.imagemin())
	    .pipe(gulp.dest('assets/images'));
});


// Sync - Livereload
gulp.task('browser-sync', ['sass'], function () {
	// Use proxy and go to localhost:3000/shopo
	browserSync.init({
		proxy: "localhost/shopo/"
	});

	// watch scss files
	gulp.watch(['assets/sass/*.scss', 'assets/sass/*/*.scss'], ['sass', reload]);

	gulp.watch([
		'*.html',
		'*.php',
		'assets/js/main.js'
	]).on('change', reload);
});

// Default Task
gulp.task('default', ['browser-sync']);
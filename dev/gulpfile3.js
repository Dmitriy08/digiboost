//used for theme path and text domain for POT file
var themeName = 'digiboost';
//yourlocalserver.com
var localServerName = '';

var authorEmail = 'support@modernwebtemplates.com';

//gulp plugins
var gulp        = require('gulp');
var browserSync = require('browser-sync').create();
var rename      = require("gulp-rename");
var clean       = require('gulp-clean');
// header provides $switcher variable to scss to add or remove switcher styles (demo and production versions)
var header      = require('gulp-header');
var sass        = require('gulp-sass');
var sassThemes  = require('gulp-sass-themes');
var sourcemaps  = require('gulp-sourcemaps');

//postCss
var postcss     = require('gulp-postcss');
var autoprefixer= require('autoprefixer');
var flexbugs    = require('postcss-flexbugs-fixes');
var stylefmt    = require('stylefmt');
var postscss    = require('postcss-scss');
var lec         = require('gulp-line-ending-corrector');
var cssbeautify = require('gulp-cssbeautify');

//tasks for buildProject
var runSequence = require('run-sequence');

//js concat
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');

//wordpress pot
var wpPot = require('gulp-wp-pot');
var sort = require('gulp-sort');

gulp.task('pot', function () {
	return gulp.src([
		'wp-content/themes/'+ themeName + '/**/*.php',
		'wp-content/themes/'+ themeName + '/*.php'
	])
		.pipe(wpPot( {
			domain: themeName,
			team: authorEmail,
			package: themeName
		} ))
		.pipe(gulp.dest('wp-content/themes/'+ themeName + '/languages/'+ themeName + '.pot'));
});


// Static Server + watching scss/js/php files
gulp.task('serve', ['sass'], function() {

	browserSync.init({
		// server: {
		// 	baseDir: "./"
		// }
		proxy: localServerName
	});

	gulp.watch('wp-content/themes/'+ themeName + '/scss/**/*.scss', ['sass']);
	gulp.watch('wp-content/plugins/mwt-demo-theme/scss/**/*.scss', ['sassDemoSwitcher']);

	//js and HTML files to reload on save
	gulp.watch([
		'wp-content/themes/'+ themeName + '/**/*.php',
		'wp-content/themes/'+ themeName + '/*.php',
		'wp-content/themes/'+ themeName + '/js/*.js',
		'wp-content/themes/'+ themeName + '/**/*.js',
	]).on('change', browserSync.reload);
});

// Compile sass into CSS & auto-inject into browsers
// header provides $switcher variable to scss to add or remove switcher styles (demo and production versions)
// sourcemaps + swithcer styles
gulp.task('sass', function() {

	return gulp.src('wp-content/themes/'+ themeName + '/scss/**/*.scss')
		.pipe(sourcemaps.init())
		.pipe(header('$switcher: true;\n'))
		.pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
		// .pipe(lec({verbose:true, eolc: 'LF', encoding:'utf8'}))
		.pipe(sourcemaps.write('../../sourcemaps'))
		.pipe(gulp.dest('wp-content/themes/'+ themeName + '/css'))
		.pipe(browserSync.stream({match: '**/*.css'}));

	// outputStyle
	// Type: String Default: nested Values: nested, expanded, compact, compressed
});


// Compile sass for production - no swithcer styles, no sourcemaps
gulp.task('sassProduction', function() {
	return gulp.src('wp-content/themes/' + themeName + '/scss/**/*.scss')
		.pipe(header('$switcher: false;\n'))
		.pipe(sassThemes('wp-content/themes/'+ themeName + '/scss/color_schemes/_*.scss', {placeholder: /^[^_].*(\.(scss|sass))$/}))
		.pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
		.pipe(postcss([ autoprefixer({
			"browsers": [
				"> 0.05%"
			]
		}), flexbugs(), stylefmt(
			{
				"extends": "stylelint-config-suitcss",
				"rules": {
					"indentation": "tab",
					"number-leading-zero": null
				}
			}
		)]))
		.pipe(lec({verbose:true, eolc: 'LF', encoding:'utf8'}))
		.pipe(gulp.dest('wp-content/themes/' + themeName + '/css'))
});

// Compile sass for production - no swithcer styles, no sourcemaps
gulp.task('sassDemoSwitcher', function() {
	return gulp.src('wp-content/plugins/mwt-demo-theme/scss/**/*.scss')
		.pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
		.pipe(postcss([ autoprefixer({
			"browsers": [
				"> 0.05%"
			]
		}), flexbugs(), stylefmt(
			{
				"extends": "stylelint-config-suitcss",
				"rules": {
					"indentation": "tab",
					"number-leading-zero": null
				}
			}
		)]))
		.pipe(lec({verbose:true, eolc: 'LF', encoding:'utf8'}))
		.pipe(gulp.dest('wp-content/plugins/mwt-demo-theme/css'))
		.pipe(browserSync.stream({match: '**/*.css'}));
});

//clean generated files
gulp.task('cssDeleteGeneratedCssFiles', function() {
	return gulp.src([
		'wp-content/themes/' + themeName + '/css/main.css',
		'wp-content/themes/' + themeName + '/css/shop.css',
		'wp-content/themes/' + themeName + '/css/booked.css',
		'wp-content/themes/' + themeName + '/css/main*.css',
		'wp-content/themes/' + themeName + '/css/shop*.css',
		'wp-content/themes/' + themeName + '/css/booked*.css',
		'wp-content/themes/' + themeName + '/css/bootstrap.css'
	])
		.pipe(clean());
});

//for color schemes - default color scheme without number (1)
gulp.task('cssRenameDefaultCssFiles', function() {
	return gulp.src([
		'wp-content/themes/' + themeName + '/css/main1.css',
		'wp-content/themes/' + themeName + '/css/shop1.css',
		'wp-content/themes/' + themeName + '/css/booked1.css'
	])
		.pipe(rename(function (path) {
			path.basename = path.basename.replace('1', '');
		}))
		.pipe(gulp.dest('wp-content/themes/' + themeName + '/css'));
});
gulp.task('cssDeleteDefaultCssFiles', function() {
	return gulp.src([
		'wp-content/themes/' + themeName + '/css/main1.css',
		'wp-content/themes/' + themeName + '/css/shop1.css',
		'wp-content/themes/' + themeName + '/css/booked1.css'
	])
		.pipe(clean());
});

gulp.task('buildProject', function() {
	runSequence(
		'cssDeleteGeneratedCssFiles',
		'sassProduction',
		'cssRenameDefaultCssFiles',
		'cssDeleteDefaultCssFiles',
		'pot'
	)
});

gulp.task('cssbeautify', function() {
	//all CSS files except:
	//fonts.css
	//bootstrap.min.css
	//animations.css
	return gulp.src([
		'wp-content/themes/'+ themeName + '/css/*.css',
		'!wp-content/themes/'+ themeName + '/css/animations.css',
		'!wp-content/themes/'+ themeName + '/css/bootstrap.min.css',
		'!wp-content/themes/'+ themeName + '/css/fonts.css',
		// 'css/main.css',
		// 'css/main2.css',
		// 'css/main3.css',
	])
		.pipe(cssbeautify({
			indent: '	',
			// openbrace: 'separate-line',
			// autosemicolon: true
		}))
		.pipe(gulp.dest('./css'));
});

gulp.task('default', ['serve']);

// JS task - running manually - concat, strip debugging and minify
gulp.task('scripts', function() {
	gulp.src([
		// 'js/vendor/jquery-2.2.4.min.js',
		'wp-content/themes/'+ themeName + '/js/vendor/bootstrap.min.js',
		'wp-content/themes/'+ themeName + '/js/vendor/jquery.appear.js',
		'wp-content/themes/'+ themeName + '/js/vendor/jquery.hoverIntent.js',
		'wp-content/themes/'+ themeName + '/js/vendor/superfish.js',
		'wp-content/themes/'+ themeName + '/js/vendor/jquery.easing.1.3.js',
		'wp-content/themes/'+ themeName + '/js/vendor/jquery.ui.totop.js',
		'wp-content/themes/'+ themeName + '/js/vendor/jquery.localScroll.min.js',
		'wp-content/themes/'+ themeName + '/js/vendor/jquery.scrollTo.min.js',
		'wp-content/themes/'+ themeName + '/js/vendor/jquery.scrollbar.min.js', //NEW side header scroll
		'wp-content/themes/'+ themeName + '/js/vendor/jquery.parallax-1.1.3.js',
		'wp-content/themes/'+ themeName + '/js/vendor/jquery.easypiechart.min.js',
		'wp-content/themes/'+ themeName + '/js/vendor/bootstrap-progressbar.min.js',
		'wp-content/themes/'+ themeName + '/js/vendor/jquery.countTo.js',
		'wp-content/themes/'+ themeName + '/js/vendor/jquery.prettyPhoto.js',
		'wp-content/themes/'+ themeName + '/js/vendor/jquery.countdown.min.js',

		// following not needed - isotope now inits on window load - not on images load
		// 'wp-content/themes/'+ themeName + '/js/vendor/imagesloaded.pkgd.min.js',

		'wp-content/themes/'+ themeName + '/js/vendor/isotope.pkgd.min.js',
		'wp-content/themes/'+ themeName + '/js/vendor/owl.carousel.min.js',
		'wp-content/themes/'+ themeName + '/js/vendor/jquery.flexslider-min.js',

		// following 5 scripts not need in WordPress - they will be provided by widgets and plugins
		// 'wp-content/themes/'+ themeName + '/js/vendor/jflickrfeed.min.js',
		// 'wp-content/themes/'+ themeName + '/js/vendor/jquery-ui.min.js',
		// 'wp-content/themes/'+ themeName + '/js/vendor/price-slider.min.js',
		'wp-content/themes/'+ themeName + '/js/vendor/jquery.cookie.js',
		// 'twitter/jquery.tweet.min.js',

		// following layerslider scripts - for layerslider (medico template)
		// 'layerslider/js/greensock.js',
		// 'layerslider/js/layerslider.transitions.js',
		// 'layerslider/js/layerslider.kreaturamedia.jquery.js',

		// following script (plugins.js) contains our custom 'addWidthClass' plugin
		'wp-content/themes/'+ themeName + '/js/plugins.js',
		// 'js/main.js'
	])
		.pipe(uglify({
			output: {
				comments: "/^!|opyright/"
			}
		}))
		.pipe(concat('compressed.js'))
		.pipe(gulp.dest('wp-content/themes/'+ themeName + '/js/'));
});

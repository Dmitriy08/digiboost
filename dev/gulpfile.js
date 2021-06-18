//used for theme path and text domain for POT file
const themeName = 'digiboost';
//yourlocalserver.com
const localServerName = 'wp/digiboost';

const authorEmail = 'support@modernwebtemplates.com';

//gulp plugins
const { series, parallel, src, task, dest, watch } = require('gulp');
const browserSync = require('browser-sync').create();
const rename      = require("gulp-rename");
const clean       = require('gulp-clean');
// header provides $switcher variable to scss to add or remove switcher styles (demo and production versions)
const header      = require('gulp-header');
const sass        = require('gulp-sass');
const sassThemes  = require('gulp-sass-themes');
const sourcemaps  = require('gulp-sourcemaps');

//postCss
const postcss     = require('gulp-postcss');
const autoprefixer= require('autoprefixer');
const flexbugs    = require('postcss-flexbugs-fixes');
const stylefmt    = require('stylefmt');
const postscss    = require('postcss-scss');
const lec         = require('gulp-line-ending-corrector');
const cssbeautify = require('gulp-cssbeautify');
const zip         = require('gulp-zip');
//tasks for buildProject
const runSequence = require('run-sequence');

//js concat
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');

//wordpress pot
const wpPot = require('gulp-wp-pot');
const sort = require('gulp-sort');

// Compile sass into CSS & auto-inject into browsers
// header provides $switcher variable to scss to add or remove switcher styles (demo and production versions)
// sourcemaps + swithcer styles
task('scss', (done) => {
	src('wp-content/themes/'+ themeName + '/scss/**/*.scss')
		.pipe(sourcemaps.init())
		.pipe(header('$switcher: true;\n'))
		.pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
		.pipe(lec({verbose:true, eolc: 'LF', encoding:'utf8'}))
		.pipe(sourcemaps.write('../../sourcemaps'))
		.pipe(dest('wp-content/themes/'+ themeName + '/css'))
		.pipe(browserSync.stream({ match: '**/*.css' }));

	done();
});

task('pot', (done) => {
	src([
		'wp-content/themes/'+ themeName + '/**/*.php',
		'wp-content/themes/'+ themeName + '/*.php'
	])
		.pipe(wpPot( {
			domain: themeName,
			team: authorEmail,
			package: themeName
		} )).pipe(dest('wp-content/themes/' + themeName + '/languages/' + themeName + '.pot'));

	done();
});

// Static Server + watching scss/js/php files
task('serve', (done) => {

	browserSync.init({
		// server: {
		// 	baseDir: "./"
		// }
		proxy: localServerName
	});

	watch('wp-content/themes/'+ themeName + '/scss/**/*.scss', series('scss'));
	watch('wp-content/plugins/mwt-demo-theme/scss/**/*.scss', series('scssDemoSwitcher'));

	//js and HTML files to reload on save
	watch([
		'wp-content/themes/' + themeName + '/**/*.php',
		'wp-content/themes/' + themeName + '/*.php',
		'wp-content/themes/' + themeName + '/js/*.js',
		'wp-content/themes/' + themeName + '/**/*.js',
	]).on('change', () => {
		browserSync.reload();
		done();
	});

	done();
});

// Compile sass for production - no swithcer styles, no sourcemaps
task('scssProduction', () => {
	return src('wp-content/themes/' + themeName + '/scss/**/*.scss')
		//.pipe(header('$switcher: false;\n'))
		.pipe(sassThemes('wp-content/themes/' + themeName + '/scss/color_schemes/_*.scss', { placeholder: /^[^_].*(\.(scss|sass))$/ }))
		.pipe(sass({ outputStyle: 'expanded' }).on('error', sass.logError))
		.pipe(postcss([autoprefixer({
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
		.pipe(lec({ verbose: true, eolc: 'LF', encoding: 'utf8' }))
		.pipe(dest('wp-content/themes/' + themeName + '/css'));
});

// Compile scss for production - no swithcer styles, no sourcemaps
task('scssDemoSwitcher', (done) => {
	src('wp-content/plugins/mwt-demo-theme/scss/**/*.scss')
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
		.pipe(dest('wp-content/plugins/mwt-demo-theme/css'))
		.pipe(browserSync.stream({ match: '**/*.css' }));

	done();
});

//clean generated files
task('clean', (done) => {
	src([
		'wp-content/themes/' + themeName + '/css/main.css',
		'wp-content/themes/' + themeName + '/css/shop.css',
		'wp-content/themes/' + themeName + '/css/main*.css',
		'wp-content/themes/' + themeName + '/css/shop*.css',
		'wp-content/themes/' + themeName + '/css/booked.css',
		'wp-content/themes/' + themeName + '/css/booked*.css',
	], { allowEmpty: true })
		.pipe(clean());

	done();
});

//for color schemes - default color scheme without number (1)
task('cssRenameDefaultCssFiles', (done) => {
	src([
		'wp-content/themes/' + themeName + '/css/main1.css',
		'wp-content/themes/' + themeName + '/css/shop1.css',
		'wp-content/themes/' + themeName + '/css/booked1.css',
	], { allowEmpty: true })
		.pipe(rename(function (path) {

			path.basename = path.basename.replace('1', '');

		}))
		.pipe(dest('wp-content/themes/' + themeName + '/css'));
	done();
});

task('cssDeleteDefaultCssFiles', (done) => {
	src([
		'wp-content/themes/' + themeName + '/css/main1.css',
		'wp-content/themes/' + themeName + '/css/shop1.css',
		'wp-content/themes/' + themeName + '/css/booked1.css'
	],{ allowEmpty: true })
		.pipe(clean());
	done();
});

task('cssbeautify', (done) => {
	//all CSS files except:
	//fonts.css
	//bootstrap.min.css
	//animations.css
	src([
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
		.pipe(dest('./css'));

	done();
});

// JS task - running manually - concat, strip debugging and minify
task('scripts', (done) => {
	src([
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
		.pipe(dest('wp-content/themes/' + themeName + '/js/'));

	done();
});

task('zipTheme', function(done) {
	src([
		'wp-content/themes/**/'+ themeName+'/**/*',
		'!wp-content/themes/'+ themeName+ '/dev',
		'!wp-content/themes/'+ themeName+ '/dev/**/*',
		'!wp-content/themes/'+ themeName+ '/.git',
		'!wp-content/themes/'+ themeName+ '/.git/*',
		'!wp-content/themes/'+ themeName+ '/.gitignore',
		'!wp-content/themes/'+ themeName+ '/scss/error_log.log',
		'!wp-content/themes/'+ themeName+ '/**/*/.DS_Store',
	])
		.pipe(zip(themeName+'.zip'))
		.pipe(dest('wp-content/themes/')
		);
	done();
});

exports.default = parallel('scss', 'serve');
exports.buildProject = series('clean', 'scssProduction', 'cssRenameDefaultCssFiles', 'cssDeleteDefaultCssFiles','pot');

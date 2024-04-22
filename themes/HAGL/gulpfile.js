// Variable
var {src, dest, ...gulp} = require('gulp'),
    browserSync = require('browser-sync').create(),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    minifyCSS = require('gulp-minify-css'),
    sourcemaps = require('gulp-sourcemaps'),
    sass = require('gulp-sass')(require('sass'));
    header = require('gulp-header');


// Gulp-SAAS
gulp.task('sass', function() {
  return src(['assets/src/scss/style.scss'])
    .pipe(sourcemaps.init())
    .pipe(sass())
    .pipe(dest('assets/css')) // concatinated css file
    .pipe(concat('style.min.css')) // concatinated css file sass/style.scss
    .pipe(minifyCSS({processImport: false}))
    .pipe(sourcemaps.write('.'))
    .pipe(dest('assets/css')) // minified css file css/style.min.css
    .pipe(browserSync.reload({
      stream: true // watched by BrowserSync
    }))
});

gulp.task('responsive', function(){
  return src(['assets/src/scss/responsive.scss'])
    .pipe(sourcemaps.init())
    .pipe(sass())
    .pipe(dest('assets/css')) // concatinated css file
    .pipe(concat('responsive.min.css')) // concatinated css file sass/style.scss
    .pipe(minifyCSS({processImport: false}))
    .pipe(sourcemaps.write('.'))
    .pipe(dest('assets/css')) // minified css file css/style.min.css
    .pipe(browserSync.reload({
      stream: true // watched by BrowserSync
    }))
});

gulp.task('icon', function(){
  return src('assets/src/scss/icon/icon.scss')
    .pipe(sourcemaps.init())
    .pipe(sass())
    .pipe(dest('assets/css')) // concatinated css file
    .pipe(concat('icon.min.css')) // concatinated css file sass/style.scss
    .pipe(minifyCSS({processImport: false}))
    .pipe(sourcemaps.write('.'))
    .pipe(dest('assets/css')) // minified css file css/style.min.css
    .pipe(browserSync.reload({
      stream: true // watched by BrowserSync
    }))
});

gulp.task('vendors', function(){
  return src('assets/src/scss/vendors/**/*.scss')
    .pipe(sourcemaps.init())
    .pipe(sass())
    .pipe(dest('assets/css')) // concatinated css file
    .pipe(concat('vendors.min.css')) // concatinated css file sass/style.scss
    .pipe(minifyCSS({processImport: false}))
    .pipe(sourcemaps.write('.'))
    .pipe(dest('assets/css')) // minified css file css/style.min.css
    .pipe(browserSync.reload({
      stream: true // watched by BrowserSync
    }))
});

gulp.task('hagl', function() {
	return src(['assets/src/scss/hagl.scss'])
			.pipe(sourcemaps.init())
			.pipe(sass())
			.pipe(dest('assets/css')) // concatinated css file
			.pipe(concat('hagl.min.css')) // concatinated css file sass/style.scss
			.pipe(minifyCSS({processImport: false}))
			.pipe(sourcemaps.write('.'))
			.pipe(dest('assets/css')) // minified css file css/style.min.css
			.pipe(browserSync.reload({
			stream: true // watched by BrowserSync
			}))
	});

// Gulp-concat & gulp-uglify
gulp.task('concat-vendors', function () {
  src([
    'assets/src/js/vendors/*.js'
  ])
   .pipe(concat('vendors.js')) // concatinated js file
   .pipe(dest('assets/js')); // js/vendors.js

  src([
    'assets/src/js/vendors/*.js'
  ])
   .pipe(concat('vendors.min.js'))
   .pipe(uglify({ output: { comments: /^!/ } })) // minified js file js/vendors.min.js
   .pipe(dest('assets/js')); // js/vendors.min.js
});

// Browser sync
// gulp.task('browserSync', function(){
//   browserSync.init({
//     watchTask: true,
//     online: true,
//     server: {
//       baseDir: './'
//     }
//   });
// });

// Gulp watch
gulp.task('default', gulp.parallel('sass','icon','vendors','concat-vendors','responsive','hagl', function (done){
  gulp.watch('assets/src/scss/**/*.scss').on('change', gulp.series('sass'));
  gulp.watch('assets/src/scss/hagl/*.scss').on('change', gulp.series('hagl'));
  gulp.watch('assets/src/scss/icon/*.scss').on('change', gulp.series('icon'));
  gulp.watch('assets/src/scss/vendors/**/*.scss').on('change', gulp.series('vendors'));
  gulp.watch('assets/src/js/vendors/*.js').on('change', gulp.series('concat-vendors'));
//   gulp.watch(['sass/theme-responsive/**/*.scss', 'sass/responsive.scss']).on('change', gulp.series('responsive'));
  done()
}))

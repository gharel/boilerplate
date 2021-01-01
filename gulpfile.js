const gulp = require('gulp')
const concat = require('gulp-concat')
const sourcemaps = require('gulp-sourcemaps')
const babel = require('gulp-babel')
const sass = require('gulp-sass')
const postcss = require('gulp-postcss')
const imagemin = require('gulp-imagemin')
const rename = require('gulp-rename')
const csso = require('gulp-csso')
const uglify = require('gulp-uglify')
const autoprefixer = require('autoprefixer')
const browsersync = require('browser-sync')
const iconfont = require('gulp-iconfont')
const iconfontcss = require('gulp-iconfont-css')
const timestamp = Math.round(Date.now() / 1000)
const font = 'icons'

const dest = './web/medias/'
const src = './web/src/'
const web = './web/'
const domain = 'bci-net.local'

gulp.task('iconfont', () => {
	return gulp.src([src + 'media/icons/*.svg'])
		.pipe(iconfontcss({
			fontName: font,
			targetPath: '../../src/scss/4.generic/_icons-generated.scss',
			fontPath: '../../medias/fonts/',
			cssClass: 'ico'
		}))
		.pipe(iconfont({
			fontName: font,
			formats: ['ttf', 'eot', 'woff', 'woff2', 'svg'], // default, 'woff2' and 'svg' are available
			timestamp: timestamp,
			normalize: true,
			fontHeight: 1001
		}))
		.pipe(gulp.dest(dest + 'fonts/'))
})

gulp.task('style', () => {
	return gulp.src(src + 'scss/*.scss')
		.pipe(sourcemaps.init())
		.pipe(sass())
		.pipe(postcss([autoprefixer()]))
		.pipe(sourcemaps.write('.'))
		.pipe(gulp.dest(dest + 'style'))
		.pipe(browsersync.reload({ stream: true }))
})

gulp.task('minify-css', gulp.series('style', () => {
	return gulp.src([dest + 'style/*.css', '!' + dest + 'style/*.min.css'])
		.pipe(csso())
		.pipe(rename({ suffix: '.min' }))
		.pipe(gulp.dest(dest + 'style'))
}))

gulp.task('script', () => {
	return gulp.src(src + 'js/*.js')
		.pipe(sourcemaps.init())
		.pipe(babel({ presets: ['@babel/preset-env'] }))
		.pipe(sourcemaps.write('.'))
		.pipe(gulp.dest(dest + 'script'))
		.pipe(browsersync.reload({ stream: true }))
})

gulp.task('minify-js', gulp.series('script', () => {
	return gulp.src([dest + 'script/*.js', '!' + dest + 'script/*.min.js' ])
		.pipe(uglify())
		.pipe(rename({ suffix: '.min' }))
		.pipe(gulp.dest(dest + 'script'))
}))

gulp.task('image', () => {
	return gulp.src(src + 'media/img/*')
		.pipe(imagemin({ verbose: true }))
		.pipe(gulp.dest(dest + 'image'))
})

gulp.task('svg', () => {
	return gulp.src([src + 'media/svg/*', '!' + src + 'media/svg/**/*'])
		.pipe(imagemin({ verbose: true }))
		.pipe(gulp.dest(dest + 'image'))
})

gulp.task('reload', () => {
	return browsersync.reload()
})

gulp.task('watch', () => {
	gulp.watch([src + 'scss/**/*.scss'], gulp.series('style'))
	gulp.watch([src + 'js/*.js'], gulp.series('script'))
	gulp.watch([src + 'media/icons/*'], gulp.series('iconfont'))
	gulp.watch([src + 'media/img/*'], gulp.series('image', 'reload'))
	gulp.watch([src + 'media/svg/*', '!' + src + 'media/svg/*/*'], gulp.series('svg', 'reload'))
	gulp.watch([web + '*.php', web + '*.html', web + 'pages/*.html'], gulp.series('reload'))
})

gulp.task('build', gulp.series('image', 'svg', 'style', 'minify-css', 'script', 'minify-js', 'iconfont'))

gulp.task('browser-sync', gulp.series('build', () => {
	return browsersync.init({
		proxy: domain,
		port: 3333
	})
}))

gulp.task('default', gulp.parallel('browser-sync', 'watch'))

const gulp = require('gulp')
const del = require('del');
const livereload = require('gulp-livereload')
const rename = require('gulp-rename')
const less = require('gulp-less')
const autoprefixer = require('gulp-autoprefixer')
const combineMq = require('gulp-combine-mq')
const cssnano = require('gulp-cssnano')
const concat = require('gulp-concat')
const uglify = require('gulp-uglify')
const svgstore = require('gulp-svgstore')

const dist = '../transitions-dist';

const buildCss = () => {
    return gulp.src('./src/app/style/style.less')
        .pipe(less({
            plugins: [ require('less-plugin-glob') ]
        }))
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            flexbox: 'no-2009'
            // cascade: false
        }))
        .pipe(combineMq({
            beautify: true
        }))
        // .pipe(rename('style.css'))
        .pipe(gulp.dest(dist))
        .pipe(livereload())
}

const buildSvg = () => {
	return gulp.src(['./src/app/icons/*.svg'])
		.pipe(svgstore({ inlineSvg: true }))
		.pipe(rename({ 
			basename: 'icon-defs',
			extname: '.php',			
		}))
		.pipe(gulp.dest('./src/app/components/icon'))
		.pipe(livereload())
}

const buildJs = () => {
	return gulp.src(['./src/**/*.js'])
		.pipe(concat('script.js'))
		.pipe(gulp.dest(dist))
		.pipe(livereload())
}

const copyPhpTemplates = () => {
	return gulp.src(['./src/**/*.php', './src/README.txt', './src/screenshot.png'])
		.pipe(rename({dirname: ''}))
		.pipe(gulp.dest(dist))
		.pipe(livereload())
}

const clean = () => {
	return del([ dist ],{ force: true });
}

const watch = () => {
    livereload.listen()
    gulp.watch([
		'./src/**/*.less',
		'./src/**/*.css',
	], buildCss)
	gulp.watch([
		'./src/**/*.js',
	], buildJs)
	gulp.watch([
		'./src/**/*.php',
		'./src/**/*.html',
		'!./**/icon-defs.php'
	], copyPhpTemplates)
	gulp.watch([
		'./src/**/*.svg',
	], gulp.series(buildSvg, copyPhpTemplates))
}


const build = gulp.series(clean, buildSvg, gulp.parallel(buildJs, buildCss, copyPhpTemplates));
gulp.task('default', build)
gulp.task('dev', gulp.series(build, watch))


// const minifyCSS = () => {
//     return gulp.src('./dist/hesh.css')
//         .pipe(cssnano())
//         .pipe(rename(path => path.basename += '.min'))
//         .pipe(gulp.dest(dist))
// }

// const minifyJS = () => {
//     return gulp.src('./dist/hesh.js')
//         .pipe(uglify())
//         .pipe(rename(path => path.basename += '.min'))
//         .pipe(gulp.dest(dist))
// }

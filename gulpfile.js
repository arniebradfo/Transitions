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

const buildCSS = () => {
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

const copyPhpTemplates = () => {
	return gulp.src(['./src/**/*.php', './src/README.txt', './src/screenshot.png'])
		.pipe(rename({dirname: ''}))
		.pipe(gulp.dest(dist))
		.pipe(livereload())
}

const clean = () => {
	return del([ dist ],{ force: true });
}

// const minifyCSS = () => {
//     return gulp.src('./dist/hesh.css')
//         .pipe(cssnano())
//         .pipe(rename(path => path.basename += '.min'))
//         .pipe(gulp.dest(dist))
// }

// const buildJS = () => {
//     const codemirrorPath = './node_modules/codemirror/'

//     return gulp.src([

//         // CodeMirror Core
//         codemirrorPath + 'lib/codemirror.js',

//         // Modes
//         codemirrorPath + 'mode/xml/xml.js',
//         codemirrorPath + 'mode/javascript/javascript.js',
//         codemirrorPath + 'mode/css/css.js',
//         codemirrorPath + 'mode/htmlmixed/htmlmixed.js',
//         codemirrorPath + 'mode/clike/clike.js',
//         codemirrorPath + 'mode/php/php.js',
//         './src/shortcode.js',
//         './src/wordpresspost.js',

//         // AddOns
//         codemirrorPath + 'addon/selection/active-line.js',
//         codemirrorPath + 'addon/search/searchcursor.js',
//         codemirrorPath + 'addon/search/search.js',
//         codemirrorPath + 'addon/dialog/dialog.js',
//         codemirrorPath + 'addon/scroll/simplescrollbars.js',
//         codemirrorPath + 'addon/comment/comment.js',

//         codemirrorPath + 'addon/fold/foldcode.js',
//         codemirrorPath + 'addon/fold/foldgutter.js',
//         codemirrorPath + 'addon/fold/xml-fold.js',
//         // codemirrorPath + 'addon/fold/brace-fold.js', // for JS
//         // codemirrorPath + 'addon/fold/comment-fold.js',
//         codemirrorPath + 'addon/fold/indent-fold.js',

//         codemirrorPath + 'addon/edit/matchbrackets.js',
//         codemirrorPath + 'addon/edit/matchtags.js',
//         codemirrorPath + 'addon/search/match-highlighter.js',
//         codemirrorPath + 'addon/edit/closetag.js',
//         codemirrorPath + 'addon/edit/closebrackets.js',

//         codemirrorPath + 'keymap/sublime.js',
//         codemirrorPath + 'keymap/emacs.js',
//         codemirrorPath + 'keymap/vim.js',

//         // ... and finally ...
//         // HESH
//         './src/hesh.dev.js',
//     ])
//         .pipe(concat('hesh.js'))
//         .pipe(gulp.dest(dist))
//         .pipe(livereload())
// }

// const minifyJS = () => {
//     return gulp.src('./dist/hesh.js')
//         .pipe(uglify())
//         .pipe(rename(path => path.basename += '.min'))
//         .pipe(gulp.dest(dist))
// }

const watch = () => {
    livereload.listen()
    gulp.watch([
        './src/**/*'
    ], build)
}

// const minify = gulp.series(gulp.parallel(minifyCSS, minifyJS))
// const build = gulp.series(gulp.parallel(buildCSS, buildJS), minify)
const build = gulp.series(clean, gulp.parallel(buildCSS, copyPhpTemplates));

gulp.task('default', build)
gulp.task('dev', gulp.series(build, watch))

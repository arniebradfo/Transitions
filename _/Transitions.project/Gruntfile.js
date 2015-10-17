module.exports = function(grunt) {

	// Project configuration.
	grunt.initConfig({

	pkg: grunt.file.readJSON('package.json'),


	concat: {
		// options: {
		//   separator: ';',
		// },
		dist: {
		src: [
			'js/_open.js',
			'js/libs/include/*.js',
			'js/jquery/include/*.js',
			'js/_close.js',
		],
		dest: 'js/build/functions.global.js',
		},
	},

	uglify: {
		my_target:{
		files:{
			'../js/functions.js':['js/build/functions.global.js',] 
			// syntax is - 'destination':['source','source']
		}
		}
	},

	sass: {
		dist: {
		options:{
			style:'nested' // nested, compact, compressed, expanded
		},
		files: {
			'css/build/global.css': 'css/--global.scss'
			// syntax is - 'destination':'source',
		}
		}
	},

	autoprefixer: {
		options: {
		browsers: ['> 5%', 'Firefox > 20', 'Chrome > 20', 'ie > 7','Safari > 4', 'Opera > 11']
		},
		multiple_files: {
		expand: true,
		flatten: true,
		src: 'css/build/*.css',
		dest: 'css/build/prefixed/'
		}
	},

	cmq: {
		options: {
		log: false
		},
		your_target: {
		files: {
			'css/build/cmq': ['css/build/prefixed/global.css']
		}
		}
	},

	cssmin: {
		combine: {
		files: {
			'../../style.css': ['css/build/cmq/global.css']
			// syntax is - 'destination':['source','source']
		}
		}
	},

	// SVGSTORE DOES ALL THIS JUNK
	// svgmin: {                   // Task
	//   options: {                  // Configuration that will be passed directly to SVGO
	//     plugins: [                // master list of SVGO plugins - https://github.com/svg/svgo/tree/master/plugins
	//         // { removeViewBox: false },               // don't remove the viewbox atribute from the SVG
	//         // { removeUselessStrokeAndFill: false },  // don't remove Useless Strokes and Fills
	//         // { removeEmptyAttrs: false }             // don't remove Empty Attributes from the SVG
	//     ]
	//   },
	//   dist: {                     // Target
	//     files: [{                 // Dictionary of files
	//       expand: true,           // Enable dynamic expansion.
	//       cwd: 'svg/full/',       // Src matches are relative to this path.
	//       src: [
	//         'buttons/*.svg',
	//         // 'logos/*.svg'
	//       ],                    // Actual pattern(s) to match. - ['**/*.svg']
	//       dest: 'svg/min/',     // Destination path prefix.
	//       ext: '.min.svg'       // Dest filepaths will have this extension.
	//       // ie: optimise svg/everything.svg and store it in svg/min/everything.min.svg
	//     }]
	//   }
	// },

	svgstore: {
		options: {
		prefix : 'icon-', // This will prefix each <symbol> ID
		svg: { // will be added as attributes to the resulting SVG
			style : "display: none;"
		},
		includedemo: true,
		cleanup: true, // true - removes all inline styles - ??? - ['fill']
		cleanupdefs: true,
		formatting: {
			indent_size: 4,
			indent_char: '',
			brace_style: 'expand' 
		}
		},
		default : {
		files: {
			// 'svg/build/svg-defs-nav.svg':      ['svg/full/nav/*.svg'],
			// 'svg/build/svg-defs-social.svg':   ['svg/full/social/*.svg'],
			// 'svg/build/svg-defs-logos.svg':    ['svg/full/logos/*.svg'],
			'svg/build/svg-defs-icons.svg':    ['svg/full/icons/*.svg']
		}
		}
	},

	watch:{
		scripts: {
		files: ['js/*.js','js/libs/include/*.js','js/jquery/include/*.js'],
		tasks: ['concat', 'uglify'], //['jshint', 'concat', 'uglify']
		options: {
			spawn: false,
		}
		},
		css: {
		files: ['css/*.scss'],
		tasks: ['sass', 'autoprefixer', 'cmq', 'cssmin'], //['sass', 'autoprefixer', "CMQ", 'cssmin']
		options: {
			spawn: false,
		}
		},
		grunt: {
		files: ['Gruntfile.js']
		}
	},

	devUpdate: {
		main: {
			options: {
				updateType: 'prompt', 
				reportUpdated: false, //don't report up-to-date packages
				semver: false, // true - stay within semver when updating | false - update all regardless
				packages: {
					devDependencies: true, //only check for devDependencies
					dependencies: false
				},
				packageJson: null, //use matchdep default findup to locate package.json
				reportOnlyPkgs: [] //use updateType action on all packages
			}
		}
	}

	});

	// Load the plugins that provide desired task.
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-uglify');

	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-autoprefixer');
	grunt.loadNpmTasks('grunt-combine-media-queries');
	grunt.loadNpmTasks('grunt-contrib-cssmin');

	// grunt.loadNpmTasks('grunt-svgmin');
	grunt.loadNpmTasks('grunt-svgstore');
	// img min
	// js hint / lint
	// css hint / lint
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-dev-update');

	// Default task(s).
	grunt.registerTask('default', ['concat', 'uglify', 'sass', 'autoprefixer', 'cmq', 'cssmin']);

	require('load-grunt-tasks')(grunt);

};
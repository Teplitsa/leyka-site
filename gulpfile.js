var basePaths = { // Paths for source and bundled parts of app
		src: 'src/', dest: 'assets/', npm: 'node_modules/', bower: 'bower_components/'
	},
	gulp = require( 'gulp' ), // Require plugins
	es = require( 'event-stream' ),
	gutil = require( 'gulp-util' ),
	path = require('path'),
	runSequence = require( 'run-sequence' ),
	del = require( 'del' ),
	log = require('fancy-log'),
	plugins = require( 'gulp-load-plugins' )({ // Plugins - load gulp-* plugins without direct calls
		pattern: [ 'gulp-*', 'gulp.*' ], replaceString: /\bgulp[\-.]/
	}),
	// Env - call gulp --prod to go into production mode
	sassStyle = 'expanded', // SASS syntax
	sourceMap = true, // Wheter to build source maps
	isProduction = false, // Mode flag
	changeEvent = function( evt ) { // Log
		gutil.log( 'File', gutil.colors.cyan( evt.path.replace( new RegExp( '/.*(?=/' + basePaths.src +
																			')/' ), '' ) ), 'was', 		gutil.colors.magenta( evt.type ) );
	};

if ( true === gutil.env.prod ) {
	isProduction = true;
	sassStyle = 'compressed';
	sourceMap = false;
}

//js
gulp.task( 'build-js', function() {
	
	var vendorFiles = [
		basePaths.npm + 'bootstrap/dist/js/bootstrap.js'
	], appFiles = [ basePaths.src + 'js/*.js', basePaths.src + 'js/utils/*.js', basePaths.src + 'js/front/*.js' ]; //our own JS files

	return gulp.src( vendorFiles.concat( appFiles ) ) //join them
		.pipe( plugins.concat( 'bundle.js' ) )//combine them into bundle.js
		.pipe( isProduction ? plugins.uglify() : gutil.noop() ) //minification
		.pipe( plugins.size() ) //print size for log
		.on( 'error', console.log ) //log
		.pipe( gulp.dest( basePaths.dest + 'js' ) ); //write results into file
});

//js
gulp.task( 'build-admin-js', function() {
	var vendorFiles = [
		// basePaths.npm + 'imagesloaded/imagesloaded.pkgd.js'
	], appFiles = [ basePaths.src + 'js/*.js', basePaths.src + 'js/utils/*.js', basePaths.src + 'js/admin/*.js' ]; //our own JS files

	return gulp.src( vendorFiles.concat( appFiles ) ) //join them
		.pipe( plugins.concat( 'admin.js' ) )//combine them into bundle.js
		.pipe( isProduction ? plugins.uglify() : gutil.noop() ) //minification
		.pipe( plugins.size() ) //print size for log
		.on( 'error', console.log ) //log
		.pipe( gulp.dest( basePaths.dest + 'js' ) ); //write results into file
});

// Sass
gulp.task( 'build-css', function() {

	// Paths for mdl and bourbon
    var paths = [
        basePaths.npm + 'bootstrap/scss/'
    ];
    
	var vendorFiles = gulp.src( paths ), // Components
		appFiles = gulp.src( basePaths.src + 'sass/front-main.scss' ) // Main file with @import-s
			.pipe( ! isProduction ? plugins.sourcemaps.init() : gutil.noop() )  // Process the
																				// original sources
																				// for sourcemap
			.pipe( plugins.sass( {
				outputStyle: sassStyle, // SASS syntax
				includePaths: paths // Add bourbon
			} ).on( 'error', plugins.sass.logError ) ) // SASS own error log
			.pipe( plugins.autoprefixer( { // Aautoprefixer
				cascade: false
			} ) ).pipe( ! isProduction ? plugins.sourcemaps.write() : gutil.noop() ) // Add the map
																					 // to modified
																					 // source
			.on( 'error', console.log ); // Log

	return es.concat( appFiles, vendorFiles ) // Combine vendor CSS files and our files after-SASS
		.pipe( plugins.concat( 'bundle.css' ) ) // Combine into file
		.pipe( isProduction ? plugins.cssmin() : gutil.noop() ) // Minification on production
		.pipe( plugins.size() ) // Display size
		.pipe( gulp.dest( basePaths.dest + 'css' ) ) // Write file
		.on( 'error', console.log ); // Log
});

gulp.task( 'build-admin-css', function() {

	var paths = [],
		appFiles = gulp.src( basePaths.src + 'sass/admin-main.scss' ).
			pipe( ! isProduction ? plugins.sourcemaps.init() : gutil.noop() )  // Process the
																			   // original sources
																			   // for sourcemap
			.pipe( plugins.sass( {
				outputStyle: sassStyle, //SASS syntas
				includePaths: paths //add bourbon + mdl
			} ).on( 'error', plugins.sass.logError ) )//sass own error log
			.pipe( plugins.autoprefixer( { //autoprefixer
				cascade: false
			} ) ).pipe( ! isProduction ? plugins.sourcemaps.write() : gutil.noop() ) // Add the map
																					 // to modified
																					 // source
			.on( 'error', console.log ); // Log

	return appFiles.pipe( plugins.concat( 'admin.css' ) ) // Combine into file
		.pipe( isProduction ? plugins.cssmin() : gutil.noop() ) // Minification on production
		.pipe( plugins.size() ) // Display size
		.pipe( gulp.dest( basePaths.dest + 'css' ) ) // Write file
		.on( 'error', console.log ); // Log
});

// Svg - combine and clear svg assets
gulp.task( 'svg-opt', function() {

	var icons = gulp.src( [ basePaths.src + 'svg/icon-*.svg' ] ).pipe(plugins.svgmin(function getOptions (file) {
	        var prefix = path.basename(file.relative, path.extname(file.relative));
	        return {
	            plugins: [{
	            	prefixIds: {
	                    prefix: prefix + '-',
	                    minify: true
	                }
	            }]
	        }
	    }))
		.pipe( plugins.svgmin( {
			plugins: [
				{
					removeTitle: true,
					removeDesc: { removeAny: true },
					removeEditorsNSData: true,
					removeComments: true
				}
			]
		} ) ) // Minification
		.pipe( plugins.cheerio( {
			run: function( $ ) { //remove fill from icons
				$( '[fill]' ).removeAttr( 'fill' );
				$( '[width]' ).removeAttr( 'width' );
				$( '[height]' ).removeAttr( 'height' );
			}, parserOptions: { xmlMode: true }
		} ) ), 
		pics = gulp.src( [ basePaths.src + 'svg/pic-*.svg' ] ).pipe(plugins.svgmin(function getOptions (file) {
	        var prefix = path.basename(file.relative, path.extname(file.relative));
	        return {
	            plugins: [{
	            	prefixIds: {
	                    prefix: prefix + '-',
	                    minify: true
	                }
	            }]
	        }
	    }))
		.pipe( plugins.svgmin( {
			plugins: [
				{
					removeTitle: true,
					removeDesc: { removeAny: true },
					removeEditorsNSData: true,
					removeComments: true
				}
			]
		} ) ) // Minification
		.pipe( plugins.cheerio( {
			run: function( $ ) { //remove width and height
				$( '[width]' ).removeAttr( 'width' );
				$( '[height]' ).removeAttr( 'height' );
			}, parserOptions: { xmlMode: true }
		} ) ); // clean 
		

	// Combine for inline usage
	return es.concat( icons, pics ).pipe( plugins.svgstore( { inlineSvg: true } ) )
		.pipe( gulp.dest( basePaths.dest + 'svg' ) );
});

// Revision
gulp.task( 'revision-clean', function() {
	// Clean folder https://github.com/gulpjs/gulp/blob/master/docs/recipes/delete-files-folder.md
	return del( [ basePaths.dest + 'rev/**/*' ] );
});

gulp.task( 'revision', function() {

	return gulp.src( [ basePaths.dest + 'css/*.css', basePaths.dest + 'js/*.js' ] ).
		pipe( plugins.rev() ).pipe( gulp.dest( basePaths.dest + 'rev' ) ).
		pipe( plugins.rev.manifest() ).pipe( gulp.dest( basePaths.dest + 'rev' ) ) // Write
																				   // manifest to
																				   // build dir
		.on( 'error', console.log ); // Log
});

// Builds
gulp.task( 'full-build', gulp.series('build-css', 'build-admin-css', 'build-js', 'build-admin-js', 'svg-opt', 'revision-clean', 'revision'));

gulp.task( 'full-build-css', gulp.series('build-css', 'build-admin-css', 'revision-clean', 'revision'));

gulp.task( 'full-build-js', gulp.series('build-js', 'build-admin-js', 'revision-clean', 'revision'));

// Watchers
gulp.task( 'watch', function() {
	gulp.watch( [
		basePaths.src + 'sass/*.scss', 
        basePaths.src + 'sass/**/*.scss'
	], gulp.series( 'full-build-css' ));
    
	gulp.watch( [
		basePaths.src + 'js/*.js', 
        basePaths.src + 'js/**/*.js'
	], gulp.series( 'full-build-js' ));
});

// Default
gulp.task( 'default', gulp.series( 'full-build', 'watch' ));

const mix = require('laravel-mix');

mix.webpackConfig( {
  resolve: {
    extensions: [ '.js', '.vue' ],
    alias     : {
      '@': __dirname + '/resources'
    }
  }
} )
mix.js('resources/js/app.js', 'public/js')
    .vue({
      extractStyles: true,
      globalStyles : false
    } )
    .sass('resources/sass/app.scss', 'public/css')
   .browserSync( 'http://localhost:8000/' );

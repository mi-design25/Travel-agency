const Encore = require('@symfony/webpack-encore');
const path = require('path');

// Manually configure the runtime environment if not already configured yet by the "encore" command.
// Useful when you use tools that rely on webpack.config.js file.
if (!Encore.isRuntimeEnvironmentConfigured()) {
    Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev');
}

Encore
    // Set the directory where compiled assets will be stored
    .setOutputPath('public/build/')
    
    // Set the public path used by the web server to access the output path
    .setPublicPath('/build')
    
    // Add the main JavaScript entry point (app.js)
    .addEntry('app', './assets/app.js')
    
    // Add the CSS entry point for Tailwind CSS (app.css)
    .addStyleEntry('styles', './assets/styles/app.css') // Ajoutez le fichier CSS de Tailwind ici
    
    // Enable the PostCSS loader to use Tailwind CSS (or any other PostCSS-based tools)
    .enablePostCssLoader()

    // Enable Sass support if you're using Sass files (you can disable this if you're not using Sass)
    .enableSassLoader()
    
    // Split entry chunks to improve code splitting and optimization
    .splitEntryChunks()

    // Enable a single runtime chunk (improves caching)
    .enableSingleRuntimeChunk()

    // Clean up the output directory before building
    .cleanupOutputBeforeBuild()
    
    // Enable build notifications (optional)
    .enableBuildNotifications()

    // Enable source maps (disabled in production for better performance)
    .enableSourceMaps(!Encore.isProduction())

    // Enable hashed filenames in production (e.g. app.abc123.css)
    .enableVersioning(Encore.isProduction())

    // Configure Babel to use @babel/preset-env for polyfills
    .configureBabelPresetEnv((config) => {
        config.useBuiltIns = 'usage';
        config.corejs = '3.38';
    })
    
    // If you use React, enable the React preset
    //.enableReactPreset()

    // Uncomment if you're having problems with a jQuery plugin
    //.autoProvidejQuery()

;

module.exports = Encore.getWebpackConfig();

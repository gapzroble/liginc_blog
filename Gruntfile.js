module.exports = function(grunt) {

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        concat: {
            vendor: {
                src: [
                    'bower_components/angular/angular.min.js',
                    'bower_components/angular-resource/angular-resource.min.js',
                    'bower_components/angular-ui-router/release/angular-ui-router.min.js',
                ],
                dest: 'web/assets/js/vendor.js'
            },
            blog: {
                src: [
                    'src-front/*.js',
                    'src-front/**/*.js',
                ],
                dest: 'build/blog.js',
            },
        },
        uglify: {
            options: {
                banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
            },
            blog: {
                src: 'build/blog.js',
                dest: 'web/assets/js/blog.js'
            },
        },
        watch: {
            src: {
                files: ['src-front/*.js', 'src-front/**/*.js'],
                tasks: ['default'],
            },
        },
    });

    // Load the plugin that provides the "concat" task.
    grunt.loadNpmTasks('grunt-contrib-concat');

    // Load the plugin that provides the "uglify" task.
    grunt.loadNpmTasks('grunt-contrib-uglify');

    // Load the plugin that provides the "watch" task.
    grunt.loadNpmTasks('grunt-contrib-watch');

    // Default task(s).
    grunt.registerTask('vendor', ['concat:vendor']);
    grunt.registerTask('default', ['concat:blog', 'uglify:blog']);

};

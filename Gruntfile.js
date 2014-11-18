/**
 * Created by otis on 2014-05-15.
 */

module.exports = function(grunt) {

    // Project configuration.
    grunt.initConfig({

        pkg:grunt.file.readJSON('package.json'),

        uglify: {
            build:{
                files: {
                    'web/js/site.min.js' : ['web/js/site.dist.js']
                }
            }
        },

        compass: {
            dist: {
                options: {
                    sassDir:"web/css/sass/",
                    cssDir: "web/css/stylesheets/"
                }
            }
        },

        concat: {
            js: {
                src: [
                    'web/js/site.js'
                ],
                dest: 'web/js/site.dist.js'
            }
        },

        cssmin: {
            combine: {
                files: {
                    'web/css/stylesheets/screen.min.css': ['web/css/stylesheets/screen.css']
                }
            }
        },

        /*
        copy: {
            main: {
                files:[
                    {
                        expand:true,
                        cwd: 'assets/sass/',
                        src: 'fonts/**',
                        dest: 'build'
                    },
                    {
                        expand:true,
                        cwd: 'assets/',
                        src: 'img/**',
                        dest: 'build'
                    }
                ]

            }
        },
        */

        watch: {
            options: {
                livereload: true
            },

            css: {
                files: ['web/css/sass/**/*.scss','web/css/sass/*.scss', 'web/js/site.js'],
                tasks: ['compass', 'concat']
            }

        }

    });

    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-compass');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.registerTask('default', ['compass', 'concat', 'watch']);
    grunt.registerTask('deploy',['compass','cssmin','concat','uglify']);

};
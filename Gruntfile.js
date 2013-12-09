/*global module:false*/

module.exports = function(grunt) {
    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        meta: {
            css_banner: '/*\n' +
                'Theme Name: James Nighthawk\n' +
                'Theme URI: http://blacklabelcreative.com/\n' +
                'Author: <%= pkg.author %>\n' +
                'Description: <%= pkg.description %>\n' +
                'Version: <%= pkg.version %>\n' +
                'License: <%= pkg.licenses[0].type %>\n' +
                'License URI: <%= pkg.licenses[0].url %>\n' +
                '*/\n'
        },
        jshint: {
            options: {
                curly: true,
                eqeqeq: true,
                immed: true,
                latedef: true,
                newcap: true,
                noarg: true,
                sub: true,
                undef: true,
                boss: true,
                eqnull: true,
                browser: true,
                globals: {
                    // RequireJS
                    define: true,
                    require: true,
                    // lodash
                    _: true,
                    // BackboneJS
                    Backbone: true,
                    // jQuery
                    jQuery: true,
                    // extras
                    alert: true,
                    console: true
                }
            },
            all: [
                'Gruntfile.js',
                'src/wp-content/themes/jamesnighthawk/src/js/*.js',
                'src/wp-content/themes/jamesnighthawk/src/js/collections/**/*.js',
                'src/wp-content/themes/jamesnighthawk/src/js/models/**/*.js',
                'src/wp-content/themes/jamesnighthawk/src/js/views/**/*.js'
            ]
        },
        requirejs: {
            compile: {
                options: {
                    baseUrl: 'src/wp-content/themes/jamesnighthawk/src/js',
                    mainConfigFile: 'src/wp-content/themes/jamesnighthawk/src/js/main.js',
                    name: 'main',
                    out: 'src/wp-content/themes/jamesnighthawk/js/script.js',
                    preserveLicenseComments: false
                }
            }
        },
        copy: {
            require: {
                files: [
                    {
                        src: ['src/wp-content/themes/jamesnighthawk/src/js/libs/require/require.js'],
                        dest: 'src/wp-content/themes/jamesnighthawk/js/libs/require/require.js'
                    }
                ]
            }
        },
        sass: {
            dev: {
                files: {
                    'src/wp-content/themes/jamesnighthawk/style.css': 'src/wp-content/themes/jamesnighthawk/src/sass/style.scss',
                    'src/wp-content/themes/jamesnighthawk/ie.css' : 'src/wp-content/themes/jamesnighthawk/src/sass/ie.scss'
                }
            }
        },
        cssmin: {
            main: {
                options: {
                    banner: '<%= meta.css_banner %>'
                },
                files: {
                    'src/wp-content/themes/jamesnighthawk/style.css': ['src/wp-content/themes/jamesnighthawk/style.css'],
                    'src/wp-content/themes/jamesnighthawk/ie.css': ['src/wp-content/themes/jamesnighthawk/ie.css']
                }
            }
        },
        watch: {
            sass: {
                files: ['src/wp-content/themes/jamesnighthawk/src/sass/*.scss'],
                tasks: 'sass'
            },
            lint: {
                files: '<%= jshint.all %>',
                tasks: ['jshint', 'requirejs']
            }
        }
    });

    // Load tasks
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-requirejs');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');

    // Default task(s)
    grunt.registerTask('test', ['jshint']);
    grunt.registerTask('build', ['sass', 'requirejs', 'copy']);
    grunt.registerTask('default', [/*'test', */'build', 'cssmin']);
};

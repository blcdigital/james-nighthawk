/*global module:false*/

module.exports = function(grunt) {
    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        meta: {
            css_banner: '/*\n' +
                'Theme Name: James Nighthawk\n' +
                'Theme URI: http://[YOUR URL]/\n' +
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
                    // jQuery
                    jQuery: true,
                    // extras
                    alert: true,
                    console: true
                }
            },
            all: [
                'Gruntfile.js',
                'src/js/*.js',
            ]
        },
        sass: {
            main: {
                files: {
                    'site/wp-content/themes/jamesnighthawk/style.css': 'src/sass/style.scss',
                    'site/wp-content/themes/jamesnighthawk/ie.css' : 'src/sass/ie.scss'
                }
            }
        },
        cssmin: {
            main: {
                options: {
                    banner: '<%= meta.css_banner %>'
                },
                files: {
                    'site/wp-content/themes/jamesnighthawk/style.css': ['site/wp-content/themes/jamesnighthawk/style.css'],
                    'site/wp-content/themes/jamesnighthawk/ie.css': ['site/wp-content/themes/jamesnighthawk/ie.css']
                }
            }
        },
        uglify: {
            options: {
                mangle: {
                    except: ['jQuery']
                }
            },
            deploy: {
                files: {
                    'site/wp-content/themes/jamesnighthawk/assets/js/libs.js': ['src/js/libs/**/*.js'],
                    'site/wp-content/themes/jamesnighthawk/assets/js/script.js': ['src/js/script.js']
                }
            }
        },
        copy: {
            fonts: {
                files: [
                    {
                        expand: true,
                        cwd: 'src/fonts/',
                        src: ['**'],
                        dest: 'site/wp-content/themes/jamesnighthawk/assets/fonts/'
                    }
                ]
            },
            images: {
                files: [
                    {
                        expand: true,
                        cwd: 'src/images/public/',
                        src: ['**'],
                        dest: 'site/wp-content/themes/jamesnighthawk/assets/images/'
                    }
                ]
            }
        },
        watch: {
            sass: {
                files: ['src/sass/**/*.scss'],
                tasks: ['sass', 'cssmin']
            },
            js: {
                files: '<%= jshint.all %>',
                tasks: ['jshint', 'uglify']
            },
            images: {
                files: ['src/images/public/**/*.*'],
                tasks: ['copy:images']
            },
            fonts: {
                files: ['src/fonts/**/*.*'],
                tasks: ['copy:fonts']
            }
        }
    });

    // Load tasks
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');

    // // Default task(s)
    grunt.registerTask('test', ['jshint']);
    grunt.registerTask('build', ['sass', 'cssmin', 'uglify', 'copy']);
    grunt.registerTask('default', ['test', 'build']);
};

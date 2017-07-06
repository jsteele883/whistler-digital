module.exports = function(grunt){

  grunt.initConfig({

    pkg: grunt.file.readJSON('package.json'),

    // sass task
    sass: {
      dev: {
        options: {
          style: 'expanded',
          sourcemap: 'auto',
        },
        files: {
          'compiled/style.css': 'sass/style.scss',
        }
      },
    },
    // autoprefixer task
    autoprefixer: {
      options: {
        browsers: ['last 2 versions']
      },
      // prefix all files
      multiple_files: {
        expand: true,
        flatten: true,
        src: 'compiled/*.css',
        dest: ''
      }
    },

    // watch task
    watch: {
      css: {
        files: '**/*.scss',
        tasks: ['sass','autoprefixer']
      }
    }

  });

  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-autoprefixer');
  grunt.registerTask('default',['watch']);

}

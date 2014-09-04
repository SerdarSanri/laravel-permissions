module.exports = function(grunt) {

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    shell: {
      phpunit: {
        command: 'phpunit'
      },
      clear: {
        command: 'clear'
      }
    },

    watch: {
      phpunit: {
        files: ['src/**/*.php'],
        tasks: ['shell:clear', 'shell:phpunit']
      }
    }

  });

  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-shell');

  grunt.registerTask('default', ['watch']);
}

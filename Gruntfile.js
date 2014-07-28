module.exports = function(grunt) {

    var lessFiles = ['css/*.less'];


    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        less: {
            development: {
                files: [{
                    expand: true,
                    src: lessFiles,
                    ext: '.css'
                }]
            }
        },
        watch: {
            files: lessFiles,
            tasks: ['less']
        }
    });

    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-less');

    grunt.registerTask('default', ['watch']);

};
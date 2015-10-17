module.exports = function(grunt) {

    // 1. Вся настройка находится здесь
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

		/*
		// Min css
		cssmin: {
			target: {
				files: [{
					expand: true,
					cwd: 'webroot/css',
					src: ['styles.css', '!*.min.css'],
					dest: 'webroot/css',
					ext: '.min.css'
				}]
			}
		}
		*/

		/*
		// Compressing JS
		uglify: {
			my_target: {
				files: {
					'webroot/js/libs/dest/!*.min.js': ['webroot/js/libs/jquery.maskedinput.js']
				}
			}
		}
		*/

		imageoptim: {
			myTask: {
				src: ['webroot/uploads/images/news']
			}
		}


    });

    // 3. Тут мы указываем Grunt, что хотим использовать этот плагин
    // grunt.loadNpmTasks('grunt-contrib-concat');
	// grunt.loadNpmTasks('grunt-contrib-cssmin');
	// grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-imageoptim');

    // 4. Указываем, какие задачи выполняются, когда мы вводим «grunt» в терминале
    // grunt.registerTask('default', ['concat']);
	// grunt.registerTask('default', ['cssmin']);
	// grunt.registerTask('default', ['uglify']);
	grunt.registerTask('default', ['imageoptim']);

};


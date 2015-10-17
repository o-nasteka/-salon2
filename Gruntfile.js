module.exports = function(grunt) {

    // 1. Вся настройка находится здесь
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),


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

    });

    // 3. Тут мы указываем Grunt, что хотим использовать этот плагин
    // grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-cssmin');

    // 4. Указываем, какие задачи выполняются, когда мы вводим «grunt» в терминале
    // grunt.registerTask('default', ['concat']);
	grunt.registerTask('default', ['cssmin']);

};


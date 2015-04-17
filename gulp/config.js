module.exports = {
    compass: {
        src: './public/sass',
        dest: './public/css',
        configFile: './public/compass/config.rb',
        get watch() {
            return [this.src + '/**.sass']
        }
    },
    coffee: {
        src: './public/coffee',
        dest: './public/js',
        configFile: './public/coffee.sh',
        get watch() {
            return [this.src + '/*.coffee']
        }
    }
}
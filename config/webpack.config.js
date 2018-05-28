'use strict'

const path = require('path')

module.exports = {
    mode: 'development',
    entry: 'main.js',
    output: {
        filename: 'main-[chunkhash:6].js',
        path: path.join(__dirname, '../dist')
    },
    module: {

    },
    plugins: {

    }

}

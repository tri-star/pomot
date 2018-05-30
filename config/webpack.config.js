'use strict'

const path = require('path')
const webpack = require('webpack')
const {VueLoaderPlugin} = require('vue-loader')

module.exports = {
    mode: 'development',
    entry: path.join(__dirname, '../src/main.js'),
    output: {
        filename: 'main-[chunkhash:6].js',
        path: path.join(__dirname, '../dist')
    },
    module: {
        rules: [
            {
                test: /\.vue$/,
                loader: 'vue-loader'
            },
            {
                test: /\.js$/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['env']
                    }
                }
            },
            {
                test: /\.css$/,
                use: [
                    'vue-style-loader',
                    {
                        loader: 'css-loader',
                        options: {
                            sourceMap: true
                        }
                    }

                ]

            }
        ]
    },
    optimization: {
        splitChunks: {
            chunks: 'initial'
        }
    },
    resolve: {
        extensions: ['.js', '.vue'],
        alias: {
            'vue$': 'vue/dist/vue.esm.js',
            '@': 'src'
        }
    },
    plugins: [
        new webpack.DefinePlugin({
            'process.env': {
                NODE_ENV: JSON.stringify('development')
            }
        }),
        new VueLoaderPlugin
    ],
    devServer: {
        contentBase: path.join(__dirname, '/../dist'),
        port: 3000
    }

}

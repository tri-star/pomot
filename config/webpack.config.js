'use strict'

const path = require('path')
const webpack = require('webpack')
const {VueLoaderPlugin} = require('vue-loader')
const MiniCssExtractPlugin = require('mini-css-extract-plugin')
const ManifestPlugin = require('webpack-manifest-plugin')

module.exports = {
    mode: 'development',
    entry: path.join(__dirname, '../resources/assets/js/main.js'),
    output: {
        filename: 'main.js',
        path: path.join(__dirname, '../public/packs')
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
                    MiniCssExtractPlugin.loader,
                    {
                        loader: 'css-loader',
                        options: {
                            minimize: true,
                            sourceMap: true
                        }
                    },

                ]

            }
        ]
    },
    optimization: {
        splitChunks: {
            chunks: 'initial'
        },
        minimize: true,
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
        new VueLoaderPlugin,
        new MiniCssExtractPlugin({
            filename: 'main.css',
            path: path.join(__dirname, '../public/packs')
        }),
        new ManifestPlugin({
            writeToFileEmit: true,
            publicPath: 'http://127.0.0.1:3000/',
        })
    ],
    devServer: {
        contentBase: path.join(__dirname, '../public'),
        port: 3000,
        host: '0.0.0.0'
    }

}

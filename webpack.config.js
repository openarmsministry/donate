'use strict'

const path  = require('path')
const webpack = require('webpack');


module.exports = {
    module: {
        loaders: [
            {
                test: /\.js$/,
                include: path.join(__dirname, 'resources/assets'),
                exclude: /node_modules/,
                loader: 'babel',
            },
            {
                test: /\.css$/,
                loader: 'style!css'
            },
        ]
    },
    plugins: [
        new webpack.ProvidePlugin({
            'Promise': 'es6-promise', // Thanks Aaron (https://gist.github.com/Couto/b29676dd1ab8714a818f#gistcomment-1584602)
            'fetch': 'imports?this=>global!exports?global.fetch!whatwg-fetch',
        })
    ]
}
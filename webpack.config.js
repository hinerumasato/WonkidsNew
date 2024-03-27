const path = require('path');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

module.exports = {
    mode: 'production',
    entry: {
        bundle: [
            './public/css/home.css',
            './public/css/slider.css'
        ],
    },
    output: {
        filename: 'bundle.js',
        path: path.resolve(__dirname, 'dist/css/home')
    },
    module: {
        rules: [
            {
                test: /\.css$/,
                use: [MiniCssExtractPlugin.loader, "css-loader"]
            }
        ]
    },
    plugins: [
        new MiniCssExtractPlugin({   
            filename: "bundle.css"
        })
    ]
};
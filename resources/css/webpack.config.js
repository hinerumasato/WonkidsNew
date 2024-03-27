const path = require('path');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

module.exports = {
    mode: 'production',
    entry: {
        bundle: [
            './public/css/bootstrap.css',
            './public/css/animation.css',
            './public/css/base.css',
            './public/css/header.css',
            './public/css/footer.css',
            './public/css/small-slider.css',
            './public/css/small-nav.css',
            './public/css/lazy.css',
            './public/css/variable.css',
            './public/css/preloader.css',
        ],
    },
    output: {
        path: path.join(__dirname, 'dist/css/master'),
        filename: "bundle.css",
        chunkFilename: 'chunk.css'
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
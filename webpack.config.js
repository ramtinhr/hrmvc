// Webpack uses this to work with directories
const path = require('path');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const config = {
  module: {
  }
};
let jsConfig = Object.assign({}, config, {
  name: "js",
  entry: ['babel-polyfill','./resources/js/app.js'],
  output: {
    path: path.resolve(__dirname, 'public'),
    filename: 'js/app.js'
  },
  devServer: {
    contentBase: './public'
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: "css/app.css"
    })
  ],
  module: {
    rules: [
      {
        test: /\.s?css$/,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
          'sass-loader'
        ]
      },
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: 'babel-loader',
      }
      // {
      //   test: /\.(eot|svg|ttf|woff|woff2)$/,
      //   use: 'file-loader',
      // }
    ]
  }
});
module.exports = [
  jsConfig
]

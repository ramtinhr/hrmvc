// Webpack uses this to work with directories
const path = require('path');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const config = {
  module: {
  }
};
let jsConfig = Object.assign({}, config, {
  name: "js",
  entry: "./resources/js/app.js",
  output: {
    path: path.resolve(__dirname, 'public'),
    filename: 'js/app.js'
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
      }
    ]
  }
});
module.exports = [
  jsConfig
]

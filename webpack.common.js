const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');

module.exports = {
  entry: {
    app: path.resolve(__dirname, 'frontend/assets/src/js/app.js')
  },
  output: {
    filename: '[name].js',
    path: path.resolve(__dirname, 'frontend/assets/build'),
  },
  resolve: {
    extensions: [".tsx", ".ts", ".js", ".json", ".jsx", ".css", ".mjs"],
  },
  module: {
    rules: [
    {
        test: /\.s[ac]ss$/i,
        use: [
          MiniCssExtractPlugin.loader,
          "css-loader",
          "sass-loader",
        ],
      },
      {
        test: /\.(jpg|png|svg|gif)$/,
        type: 'asset/resource',
        generator : {
          filename : 'img/[name][ext][query]',
        }
      },
      {
        test: /\.(woff|woff2|eot|ttf|otf)$/i,
        type: 'asset/resource',
        generator : {
          filename : 'fonts/[name][ext][query]',
        }
      },
    ],
  },
  plugins: [
      new MiniCssExtractPlugin(),
      new CopyWebpackPlugin({
        patterns: [
          { from: './frontend/assets/src/img', to: '../build/img' }
        ]
      })
  ],
};
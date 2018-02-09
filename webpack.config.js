const path = require('path');
const webpack = require('webpack');
const ETWP = require('extract-text-webpack-plugin');

const extractSass = new ETWP({
  filename: '[name].bundle.css',
  disable: false,
});

const minify = {
  collapseWhitespace: true,
  conservativeCollapse: true,
  removeComments: true
};

const config = {
  entry: {
    main: './App/index.ts',
    vendor: ['whatwg-fetch'],
  },
  output: {
    path: path.join(__dirname, './App/dist'),
    filename: '[name].bundle.js',
    publicPath: '/',
  },
  resolve: {
    extensions: ['.ts', '.js'],
  },
  plugins: [
    extractSass,
  ],
  module: {
    rules: [
      { 
        test: /\.s[ac]ss$/, 
        loader: extractSass.extract({
          use: [
            { loader: 'css-loader' },
            { loader: 'sass-loader' },
          ],
          fallback: 'style-loader',
        })
      },
      {
        test: /\.js$/,
        loader: 'babel-loader',
        options: {
          presets: [
            ['es2015', {
              modules: false,
            }],
          ],
        },
        exclude: /node_modules/,
      },
      {
        test: /\.ts$/,
        loader: 'awesome-typescript-loader',
      },
      {
        test: /\.(jpe?g|png|gif|svg)/,
        use: [
          {
            loader: 'url-loader',
            query: {
              limit: 5000,
              name: '[name].[hash:8].[ext]',
            },
          },
          {
            loader: 'image-webpack-loader',
            query: {
              mozjpeg: {
                quality: 65,
              },
            },
          },
        ],
      },
    ],
  },
};

if (process.env.NODE_ENV === 'development') 
{
  config.watch = true;
  config.devtool = 'source-map';  
} else if (process.env.NODE_ENV === 'hot')
{
  config.devtool = 'source-map';
  config.devServer = {
    hot:true,
  };
  config.plugins.push(new webpack.HotModuleReplacementPlugin());
}

module.exports = config;

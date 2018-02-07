const path = require('path');

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
    path: path.join(__dirname, 'dist'),
    filename: '[name].bundle.js',
    publicPath: '/',
  },
  module: {
    rules: [
      { 
        test: /\.s[ac]ss$/, 
        use: [
          { loader: 'sass-loader' },
          { loader: 'css-loader' }, 
        ]
      },
    ]
  }
};

module.exports = config;


const path = require('path');

module.exports = {
  html: './src/index.html',
  entry: {
    app: ['./src/app.styl', './src/app.js'],
  },
  output: {
    path: path.resolve(__dirname, '../dist'),
    filename: '[name].js',
    publicPath: '',
  },
  port: 3002,
  base: './src/',
  support: ['last 2 versions'],
  forceReload: ['./src/index.html'],
};

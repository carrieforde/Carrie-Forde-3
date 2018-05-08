const webpack = require('webpack'),
  path = require('path'),
  ExtractTextPlugin = require('extract-text-webpack-plugin'),
  StyleLintPlugin = require('stylelint-webpack-plugin'),
  BrowserSyncPlugin = require('browser-sync-webpack-plugin'),
  SpriteLoaderPlugin = require('svg-sprite-loader/plugin');

const config = {
  context: __dirname,
  entry: './src/app.js',
  output: {
    path: path.join(__dirname, 'dist'),
    filename: 'bundle.js'
  },
  resolve: {
    extensions: ['.js', '.jsx', '.scss', '.json']
  },
  devtool: 'source-map',
  module: {
    rules: [
      {
        test: /\.s?css$/,
        use: ExtractTextPlugin.extract({
          fallback: 'style-loader',
          use: [
            {
              loader: 'css-loader',
              options: {
                minimize: process.env.NODE_ENV === 'production' ? true : false,
                sourceMap: true
              }
            },
            {
              loader: 'postcss-loader',
              options: {
                ident: 'postcss',
                plugins: [
                  require('autoprefixer')({ browsers: 'last 2 versions' }),
                  require('css-mqpacker')({ sort: true })
                ],
                sourceMap: 'inline'
              }
            },
            {
              loader: 'sass-loader',
              options: {
                includePaths: [
                  'node_modules/bourbon/core',
                  'node_modules/bourbon-neat/core',
                  'node_modules/sanitize.scss',
                  '..'
                ],
                sourceMap: true
              }
            }
          ]
        })
      },
      {
        test: /\.svg$/,
        loader: 'svg-sprite-loader',
        options: {
          extract: true,
          spriteFilename: 'svg-defs.svg'
        }
      },
      {
        test: /\.(jpe?g|png|gif)$/,
        use: [
          {
            loader: 'file-loader',
            options: {
              outputPath: 'images/',
              name: '[name].[ext]'
            }
          },
          'img-loader'
        ]
      },
      {
        enforce: 'pre',
        test: /\.jsx$/,
        loader: 'eslint-loader',
        exclude: /node_modules/
      },
      {
        test: /\.jsx?$/,
        loader: 'babel-loader'
      }
    ]
  },
  plugins: [
    new StyleLintPlugin(),
    new ExtractTextPlugin('main.css'),
    new SpriteLoaderPlugin(),
    new BrowserSyncPlugin({
      files: '**/*.php',
      injectChanges: true,
      proxy: 'http://carrieforde.test'
    })
  ]
};

if (process.env.NODE_ENV === 'production') {
  config.devtool = false;
  config.plugins.push(
    new webpack.DefinePlugin({
      'process.env.NODE_ENV': JSON.stringify('production')
    })
  );
  config.plugins.push(new webpack.optimize.UglifyJsPlugin());
}

module.exports = config;

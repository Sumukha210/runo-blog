const path = require("path");
const BrowserSyncPlugin = require("browser-sync-webpack-plugin");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const OptimizeCssAssetsPlugin = require("optimize-css-assets-webpack-plugin");
const UglifyJsPlugin = require("uglifyjs-webpack-plugin");
const PurgecssPlugin = require("purgecss-webpack-plugin");
const glob = require("glob-all");

module.exports = {
  context: __dirname,

  entry: {
    globalCssFiles: { import: "./src/js/exportGlobalCssFiles.js" },
    index: { import: "./src/js/index.js" },
    cssFiles: {
      import: "./src/js/exportCssFiles.js",
      dependOn: "globalCssFiles",
    },
  },

  output: {
    filename: "js/[name].js",
    path: path.resolve(__dirname, "dist"),
    clean: true,
  },

  module: {
    rules: [
      {
        test: /\.s?[c]ss$/i,
        use: [MiniCssExtractPlugin.loader, "css-loader", "sass-loader"],
      },

      {
        test: /\.jsx?$/,
        exclude: /node_modules/,
        loader: "babel-loader",
      },
    ],
  },

  plugins: [
    new MiniCssExtractPlugin({
      filename: "[name].css",
    }),

    new BrowserSyncPlugin({
      enable: true,
      host: "localhost",
      port: 3000,
      mode: "proxy",
      proxy: "http://localhost/blog-website/",
      files: [
        "./../page-templates/*.php",
        "./../template-parts/header/*.php",
        "./../**/*.php",
        "./../*.php",
      ],
      reload: true,
    }),
  ],

  optimization: {
    minimizer: [new UglifyJsPlugin(), new OptimizeCssAssetsPlugin()],
  },

  devtool: "source-map",
};

// module.exports = config;

// new PurgecssPlugin({
//   paths: glob.sync([
//     "./../page-templates/*.php",
//     "./../template-parts/header/*.php",
//     "./../template-parts/content/*.php",
//     "./../*.php",
//     "./../inc/*.php",
//   ]),
//   safelist: {},
//   variables: true,
// }),

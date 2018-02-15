const { mix } = require("laravel-mix");

const LiveReloadPlugin = require("webpack-livereload-plugin");

mix
  // app
  .sass("resources/assets/sass/app.scss", "public/css")

  // welcome
  .js("resources/assets/js/welcome.js", "public/js")
  .sass("resources/assets/sass/welcome.scss", "public/css")

  // home
  .js("resources/assets/js/home.js", "public/js")
  .sass("resources/assets/sass/home.scss", "public/css")

  // login
  .js("resources/assets/js/login.js", "public/js")
  .sass("resources/assets/sass/login.scss", "public/css")

  // register
  .js("resources/assets/js/register.js", "public/js")
  .sass("resources/assets/sass/register.scss", "public/css")

  .extract(["axios", "element-ui", "lodash", "vue", "vue-router"])
  .webpackConfig({
    output: {
      chunkFilename: "js/[name].js"
    },
    plugins: [new LiveReloadPlugin()]
  })
  .version();

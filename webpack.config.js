const path = require('path');

module.exports = {
    module: {
        rules: [
          // ... other rules omitted
    
          // this will apply to both plain `.scss` files
          // AND `<style lang="scss">` blocks in `.vue` files
          {
            test: /\.scss$/,
            use: [
            //   'vue-style-loader',
            //   'postcss-loader',
              {
                loader: 'sass-loader',
                options: {
                  // you can also read from a file, e.g. `variables.scss`
                  // use `prependData` here if sass-loader version = 8, or
                  // `data` if sass-loader version < 8
                  additionalData: `@import "resources/css/sass/geralImports.scss";`
                }
              }
            ]
          }
        ]
      },

    resolve: {
        alias: {
            '@': path.resolve('resources/js'),
        },
    },
};

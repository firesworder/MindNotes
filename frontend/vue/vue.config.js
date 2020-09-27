module.exports = {
  transpileDependencies: [
    'vuetify',
  ],
  devServer: {
    proxy: 'http://localhost',
  },
  // TODO: потом разобраться почему eslint это не берет(ошибка import/extensions)
  // configureWebpack: {
  //   resolve: {
  //     extensions: ['.vue', '.js'],
  //   },
  // },
};

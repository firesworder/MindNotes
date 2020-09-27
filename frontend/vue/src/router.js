import VueRouter from 'vue-router';

// Здесь подключаются компоненты для роутера, через .vue
import demoComp from './components/vue-router-demo/index.vue';

export default new VueRouter({
  routes: [
    {
      path: '/vue-router-demo/',
      component: demoComp,
    },
  ],
  mode: 'history',
});

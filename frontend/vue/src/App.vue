<template>
  <v-app>
    <nav>
      <router-link to="/vue-router-demo/">Перейти на работающее демо</router-link>
      <router-link to="/some-lousy-link/">Перейти куда то в пустоту</router-link>
    </nav>
    <router-view></router-view>
  </v-app>
</template>

<script>

import axios from 'axios';

export default {
  name: 'App',
  // empty
  components: {
  },

  data: () => ({
    //
  }),
  mounted() {
    // Пример-проверка работы axios(с прокси до api, в serve).
    axios.post('/create/thought/', { hey: 'iamAxios!' })
      .then((response) => { console.log(response); });
  },
};
</script>

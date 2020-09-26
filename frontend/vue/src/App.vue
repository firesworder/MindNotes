<template>
  <v-app>
    Hello!
  </v-app>
</template>

<script>

import axios from 'axios';

export default {
  name: 'App',

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

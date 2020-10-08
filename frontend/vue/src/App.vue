<template>
  <v-app>
    <v-navigation-drawer v-model="drawer" app>

    </v-navigation-drawer>

    <v-app-bar app>
      <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>
      <v-toolbar-title>Application</v-toolbar-title>
    </v-app-bar>
    <v-main>

    </v-main>
  </v-app>
</template>

<script>

// import axios from 'axios';

export default {
  name: 'App',
  // empty
  components: {
  },

  data: () => ({
    drawer: null,
  }),
  mounted() {
    // Пример-проверка работы axios(с прокси до api, в serve).
    // axios.post('/create/thought/', { hey: 'iamAxios!' })
    //   .then((response) => { console.log(response); });
  },
};
</script>

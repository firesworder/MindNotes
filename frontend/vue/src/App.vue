<template>
  <v-app>
<!--    Навигационная всплывашка в левой части-->
    <v-navigation-drawer v-model="drawer" app>
      <v-list>
        <v-list-item v-for="tag in navTagList" router :to="tag.link" :key="tag.title">
          <v-list-item-content>
            <v-list-item-title>{{tag.title}}</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>

    <v-app-bar app>
      <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>
      <v-toolbar-title>Application</v-toolbar-title>
    </v-app-bar>

    <v-main>
      <v-container fluid>
        <router-view></router-view>
      </v-container>
    </v-main>

    <v-footer app>

    </v-footer>
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
    navTagList: [
      { link: '/vue-router-demo/', title: 'Тег 1' },
      { link: '/tag2/', title: 'Тег 2' },
      { link: '/tag3/', title: 'Тег 3' },
      { link: '/tag4/', title: 'Тег 4' },
    ],
  }),
  mounted() {
    // Пример-проверка работы axios(с прокси до api, в serve).
    // axios.post('/create/thought/', { hey: 'iamAxios!' })
    //   .then((response) => { console.log(response); });
  },
};
</script>

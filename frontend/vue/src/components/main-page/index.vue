<template>
  <v-row id="main-page-component">
    <v-col v-for="thought in thoughts" :key="thought.id" md="3">
<!--      TODO: Карты(точнее мысли) в отдельный компонент потом перенести, как сущность-->
      <v-card :elevation="2" class="pa-3">
        <v-card-title>{{thought.title}}</v-card-title>
        <v-card-subtitle>{{thought.date}}</v-card-subtitle>
        <v-card-text>{{thought.text}}</v-card-text>
        <v-card-actions>
          <v-btn v-if="!thought.isProcessed" color="primary">
            Принять
          </v-btn>
          <v-btn v-else color="error">
            На доработку
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-col>
  </v-row>
</template>

<script>
export default {
  name: 'index.vue',
  data() {
    return {
      thoughts: [
        {
          id: 1,
          title: 'Мысль 1',
          date: '09.10.2020',
          text: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa dignissimos dolorum eum molestias perspiciatis, recusandae soluta tempore? Architecto eligendi, est?',
          isProcessed: false,
        },
        {
          id: 2,
          title: 'Мысль 2',
          date: '15.10.2020',
          text: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa dignissimos dolorum eum molestias perspiciatis, recusandae soluta tempore? Architecto eligendi, est?',
          isProcessed: false,
        },
        {
          id: 3,
          title: 'Мысль 3',
          date: '09.10.2020',
          text: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa dignissimos dolorum eum molestias perspiciatis, recusandae soluta tempore? Architecto eligendi, est?',
          isProcessed: false,
        },
        {
          id: 4,
          title: 'Мысль 4',
          date: '09.10.2020',
          text: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa dignissimos dolorum eum molestias perspiciatis, recusandae soluta tempore? Architecto eligendi, est?',
          isProcessed: false,
        },
        {
          id: 5,
          title: 'Мысль 5',
          date: '09.10.2020',
          text: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa dignissimos dolorum eum molestias perspiciatis, recusandae soluta tempore? Architecto eligendi, est?',
          isProcessed: false,
        },
        {
          id: 6,
          title: 'Мысль 6',
          date: '09.10.2020',
          text: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa dignissimos dolorum eum molestias perspiciatis, recusandae soluta tempore? Architecto eligendi, est?',
          isProcessed: false,
        },
        {
          id: 7,
          title: 'Мысль 7',
          date: '09.10.2020',
          text: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa dignissimos dolorum eum molestias perspiciatis, recusandae soluta tempore? Architecto eligendi, est?',
          isProcessed: false,
        },
        {
          id: 8,
          title: 'Мысль 8',
          date: '09.10.2020',
          text: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa dignissimos dolorum eum molestias perspiciatis, recusandae soluta tempore? Architecto eligendi, est?',
          isProcessed: true,
        },
        {
          id: 9,
          title: 'Мысль 9',
          date: '09.10.2020',
          text: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa dignissimos dolorum eum molestias perspiciatis, recusandae soluta tempore? Architecto eligendi, est?',
          isProcessed: false,
        },
        {
          id: 10,
          title: 'Мысль 10',
          date: '09.10.2020',
          text: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa dignissimos dolorum eum molestias perspiciatis, recusandae soluta tempore? Architecto eligendi, est?',
          isProcessed: true,
        },
      ],
    };
  },
};
</script>

<style scoped>

</style>

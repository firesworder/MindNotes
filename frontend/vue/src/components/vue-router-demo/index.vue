<template>
  <div>
    I am demo vue-router!
    {{testVar}}
  </div>
</template>

<script>

import { mapState } from 'vuex';
// empty
export default {
  name: 'vue-router-demo',
  computed: {
    ...mapState(['testVar']),
  },
};
</script>

<style scoped>

</style>

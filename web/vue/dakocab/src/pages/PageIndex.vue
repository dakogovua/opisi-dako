<template>
  <q-page class="q-ma-md">
    <q-list bordered separator class="self-start">


      <q-item-label header>General</q-item-label>
      <task
              v-for="(order, key) in orders"
              :key="key"
              :order = "order"
              :id = "key"
      ></task>

    </q-list>

  </q-page>
</template>

<script>
  import { mapGetters } from 'vuex'
  import task from 'components/Tasks'

export default {
  // name: 'PageIndex',
    data(){
      return{
  //        check1: true,

      }
    },
    computed:{
        ...mapGetters('orders', ['orders'])
   //     ...mapGetters('orders', ['someGetter'])
  //       orders(){
  //           return this.$store.getters['orders/someGetter']
  //       }
    },
    components: {
          task
      // 'task' : tasks.default
    }
}
</script>

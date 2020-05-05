<template>
  <q-item
    clickable
    tag="a"

    :href="link"
    :class="[link.slice(2).localeCompare(currentPage) ? '': 'active' ]"
  >


    <q-item-section
      v-if="icon"
      avatar
    >
      <q-icon :name="icon" />
    </q-item-section>

    <q-item-section>
      <q-item-label>{{ title }}</q-item-label>
      <q-item-label caption>
        {{ caption }}
      </q-item-label>
    </q-item-section>

  </q-item>
</template>

<script>
export default {
  name: 'EssentialLink',
  props: {
    title: {
      type: String,
      required: true
    },

    caption: {
      type: String,
      default: ''
    },

    link: {
      type: String,
      default: '#',
    },

    icon: {
      type: String,
      default: ''
    },

  },
    methods:{
        // currentPage(i){
        //     console.log ('i', i, this.$route.path)
        //     if (i == '/#'+this.$route.path){
        //         return 'active';
        //     }
        //     else return '';
        //
        // }
    },
    computed: {
        currentPage(){

             return this.$route.path;
        }
    }
}
</script>

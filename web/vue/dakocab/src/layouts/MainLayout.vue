<template>
  <q-layout view="hHh Lpr lFf">
    <q-header elevated>
      <q-toolbar>
        <q-btn
          flat
          dense
          round
          icon="menu"
          aria-label="Menu"
          @click="leftDrawerOpen = !leftDrawerOpen"
        />

        <q-toolbar-title>
          Menu
          <q-btn
                class="marginLeft"
                dense
                unelevated
                color="primary"
                icon="arrow_back"
                label="Back" />
        </q-toolbar-title>



        <q-toolbar-title>{{ title }}</q-toolbar-title>

        <div id="logo">

          <a class="logo" href="">
            <span>Д</span>
            <span>А</span>
            <span>К</span>
            <span>O</span>
          </a>

          <span class="service">сервіс</span>
        </div>
      </q-toolbar>
    </q-header>

    <q-drawer
      v-model="leftDrawerOpen"
      show-if-above
      bordered
      content-class="bg-grey-1"
    >
      <q-list>
        <q-item-label
          header
          class="text-grey-8"
        >
          Navigation
        </q-item-label>
        <EssentialLink
          v-for="link in essentialLinks"
          :key="link.title"
          v-bind="link"
        />
      </q-list>
    </q-drawer>

    <q-page-container>
      <router-view  />
    </q-page-container>



  </q-layout>
</template>

<script>
import EssentialLink from 'components/EssentialLink'

export default {
  name: 'MainLayout',

  components: {
    EssentialLink
  },

  data () {
    return {
      leftDrawerOpen: false,
      essentialLinks: [
        {
          title: 'Замовлення',
          caption: 'Кошик замовлень',
          icon: 'shopping_basket',
          link: '/#/'
        },
        {
          title: 'Налаштування користувача',
          caption: 'User settings',
          icon: 'account_box',
          link: '/#/settings'
        },
        {
          title: 'Вийти',
          caption: 'Logout',
          icon: 'exit_to_app',
          link: '/#/login'
        }
      ]
    }

  },
    computed:{
        title(){
            //console.log(this.$route);
           return this.$route.name;
        }
    },
}
</script>
<style>
  .marginLeft{
    margin-left: 185px;
  }
</style>
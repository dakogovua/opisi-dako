<template>
  <div id="apptemplate">
    <nav>
      <ul class="menu">
        <li class="logo"><a href="/">Konstantinov</a></li>
        <!--<li class="item" v-for="key, data in info.data"><a href="#">{{ data }}</a></li>-->
        <li v-if="info != ''" class="item"  v-for="key, data in info.data" >
          <router-link :to="{name: 'starwars', params: {
          link: key,
          name: data}}"> {{ data }} </router-link>
        </li>
        <li v-else class="item">Loading...</li>

        <li class="toggle">
          <a href="#" >&#9776;</a></li>
      </ul>
    </nav>
    <router-view  />
  </div>
</template>

<script>
export default {
  // name: 'app',
    data () {
    return {
        search: '',
        info: '',
    }
  },
    mounted(){
        this.$axios
            .get('https://swapi.co/api/')
            .then(response =>
                {

                    this.info = response
                })
            .catch(error => console.log(error));
    }
}

// $(function() {
// немнго vanila js
document.addEventListener('DOMContentLoaded', function(){
    var toggle = document.getElementsByClassName('toggle');
    var item = document.getElementsByClassName("item");

    toggle[0].addEventListener("click", function(){
        console.log(item.length);
        for (let i=0; i<item.length; i++){
            if (item[i].classList.contains("active")) {

                item[i].classList.remove("active");

            } else {

                item[i].classList.add("active");

            }
        }
    });
});
</script>

<style lang="scss">

  body {
    background: #ddd;
  }

#apptemplate {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}



</style>

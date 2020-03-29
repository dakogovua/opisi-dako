<template>
    <div>
        <div class="searchContainer">
            <input class="searchBox" v-model="search" type="search" name="search" placeholder="Search...">
            <input type="submit" value="Search" class="searchButton" @click.prevent="emitToSearch">
        </div>
        <!--<Search :searchProp="search" ref="childComponent" />-->
        <!--{{ $options.name }}<br>-->
        <!--Dynamic ID is: {{ $route.params.link }}-->
        <h1>{{ $route.params.name }}:</h1>

        <div v-if="!loading" class="kclass">
            <p v-for="elem in info.data.results">
                <router-link :to="{name: 'details', params: {link: elem.url}}">
                    {{ info.config.url.includes('films') ? elem.title : elem.name }}
                </router-link>
            </p>

        </div>
        <div v-else>
            LOADING...
        </div>
        <div id="navigation">

            <router-link v-show="info.data.previous != null" class="next round" :to="{name: 'starwars', params: {link: info.data.previous}}">&#8249;</router-link>
            <router-link v-show="info.data.next != null" class="next round" :to="{name: 'starwars', params: {link: info.data.next}}">&#8250;</router-link>

        </div>

        <hr>
    </div>
</template>

<script>
    import Search from '../components/Search.vue'

    export default {

        components:{
          Search
        },
        data() {
            return {
                search: '',
                loading: false,
                info: '',

            }
        },
        computed:{

        },
        watch: {
            $route: 'getSarWarsData'
        },
        methods: {
            emitToSearch () {
                console.log('click Dynamick')
                this.$refs.childComponent.action();
            },
          getSarWarsData(){
              this.loading = true
              this.$axios
                  .get(this.$route.params.link)
                  .then(response => {
                      console.log('then', response)
                      this.info = response
                      this.loading = false
                  })
                  .catch(error => {
                      this.loading = false
                      console.log(error)
                  });

          }
        },

        created(){
            console.log('created')
            this.getSarWarsData()
        }


    }
</script>

<style scoped>
    .kclass a {
        color: #ec971f;
    }

    .searchContainer {
        margin: 0 auto;
        display: grid;
        grid-template-columns: auto auto;
        width:300px;
        border: 1px solid #ccc;
        border-radius: 5px;
        overflow: hidden;
    }

    .searchContainer:focus-within i {
        display: none;
    }

    .searchContainer:focus-within .searchBox{
        /*grid-column:1/4;*/
    }

    .searchContainer:focus-within .searchBox::placeholder {
        color:transparent;
    }

    .searchBox {
        border: 0;
        padding: 0.5rem;
        /*grid-column:2/4;*/
        grid-row:1;
        outline:none;
    }

    .searchButton {
        background: #538AC5;
        border: 0;
        color: white;
        padding: 0.5rem;
        border-radius: 0;
        /*grid-column:4/5;*/
        grid-row:1;
    }


    a {
        text-decoration: none;
        display: inline-block;
        padding: 8px 16px;
    }

    a:hover {
        background-color: #ddd;
        color: black;
    }

    .next {
        background-color: #f1f1f1;
        color: black;
    }

    .round {
        border-radius: 50%;
    }

</style>
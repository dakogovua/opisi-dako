<template>
    <div>
        <!--Search  {{ searchProp }}-->
        <!--<br>-->
        <p v-for="data,key in info.data.results">
            <router-link :to="{name: 'details', params: {link: data.url}}">
                {{ data.name   }}
            </router-link>
        </p>

    </div>
</template>

<script>

    export default {
        props: {
            searchProp: String,
        },
        data(){
            return{
                info: ''
            }
        },
        methods:{
            action(data){
                let self = this
                let urlquery = this.$route.params.link+'?search='+self.searchProp
                console.log ('urlquery', urlquery)
                this.$axios
                    .get(urlquery)
                    .then(response => {
                        //   console.log('then', response)
                        this.info = response

                    })
                    .catch(error => {
                        this.loading = false
                        console.log(error)
                    });
            }
        },


    }
</script>

<style scoped>

</style>
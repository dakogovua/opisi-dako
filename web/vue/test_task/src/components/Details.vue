<template>
    <div>
        <!--<p>-->
            <!--Details <br>-->
            <!--Details ID is: {{ $route.params.link }}-->
        <!--</p>-->
        <ul >
            <li v-for="data, key in info.data"> {{ key }}: {{ data }}</li>
        </ul>

    </div>
</template>

<script>
    export default {
        data () {
            return {
                info: '',
            }
        },
        created(){
            this.$axios
                .get(this.$route.params.link )
                .then(response =>
                {
                    console.log('response', response)
                    this.info = response
                })
                .catch(error => console.log(error));
        }
    }
</script>

<style scoped>

</style>
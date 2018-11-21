<template>
  <div>
    <div>
      <gallery :images="images" :index="index" @close="index = null"></gallery>
      <div
              class="image"
              v-for="(image, imageIndex) in images"
              :key="imageIndex"
              @click="index = imageIndex"
              :style="{ backgroundImage: 'url(' + image + ')', width: '300px', height: '500px' }"
      ></div>
    </div>
    <div class="kkdiv">
      Developed by <b>Konstantinov</b>
    </div>

  </div>
</template>

<script>
    import VueGallery from 'vue-gallery';
    import $ from 'jquery';

    export default {
        data: function () {
            return {
            /*    images: ["http://localhost/web/scans/pokazhiki/Kiev/Tematychnyy_pokazhchyk_m_Kyiv_T_2/arh1587.jpg",
                          "http://localhost/web/scans/pokazhiki/Kiev/Tematychnyy_pokazhchyk_m_Kyiv_T_2/arh1588.jpg",
                          "http://localhost/web/scans/pokazhiki/Kiev/Tematychnyy_pokazhchyk_m_Kyiv_T_2/arh1589.jpg",
                          "http://localhost/web/scans/pokazhiki/Kiev/Tematychnyy_pokazhchyk_m_Kyiv_T_2/arh1590.jpg", 
                          "http://localhost/web/scans/pokazhiki/Kiev/Tematychnyy_pokazhchyk_m_Kyiv_T_2/arh1591.jpg",
                          ], */

                images: ajaxdata,
                index: null
            };
        },
        mounted(){
          //console.log('ajaxdatalllll', ajaxdata, 'kkkkkkkkk')
        },

        components: {
            'gallery': VueGallery
        },
    }
</script>

<style scoped>
  .image {
    float: left;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
    border: 1px solid #ebebeb;
    margin: 5px;
  }

  .kkdiv {
    clear:both;
    text-align: right;
  }


</style>
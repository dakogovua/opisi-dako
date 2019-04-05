<template>
  <div>
    <div>
      <gallery :images="images" :index="index" @close="index = null"></gallery>
      <div
              class="image"
              v-for="(image, imageIndex) in images"
              :key="imageIndex"
              @click="index = imageIndex"
              :style="{ backgroundImage: 'url(' + image + ')', width: '150px', height: '250px' }"
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
                images: [
                            "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0804.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0805.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0806.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0807.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0808.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0809.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0810.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0811.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0812.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0813.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0814.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0815.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0816.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0817.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0818.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0819.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0820.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0821.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0822.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0823.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0824.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0825.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0826.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0827.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0828.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0829.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0830.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0831.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0832.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0833.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0834.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0835.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0836.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0837.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0838.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0839.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0840.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0841.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0842.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0843.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0844.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0845.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0846.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0847.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0848.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0849.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0850.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0851.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0852.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0853.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0854.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0855.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0856.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0857.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0858.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0859.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0860.jpg", "http://opisi.dako.gov.ua/web/scans/pokazhiki/pokaz…odu/Dovidkovyy_aparat_do_opysiv_F-183/arh0861.jpg"
                          ],

                // images: ajaxdata,
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
    text-align: left;
  }


</style>
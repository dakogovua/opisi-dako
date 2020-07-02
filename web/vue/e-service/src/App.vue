<script src="main.js"></script>
<template>
  <div class="wrapper">
    <div class="sample">
      <form @submit.prevent="formSubmited = true" v-if="!formSubmited">
        <div class="progress">
          <div class="progress-bar" :style="progressWidth"></div>
        </div>
        <div>
          <app-input v-for="(item, index) in  info"
                     :name="item.name"
                     :value="item.value"
                     :pattern="item.pattern"
                     :replace = "item.replace"
                     :key="index"
                     :type = "item.type"
                     @changedata="onChangeData(index, $event)"
                     :calcDiff = "calcDiff"
          >
          </app-input>
        </div>

        <!--<div><b>Разом до сплати:</b></div>-->
        <button class="btn btn-primary"
                :disabled="done < info.length"
                @click="onClickBtn">
          Сплатити {{info[4].value}} UAH
        </button>



      </form>
      <div v-else>
        <table class="tablev v-le-bordered">
          <tr v-for="(item, index) in  info">
            <td>{{ item.name }}</td>
            <td>{{ item.value }}</td>
          </tr>
        </table>
      </div>
    </div>

    {{ button }}

     <!--<button @click="onClickBtn">onClickBtn</button>-->
    <!--<button @click="onClickBtn">Pay an arbitrary amount</button>-->

  </div>
</template>

<script>
    // function post(path, params, method) {
    //     method = method || "post"; // Set method to post by default if not specified.
    //
    //
    //     // The rest of this code assumes you are not using a library.
    //     // It can be made less wordy if you use one.
    //     var form = document.createElement("form");
    //     form.setAttribute("method", method);
    //     form.setAttribute("action", path);
    //
    //     for(var key in params) {
    //         console.log('paramsparams', params[key].post, params[key].value)
    //         if(params.hasOwnProperty(key)) {
    //             var hiddenField = document.createElement("input");
    //             hiddenField.setAttribute("type", "hidden");
    //             hiddenField.setAttribute("value", params[key].value);
    //             key = key.replace(/\-/g, '_')
    //
    //             //console.log('key ', key)
    //             hiddenField.setAttribute("name", params[key].post);
    //
    //             form.appendChild(hiddenField);
    //         }
    //     }
    //
    //     document.body.appendChild(form);
    //     form.submit();
    // }

    // SP = SP / 0.9725



export default {
    data(){
      return {


            info: [
                {
                    name: "Прізвище Ім'я По-батькові / Name",
                    value: 'sdfsdfsdf',
                    pattern: /^[a-zA-Zа-яА-яії ]{2,30}$/,
                    replace: /\d/g,
                    post: 'name'
                },
                {
                    name: 'Телефон / Phone',
                    value: '1231231',
                    pattern: /^[0-9]{7,14}$/,
                    replace: /\D/g,
                    post: 'phone'
                },
                {
                    name: 'Email',
                    value: 'kk@kk.cc',
                    pattern: /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/,
                    replace: /[А-Яа-яі]/g,
                    post: 'email'
                },
                {
                    name: 'Номер замовлення / Order number',
                    value: '11',
                    pattern: /\d+/,
                    replace: /^[]$/,
                    post: 'order_dako'
                },
                {
                    name: 'Сумма замовлення / Summ, UAH',
                    value: '22',
                    pattern: /\d+\.{0,1}\d{0,2}/,
                    replace: /[А-Яа-яA-Za-zіїє!\ ,]/g,
                    post: 'sum'
                },
                {
                    name: 'Я погоджуюсь сплатити комісію',
                    value: false,
                    type: 'checkbox'
                }
            ],
                controls: [],
            done: 0,
            formSubmited: false,
            button: {},

      }
    },
    mounted() {


        this.$loadScript("https://api.fondy.eu/static_common/v1/checkout/ipsp.js")
            .then(() => {
                console.log('script is loaded')
                this.button = $ipsp.get('button');
                this.button.setMerchantId(1449555);
             //   this.button.setMerchantId(1396424); //test merchant

                this.button.setHost('api.fondy.eu');
            })
            .catch(() => {
                console.log('error load script')
            });

    },
    created(){
        for(let i = 0; i < this.info.length; i++){
            this.controls.push(false);
        }

    },
    methods: {
        onChangeData(index, data){
            this.info[index].value = data.value;
            this.controls[index] = data.valid;

            let done = 0;

            for(let i = 0; i < this.controls.length; i++){
                if(this.controls[i]){
                    done++;
                }
            }

            this.done = done;


        },
        onClickBtn(){
            this.done = 0; // Disable click btn
            this.button.addField({
                name : 'name',
                label: 'Призначення платежу',
                value: this.info[0].value + ' ' + this.info[1].value + ' ' + this.info[2].value + ' ' + this.info[3].value + ' ' + this.info[4].value,
                readonly : true

            });

            this.button.setAmount(this.info[4].value, 'UAH',true);

            let btn = this.button
            let postString = '';
            for (let key in this.info){
             //   console.log ('key', key, this.info.length, this.info[key])
                postString +=this.info[key].post + '=' + this.info[key].value
                if (key != this.info.length - 1){
                    postString += '&'
                }
            }

            console.log('postString', postString )

             let url = 'https://opisi.dako.gov.ua/web/index.php?r=pay'
            // let url = 'http://localhost/web/index.php?r=pay'

            fetch(url, {
                // mode: 'no-cors',
                method: 'post',
                headers: {'Content-Type':'application/x-www-form-urlencoded'}, // this line is important, if this content-type is not set it wont work
                body: postString
                // body: JSON.stringify(this.info)
            })
                .then(function(response) {                      // first then()
                   // console.log('response', response)
                    if(response.ok)
                    {
                        response.json().then(function(data) {
                           // console.log('data', data);
                            btn.data.name = data;
                            location.href=btn.getUrl();
                        });
                        console.log ('btn', btn,  'btn.name', btn.data.name )
                   //
                       return response.text();
                    }

                    throw new Error('Something went wrong.');
                })
                .catch(function (error) {
                    console.log('Request failed -->', error);
                });

            //

            // post('http://opisi.dako.gov.ua/web/index.php?r=pay', this.info);
        }
    },
    computed: {
        // jsn(){
        //     return JSON.stringify(this.info);
        // },
        progressWidth(){
            return {
                width: (this.done / this.info.length * 100) + '%'
            }
        },
        calcComission(){
            let val = 0.9724999999999996 // 2.83
         //   let val = 0.9732360097323601 // 2.75
            // return (this.info[4].value / 0.973236).toFixed(2);
            return (this.info[4].value / val).toFixed(2);

        },
        calcDiff(){
            return (this.calcComission - this.info[4].value).toFixed(2);
        }
    }

    }
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}

h1, h2 {
  font-weight: normal;
}

ul {
  list-style-type: none;
  padding: 0;
}

li {
  display: inline-block;
  margin: 0 10px;
}

a {
  color: #42b983;
}
</style>

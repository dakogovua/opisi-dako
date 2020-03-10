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
                     @changedata="onChangeData(index, $event)"
          >
          </app-input>
        </div>
        <div>Додатково сплачується комісія за прийом платежу</div>
        <button class="btn btn-primary" :disabled="done < info.length" @click="onClickBtn">
          Сплатити {{calcComission}} UAH
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

     <button @click="onClickBtn">onClickBtn</button>

  </div>
</template>

<script>
    function post(path, params, method) {
        method = method || "post"; // Set method to post by default if not specified.


        // The rest of this code assumes you are not using a library.
        // It can be made less wordy if you use one.
        var form = document.createElement("form");
        form.setAttribute("method", method);
        form.setAttribute("action", path);

        for(var key in params) {
            console.log('paramsparams', params[key].post, params[key].value)
            if(params.hasOwnProperty(key)) {
                var hiddenField = document.createElement("input");
                hiddenField.setAttribute("type", "hidden");
                hiddenField.setAttribute("value", params[key].value);
                key = key.replace(/\-/g, '_')

                //console.log('key ', key)
                hiddenField.setAttribute("name", params[key].post);

                form.appendChild(hiddenField);
            }
        }
        // var arrcsrf; //
        // $.ajax({ //эта фигня запрашивает csrf и отправляет форму
        //     url: '/',
        //     type: "GET",
        //     //   data: {},
        //     success: function (data) {
        //         //    console.log('data csrf url /', data)
        //         arrcsrf  =  data.split(";");
        //         // console.log('arrcsrf ',arrcsrf)
        //
        //         //console.log('arrcsrf[0] ', arrcsrf[0], ' arrcsrf[0] ', arrcsrf[1])
        //
        //         var hiddenToken = document.createElement("input");
        //         hiddenToken.setAttribute("name", arrcsrf[0]);
        //         hiddenToken.setAttribute("value",arrcsrf[1]);
        //         form.appendChild(hiddenToken);
        //
        //         document.body.appendChild(form);
        //         form.submit();
        //     }
        // })

        document.body.appendChild(form);
        form.submit();
    }

    // SP = SP / 0.9725

export default {
    data(){
      return {


            info: [
                {
                    name: "Прізвище Ім'я По-батькові / Name",
                    value: '',
                    pattern: /^[a-zA-Zа-яА-яії ]{2,30}$/,
                    replace: /\d/g,
                    post: 'name'
                },
                {
                    name: 'Телефон / Phone',
                    value: '',
                    pattern: /^[0-9]{7,14}$/,
                    replace: /\D/g,
                    post: 'phone'
                },
                {
                    name: 'Email',
                    value: '',
                    pattern: /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/,
                    replace: /[А-Яа-яі]/g,
                    post: 'email'
                },
                {
                    name: 'Номер замовлення / Order number',
                    value: '',
                    pattern: /\d+/,
                    replace: /^[]$/,
                    post: 'order_dako'
                },
                {
                    name: 'Сумма замовлення / Summ',
                    value: '',
                    pattern: /\d+\.{0,1}\d{0,2}/,
                    replace: /[А-Яа-яA-Za-zіїє!\ ,]/g,
                    post: 'sum'
                }
            ],
                controls: [],
            done: 0,
            formSubmited: false

      }
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
            post('http://localhost/web/index.php?r=pay', this.info);
        }
    },
    computed: {
        progressWidth(){
            return {
                width: (this.done / this.info.length * 100) + '%'
            }
        },
        calcComission(){
            return (this.info[4].value / 0.973236).toFixed(2);
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

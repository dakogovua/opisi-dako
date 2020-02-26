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
        <div>Додатково сплачується комісія платіжній системи</div>
        <button class="btn btn-primary" :disabled="done < info.length">
          Сплатити {{calcComission}} UAH
        </button>


      </form>
      <div v-else>
        <table class="table table-bordered">
          <tr v-for="(item, index) in  info">
            <td>{{ item.name }}</td>
            <td>{{ item.value }}</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
    // SP = SP / 0.9725

export default {
    data(){
      return {


            info: [
                {
                    name: "Прізвище Ім'я По-батькові",
                    value: '',
                    pattern: /^[a-zA-Z ]{2,30}$/,
                    replace: /^[]$/
                },
                {
                    name: 'Телефон',
                    value: '',
                    pattern: /^[0-9]{7,14}$/,
                    replace: /\D/g
                },
                {
                    name: 'Email',
                    value: '',
                    pattern: /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/,
                    replace: /^[]$/
                },
                {
                    name: 'Номер замовлення',
                    value: '',
                    pattern: /\d+/,
                    replace: /^[]$/
                },
                {
                    name: 'Сумма замовлення',
                    value: '',
                    pattern: /.+/,
                    replace: /^[]$/
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

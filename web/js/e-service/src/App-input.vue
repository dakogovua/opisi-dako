
<template>
<div class="form-group">
    <label>{{ name }}</label>
    <span class="fa" :class="validClass" v-if="activated">
                    </span>
    <div :class="sumClass">
        <input type="text"
               class="form-control"
               :value="value"
               @input="onInput"
               :class="sumClass"
        >
        <span v-if="sumClass">грн</span>
    </div>
</div>
</template>

<script>


export default {
    data() {
        return {
            activated: this.value != ''
        }
    },
        props: ['name', 'value', 'pattern', 'replace'],

        computed: {
            validClass()
            {
                return this.pattern.test(this.value) ? 'fa-check-circle text-success' : 'fa-exclamation-circle text-danger';
            },

            sumClass(){
                return this.name == 'Сумма замовлення' ? 'kosssum' : false
            }
        },
        methods: {
            onInput(e)
            {




                setTimeout(
                    (() => {
                        console.log('replace ', e.target.value , e.target.value.replace(this.replace,''))
                        this.activated = true;
                        this.$emit('changedata', {
                            value: e.target.value,
                            valid: this.pattern.test(e.target.value)
                        });
                        console.log('settimeou')
                        e.target.value = e.target.value.replace(this.replace,'');
                    }), 1000);
            }
        }

}

//SP = SP / 0.9725
</script>

<style>
    div.kosssum {
        display: flex;
    }
    input.kosssum {
        width: 25%;
    }
     div.kosssum  > span {
        margin: 6px;
    }

</style>
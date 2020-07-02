
<template>
<div v-if="type != 'checkbox'" class="form-group">
    <label>{{ name }}</label>
    <span class="fa" :class="validClass" v-if="activated">
                    </span>
    <div>
        <input
               type = "text"
               :value="value"
               @input="onInput"
               class="form-control"
        >
        <span v-if="type == 'checkbox'" class="cr"><i class="cr-icon fa fa-check"></i></span>

        <span v-if="sumClass">грн</span>
    </div>



</div>
<div v-else class="checkbox">
    <label style="font-size: 1em">
        <input
                type="checkbox"
                value=""
                @change="onCheckbox"
        >
        <span class="cr"><i class="cr-icon fa fa-check"></i></span>
        {{ name }}
    </label>


</div>
</template>

<script>


export default {
    data() {
        return {
            activated: this.value != ''
        }
    },
        props: ['name', 'value', 'pattern', 'replace', 'post', 'type', 'calcDiff'],



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
            },
            onCheckbox(e){
                this.$emit('changedata', {
                    value: !this.value,
                    valid: !this.value
                });
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

    .checkboxflex {
        display: flex;
    }
    .checkboxflex .order {
        order: -1;
    }

    .checkbox label:after,
    .radio label:after {
        content: '';
        display: table;
        clear: both;
    }

    .checkbox .cr,
    .radio .cr {
        position: relative;
        display: inline-block;
        border: 1px solid #a9a9a9;
        border-radius: .25em;
        width: 1.3em;
        height: 1.3em;
        float: left;
        margin-right: .5em;
    }

    .radio .cr {
        border-radius: 50%;
    }

    .checkbox .cr .cr-icon,
    .radio .cr .cr-icon {
        position: absolute;
        font-size: .8em;
        line-height: 0;
        top: 50%;
        left: 20%;
    }

    .radio .cr .cr-icon {
        margin-left: 0.04em;
    }

    .checkbox label input[type="checkbox"],
    .radio label input[type="radio"] {
        display: none;
    }

    .checkbox label input[type="checkbox"] + .cr > .cr-icon,
    .radio label input[type="radio"] + .cr > .cr-icon {
        transform: scale(3) rotateZ(-20deg);
        opacity: 0;
        transition: all .3s ease-in;
    }

    .checkbox label input[type="checkbox"]:checked + .cr > .cr-icon,
    .radio label input[type="radio"]:checked + .cr > .cr-icon {
        transform: scale(1) rotateZ(0deg);
        opacity: 1;
    }

    .checkbox label input[type="checkbox"]:disabled + .cr,
    .radio label input[type="radio"]:disabled + .cr {
        opacity: .5;
    }


</style>
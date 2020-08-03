
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
                     //   console.log('replace ', e.target.value , e.target.value.replace(this.replace,''))
                        this.activated = true;
                        this.$emit('changedata', {
                            value: e.target.value,
                            valid: this.pattern.test(e.target.value)
                        });
                     //   console.log('settimeou')
                        e.target.value = e.target.value.replace(this.replace,'');
                    }), 600);
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

    .progress {
        height: 20px;
        margin-bottom: 20px;
        overflow: hidden;
        background-color: #f5f5f5;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,.1);
        box-shadow: inset 0 1px 2px rgba(0,0,0,.1);
    }

    .progress-bar {
        float: left;
        width: 0;
        height: 100%;
        font-size: 12px;
        line-height: 20px;
        color: #fff;
        text-align: center;
        background-color: #337ab7;
        -webkit-box-shadow: inset 0 -1px 0 rgba(0,0,0,.15);
        box-shadow: inset 0 -1px 0 rgba(0,0,0,.15);
        -webkit-transition: width .6s ease;
        -o-transition: width .6s ease;
        transition: width .6s ease;
    }


    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: inline-block;
        max-width: 100%;
        margin-bottom: 5px;
        font-weight: 700;
    }

    .form-control {
        display: block;
        width: 100%;
        height: 34px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
        box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
        -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    }


    .checkbox, .radio {
        position: relative;
        display: block;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .checkbox label, .radio label {
        min-height: 20px;
        padding-left: 20px;
        margin-bottom: 0;
        font-weight: 400;
        cursor: pointer;
    }

    .checkbox label input[type="checkbox"], .radio label input[type="radio"] {
        display: none;
    }

    .checkbox .cr, .radio .cr {
        position: relative;
        display: inline-block;
        border: 1px solid #a9a9a9;
        border-radius: .25em;
        width: 1.3em;
        height: 1.3em;
        float: left;
        margin-right: .5em;
    }

    .checkbox label input[type="checkbox"] + .cr > .cr-icon, .radio label input[type="radio"] + .cr > .cr-icon {
        transform: scale(3) rotateZ(-20deg);
        opacity: 0;
        transition: all .3s ease-in;
    }

    .fa-check:before {
        content: "\f00c";
    }
    .btn-primary {
        color: #fff;
        background-color: #337ab7;
        border-color: #2e6da4;
    }
    .btn {
        display: inline-block;
        padding: 6px 12px;
        margin-bottom: 0;
        font-size: 14px;
        font-weight: 400;
        line-height: 1.42857143;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -ms-touch-action: manipulation;
        touch-action: manipulation;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-image: none;
        border: 1px solid transparent;
        border-radius: 4px;
    }
    button, input, select, textarea {
        font-family: inherit;
        font-size: inherit;
        line-height: inherit;
    }
    button, html input[type=button], input[type=reset], input[type=submit] {
        -webkit-appearance: button;
        cursor: pointer;
    }
    button, select {
        text-transform: none;
    }
    button {
        overflow: visible;
    }
    button, input, optgroup, select, textarea {
        margin: 0;
        font: inherit;
        color: inherit;
    }



    .btn.disabled, .btn[disabled], fieldset[disabled] .btn {
        cursor: not-allowed;
        filter: alpha(opacity=65);
        -webkit-box-shadow: none;
        box-shadow: none;
        opacity: .65;
    }




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
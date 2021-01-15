<template>
    <div>
        <input type="hidden" :name="forname" :value="value ? value.id : null">
        <multiselect v-model="value" :options="options" :multiple="false" :close-on-select="true" :clear-on-select="false" :preserve-search="true" placeholder="يرجي الاختيار" label="name" track-by="id" :preselect-first="false">
        </multiselect>
        <pre  hidden class="language-json"><code>{{ value }}</code></pre>
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect'
    import 'vue-multiselect/dist/vue-multiselect.min.css'

    export default {
        name: "SingleSelect",
        components: {
            Multiselect
        },
        props : {
            inputs:{
                type: Array,
                required: true
            },
            forname:{
                type: String,
                required: false
            },
            oldvalues:{
                required: false
            }
        },
        data () {
            return {
                value: this.oldvalues ? this.oldvalues[0] : '',
                options: this.inputs
            }
        }
    }
</script>

<style scoped>

</style>
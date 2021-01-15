<template>
    <div>
        <input type="hidden" v-for="(category , index) in value" :name="name" :value="category.id" :key="`${name}_${index}`">
        <multiselect v-model="value" :options="options" :multiple="true" :close-on-select="false" :clear-on-select="false" :preserve-search="true" placeholder="يرجي الاختيار" label="name" track-by="id" :preselect-first="false"
                     >
        </multiselect>
        <pre  hidden class="language-json"><code>{{ value }}</code></pre>
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect'
    import 'vue-multiselect/dist/vue-multiselect.min.css'
    export default {
        name : "CustomSelect",
        components: {
            Multiselect
        },
        props : {
            inputs:{
                type: Array,
                required: true
            },
            name:{
                type: String,
                required: false
            },
            oldValues:{
                type: Array,
                required: false
            }
        },
        data () {
            return {
                value: this.oldValues ? this.oldValues : [],
                options: this.inputs
            }
        },
        methods:{
            handleSelect(event) {
                if (parseInt(event.id) === 0) {
                    // select all
                    for (let item of this.options) {
                        if (parseInt(item.id) > 0) {
                            this.value.push(item);
                            this.$emit('handle-select', item.id);
                        }
                    }
                } else {
                    this.$emit('handle-select', event.id);
                }
            }

        },
        mounted () {
            this.options.push({
                name: "اختيار الكل",
                id: 0
            })
        }
    }
</script>

<style scoped>

</style>
<template>
  <div>
    <input type="hidden" v-for="category in value" :name="forname" :value="category.id">
    <div class="columns">
      <div class="column is-10">
        <multiselect v-model="value" :options="options" :multiple="true" :close-on-select="false" :clear-on-select="false" :preserve-search="true" placeholder="يرجي الاختيار" label="name" track-by="id" :preselect-first="false"
        >
        <!--            <template slot="selection" slot-scope="{ values, search, isOpen }"><span class="multiselect__single" v-if="values.length &amp;&amp; !isOpen">{{ values.length }}  اجمالي ما تم اختياره</span></template>-->
      </multiselect>
    </div>
    <div class="column is-2">
      <button class="select-all button" :class="toggle == false ? 'is-success' : 'is-danger' " @click.prevent="ToggleSelect">
        <template v-if="toggle == false">اختيار الكل</template>
        <template v-else>عدم اختيار الكل</template>
      </button>
    </div>
  </div>
  <pre  hidden class="language-json"><code>{{ value }}</code></pre>
</div>
</template>

<script>
  import Multiselect from 'vue-multiselect'
  import 'vue-multiselect/dist/vue-multiselect.min.css'
  export default {
    name : "SelectAll",
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
        type: Array,
        required: false
      }
    },
    data () {
      return {
        value: this.oldvalues ? this.oldvalues : [],
        options: this.inputs,
        toggle: false
      }
    },
    methods:{
      ToggleSelect(){
       this.toggle = !this.toggle
       if(this.toggle == true){
        this.value=this.inputs; 
      }else{
        this.value = [];
      }
    }

  },

}
</script>

<style scoped>

</style>
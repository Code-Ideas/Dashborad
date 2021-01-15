<template>
  <div class="uploader-multiple-container">
    <div class="uploader-multiple" v-for="(photo , index) in photos" :key="`uploader-multiple${index}`">
        <Uploader :key="`uplader_${index}`" :label="label" :name="`${name}[${index}]`" :file="photo" :add-icon="addIcon"  :edit-icon="editIcon"
        :accept="accept" :doc-typs="docTyps" :max-size="maxSize"        
         @valueChanged="getFiles(index , ...arguments)"></Uploader>
        <button class="button is-danger delete-btn" type="button" @click="deleteImage(index)"><i class="fas fa-trash-alt"></i></button>
    </div>
    <div class="add-btn">
        <button class="button is-success" type="button" @click="addImage"><i class="fas fa-plus"></i> اضف صورة جديدة</button>
    </div>
  </div>
</template>

<script>
import Uploader from './Uploader'
  export default {
    name: 'MultipleUploader',
    components: {Uploader},
    props: {
       classes: {
        default: '',
        type: String,
      },
      name: {
        default: '',
        type: String,
      },
      addIcon: {
        default: 'fa fa-upload',
        type: String,
      },
      editIcon: {
        default: 'fa fa-trash',
        type: String,
      },
      label: {
        default: '',
        type: String,
      },
      accept: {
        default: 'image',
        type: String,
      },
      docTyps:{
        default: '.doc,.docx,.pdf,.xlsx, .xls ,.ppt, .pptx',
        type: String,
      },
      maxSize:{
        default: null,
        type: String,
      } ,
      photos:{
        default: () => [''],
        type:Array
      }
    },
    data: () => ({
      
    }),
    computed: {

    },
    methods: {
        addImage(){
          this.photos.push('');
        },
        deleteImage(index){
            this.photos.splice(index, 1)
        },
        getFiles(index , val){
            this.photos[index] = val
        }
    }
  };
</script>
<style lang="scss" scoped>
.uploader-multiple-container{
    display: flex;
    .uploader-multiple{
        width: 13%;
        height: 180px;
        padding: 5px;
        position: relative;
        .uploader-block{
            height: 100%;
        }
    }
    .add-btn{
        padding: 5px;
        button{
            height: 100%;
        }
    }
    .delete-btn{
        position: absolute;
        top: -10px;
        padding: 6px!important;
        min-height: unset;
        min-width: unset;
        font-size: 0.7rem;
        width: 30px;
        height: 30px;
        border-radius: 100%;
        right: -2px;
    }
}
</style> 

<template>
  <div :class="[isMultiple ? 'multiple-uploader-block' : 'uploader-block']">
    <template v-if="isMultiple">
      <div class="uploader" :class="classes">
        <input ref="fileInput" v-show="false" type="file" :id="name" :name="name" @change="inputChanged" :accept="acceptFile" multiple>
        <button type="button" v-if="addedFiles === null" class="button add-btn" @click="selectFile">
          <i :class="addIcon"></i> <span class="label">{{label}}</span>
        </button>
        <button type="button"  v-else class="button delete-btn is-danger" @click="removeFile">
          <i :class="editIcon"></i> <span class="label">{{deleteLabel}}</span>
        </button>
        <div class="mt-3 columns is-multiline">
          <div class="column is-2"  v-for="(image , index ) in addedFiles" :key="index">
              <div class="card">
                  <div class="card-image">
                      <figure class="image is-4by3">
                        <img :src="multiPreviewSrc(image)"  alt="Placeholder image">
                      </figure>
                  </div>
              </div>
          </div>
        </div>  
      </div>      
    </template>
    <template v-else>
      <div class="uploader" :class="classes">
        <img v-if="accept == 'image'" v-show="previewSrc" :src="previewSrc"  class="uploaded-img">
        <img v-else v-show="previewSrc" :src="staticImages" class="uploaded-img">
        <input ref="fileInput" v-show="false" type="file" :id="name" :name="name" @change="inputChanged" :accept="acceptFile">
        <button type="button" v-show="!previewSrc" class="button add-btn" @click="selectFile"><i :class="addIcon"></i> {{label}}</button>
        <button type="button" v-show="previewSrc" class="button delete-btn" @click="removeFile"><i :class="editIcon"></i> مسح</button>      
      </div>
      <p v-if="errorMessage" class="error-massage">اقصى مساحة للملف {{maxSize}}MB</p>
    </template>
    
  </div>
</template>

<script>
  export default {
    name: 'Uploader',
    props: {
      classes: {
        default: '',
        type: String,
      },
      name: {
        default: '',
        type: String,
      },
      file: {
        default: '',
        
      },
      files: {
        default: null,
        type: Array,
      },
      isMultiple:{
        default: false,
        type: Boolean,
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
      deleteLabel:{
        default: 'مسح',
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
      }   
    },
    data: () => ({
      addedFile: null,
      addedFiles:null,
      removed: false,
      staticImages: null,
      errorMessage:false,
      eventStore:null
    }),
    created(){
      this.files ? this.addedFiles=this.files : this.addedFiles= null
      
    },
    computed: {
      previewSrc() {
        if (! this.addedFile) {
          return this.removed ? false : this.file;
        }
        return URL.createObjectURL(this.addedFile);
      },
      acceptFile(){
        let type = null
        if( this.accept == 'image' ){
          type = 'image/*'
        }else if( this.accept == 'file' ){
          type = '.doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document'
          this.staticImages = '/admin/img/staticImages/file.svg'
        }else if( this.accept == 'video' ){
          type = 'video/*'
          this.staticImages = '/admin/img/staticImages/video.svg'
        }else if( this.accept == 'audio' ){
          type = 'audio/*' 
          this.staticImages = '/admin/img/staticImages/audio.svg'
        }else if( this.accept == 'pdf' ){
          type = '.pdf' 
          this.staticImages = '/admin/img/staticImages/pdf.svg'
        }
        else if( this.accept == 'word' ){
          type = '.doc, .docx' 
          this.staticImages = '/admin/img/staticImages/word.svg'
        }
        else if( this.accept == 'excel' ){
          type = '.xlsx, .xls' 
          this.staticImages = '/admin/img/staticImages/excel.svg'
        }
        else if( this.accept == 'zip' ){
          type = 'zip,application/zip,application/x-zip,application/x-zip-compressed' 
          this.staticImages = '/admin/img/staticImages/zip.svg'
        }
        else if( this.accept == 'ppt' ){
          type = '.ppt, .pptx' 
          this.staticImages = '/admin/img/staticImages/ppt.svg'
        }else if( this.accept == 'doc' ){
          type = this.docTyps
          this.staticImages = '/admin/img/staticImages/file.svg'
        }

        return type
      }
    },
    methods: {
      inputChanged(event) { 
        if(this.isMultiple){
          this.$emit('input', event.target.files);
          this.$emit('valueChanged', event.target.files[0])         
          this.addedFiles = event.target.files;       
          this.removed = false;
        }else{
          this.$emit('input', event.target.files);
          this.$emit('valueChanged', event.target.files[0])         
          this.addedFile = event.target.files[0];   
          this.removed = false;
        }   
          
      },
      selectFile() {
          this.$refs.fileInput.click();
      },
      removeFile() {
          this.$refs.fileInput.value = '';
          this.addedFile = null;
          this.addedFiles = null;
          this.removed = true;
          this.$emit('valueChanged', '')
      },
      bytesToMegaBytes(bytes) { 
        return (bytes / (1024*1024)).toFixed(2); 
      },
      validateSize(file){  
        if(!file){      
          if(this.bytesToMegaBytes(this.addedFile.size) >= this.maxSize && this.maxSize !== null ){
            this.removeFile()
            this.errorMessage = true
          }else{
            this.errorMessage = false
          }
        }else{
          if(this.bytesToMegaBytes(this.file.size) >= this.maxSize && this.maxSize !== null ){
            this.removeFile()
            this.errorMessage = true
          }else{
            this.errorMessage = false
          }
        }
        
      },
      multiPreviewSrc(image){  
        let url_img = null
        if(this.files){
          if (this.files === this.addedFiles) {
            url_img = image;
          }else{
            url_img = URL.createObjectURL(image);
          }
        }else{
          return URL.createObjectURL(image); 
        }
        return url_img
      },      
    },
    
  };
</script>
<style lang="scss" scoped>
.uploader-block{
  height: 150px;
  .uploader {
    width: 100%;
    height:100%;
    text-align: center;
    position: relative;
}
img.uploaded-img {
    width: 100%;
    height: 100%;
    border-radius: 4px;
    border: 1px solid #ccc;
    object-fit: contain;
}

.button.add-btn {
    position: absolute;
    top: 0;
    right: 0;
    left: 0;
    width: 100%;
    height: 100%;
    font-size: 18px;
}
.button.delete-btn {
    position: absolute;
    top: 0;
    right: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: #00000054;
    color: #fff;
    font-size: 18px;
    font-weight: bold;
}
}

.error-massage{
  font-size: 0.7rem;
  color: #f00;
  font-weight: bold;
}
.multiple-uploader-block{
  position:relative;
  .button{
      padding: 1em 3em;
      display: inline-block;
      min-height: unset;
      height: unset;
      min-width: 10rem;
      .label{
        color:inherit
      }
      
    }
  img{
    width: 100%;
    height: 100%;
    object-fit: contain;
  } 
  .card{
    padding: 0.6rem;
  } 
}
</style> 

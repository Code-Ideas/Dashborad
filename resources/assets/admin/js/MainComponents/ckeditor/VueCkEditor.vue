<template>
  <div>
    <textarea :id="id" :name="name" rows="7" class="form-control cke_rtl" style="display:none;">
      {{ OldData }}
    </textarea>
  </div>
</template>

<script>
import './ckeditor.min.js';
export default {
  name: 'VueCkEditor',

  props: {
    id: {
      type: String,
      required: true
    },
    name: {
      type: String,
      required: true
    },
    OldData:{
      type: String,
      required: false
    },
    locale:{
      default: 'ar',
      type: String
    }
  },
  mounted () {
    CKEDITOR.replace( this.id ,
    {
      language : this.locale,
      uiColor : '#f4f6fb',
      filebrowserImageBrowseUrl: `/laravel-filemanager?type=Images`,
      filebrowserImageUploadUrl: `/laravel-filemanager/upload?type=Images&_token=`,
      filebrowserBrowseUrl: `/laravel-filemanager?type=Files`,
      filebrowserUploadUrl: `/laravel-filemanager/upload?type=Files&_token=`

    }

    )
  }


};
</script>
<style scoped src="./neo.css"></style>
<style scoped src="./samples.css"></style>



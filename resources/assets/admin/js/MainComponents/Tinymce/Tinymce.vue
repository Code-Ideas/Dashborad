
<template>
	<div>
		<tinymce :id="id" :plugins="plugins" v-model="data" :rows="10"></tinymce>
		<textarea :name="name" style="display: none;">{{data}}</textarea>
	</div>
</template>

<script>
	import tinymce from 'vue-tinymce-editor'
	import lang from './langs/ar_SA.js'

	export default {
		name: 'TinymceEditor',
		components:{
			tinymce
		},
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
			}		
		},
		data(){
			return {
				data : this.OldData ,
				plugins : [],
				options: {
                language_url: './langs/ar_SA.js' //This url points to location of persian language file.
            }
        };
    }
};
</script>

<style>

</style>
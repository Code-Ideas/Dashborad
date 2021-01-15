<template>

</template>

<script>
	export default {
		name:'Alert',
		props: {
			AlertType: {
				type: String,
				required: true
			},
			AlertTitle:{
				type:String,
				required: true
			},
			AlertMessages:{
				required: false
			},
		},
		data() {
			return {
				options:{
					position: 'center',
					type:this.AlertType,
					title:this.AlertTitle,
					html: '',
					showConfirmButton: false,
					timer: 2500
				}
			};
		},
		created() {
			let element= this ;
			setTimeout(function(){element.$swal(element.options); }, 500);
		},
		mounted(){

		    if (this.AlertMessages) {
                this.options.html = `<ul class="AlertList">`+Object.values(this.AlertMessages).map(error => `<li class="mb5 is-size-6">${error}</li>`).join(' ')+`</ul>`
            }
		}


	}


</script>

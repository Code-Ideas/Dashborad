<template>
	<div class="datetime-container">
		<VueCtkDateTimePicker :color="color" :only-time="onlyTime" :only-date="onlyDate" :button-color="color" :inline="inline" v-model="value" :format="format" :formatted="formatted" :noLabel="noLabel"></VueCtkDateTimePicker>
		<input type="hidden" :name="InputName" :value="value" >
	</div>
</template>
<script>
	export default {
		name: 'DateTimePicker',
		props:{
			OldValue:{
				required:false
			},
			InputName:{
				required:true,
				type:String
			},
			format:{
				required:false,
				type:String,
				default:"YYYY-MM-DD HH:mm"
			},
			formatted:{
				required:false,
				type:String,
				default:"YYYY-MM-DD HH:mm"
			},
			color:{
				required:false,
				type:String,
				default:"#54cc96"	
			},
			onlyTime:{
				required:false,
				type:Boolean,
				default:false	
			},
			onlyDate:{
				required:false,
				type:Boolean,
				default:false
			},
			now:{
				required:false,
				type:String,
			},
			inline:{
				required:false,
				type:Boolean,
				default:true
			},
			noLabel:{
				required:false,
				type:Boolean,
				default:false
			}
		},
		data() {
			return {
				value: this.now ? this.now : "2020-11-22 00:07",
			};
		},
		mounted(){
			if(this.OldValue){
				this.value = this.OldValue
			}
		}
	}	
</script>
<style type="text/css">
.datetime-container{
	direction: ltr;
	background-color: #e8ebee;
	padding: 10px;
}
</style>
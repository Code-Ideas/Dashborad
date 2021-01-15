<template>
	<div class="color-repeater">
		<div  class="color-repeater-item" v-for="(item, index) in colorsArray" :key="index">
			<color-picker-multi :input_name="'colors[' + index + '][color]'" :color="item.color"></color-picker-multi>
		</div>
		<div class="add-color-picker-button">
			<button class="button is-info" @click.prevent="addToLoop({color:'#888'})">اضافة لون</button>
		</div>
	</div>
</template>
<script>
	import ColorPickerMulti from './ColorPickerMulti'
	export default {
		name:"repeater-color",
		components:{
			'color-picker-multi': ColorPickerMulti,
		},
		props:{
			colors:{
				type:Array,
			}
		},
		data () {
			return {
				colorsArray: this.colors			
			}
		},
		methods: {
			addToLoop: function (color) {
				if(this.colorsArray != null){
					this.colorsArray.push(color);
				}
				else{
					this.colorsArray= [{"color":"#888"}];
				}
			}
		},
	}
</script>
<style>

</style>
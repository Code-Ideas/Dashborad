<template>
	<div class="ColorPicker-container" v-click-outside="closeClick">
		<div class="open-DColorPicker" @click="openClick" :style="{'background-color': bgc}">
			<input type="hidden" :name="input_name" :value="bgc">
		</div>
		<chrome-picker :value="colors" v-show="open" @input="updateValue"></chrome-picker>
		<button class="button is-danger" @click.prevent="remove(this)">حذف</button>
	</div>
</template>
<script>
	import chrome from 'vue-color/src/components/Chrome.vue'
	import ClickOutside from 'vue-click-outside'
	export default {
		name:"color-picker-multi",
		props:{
			input_name:{
				type : String,
				default:"color",
			},
			color:{
				type : String,
				default:"#888",
			},
		},
		components:{
			'chrome-picker': chrome,
		},
		data () {
			return {
				colors: {hex: this.color},
				open: false,
				
			}
		},
		computed: {
			bgc () {
				return this.colors.hex
				console.log(this.colors.hex)
			},
			count(){
				console.log(document.querySelectorAll('ColorPicker-container').length)

			}
		},
		mounted () {

			this.popupItem = this.$el
		},
		methods: {
			openClick () {
				this.open = !this.open
			},
			closeClick(){
				this.open = false
			},
			updateValue (value) {
				this.colors = value
			},
			remove(value){
				this.$el.remove();
			}
		},
		directives: {
			ClickOutside
		}
	}
</script>
<style>
.ColorPicker-container {
	position: relative;
}
.open-DColorPicker {
	width: 50px;
	height: 50px;
	border-radius: 100%;
	cursor: pointer;
}
.vc-chrome{
	position: absolute;
	right: 0;
	top: 55px;
	z-index: 9
}
</style>
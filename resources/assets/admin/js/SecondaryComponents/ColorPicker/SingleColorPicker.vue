<template>
	<div class="ColorPicker-container" v-click-outside="closeClick">
		<div class="open-DColorPicker" @click="openClick" :style="{'background-color': bgc}">
			<input type="hidden" :name="name" :value="bgc">
		</div>
		<chrome-picker :value="colors" v-show="open" @input="updateValue"></chrome-picker>
	</div>
</template>
<script>
	import chrome from 'vue-color/src/components/Chrome.vue'
	import ClickOutside from 'vue-click-outside'
	export default {
		name:"single-color-picker",
		props:{
			name:{
				type : String,
				default:"color"
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
			},
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
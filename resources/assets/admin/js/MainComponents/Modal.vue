<template>
    <div class="modal-container">
        <button type="button" class="button modal-button" :class="{buttonClasses}" @click="modalOpenend = true">
            <span v-if="buttonIcon" class="icon">
                <i :class="buttonIcon"></i>
            </span>
            {{buttonText}}
        </button>
        <div  class="modal" :class="[ modalOpenend ? 'is-active' : '' ,  animation]">
            <div class="modal-background"></div>
            <div class="modal-content" :class="modalClasses">
                <div class="box">
                    <slot></slot>
                </div>
            </div>
            <button class="modal-close is-large" @click="modalOpenend = false" aria-label="close"></button>
        </div>
    </div> 
</template>

<script>
    export default {
        name: 'Modal',
        props: {
            buttonClasses:{
                type:String,
                default:null
            },
            modalClasses:{
                type:String,
                default:null
            },
            animation:{
                type:String,
                default:'modal-fx-fadeInScale'
            },
            buttonText:{
                type:String,
                default:'Open Modal'
            },
            buttonIcon:{
                type:String,
                default:null
            }
        },
        data() {
            return {
               modalOpenend: false 
            };
        },
        methods: {
            
        },
        created(){
            
        },
        mounted() {            
            
        },
        computed: {
            
        }
    };
</script>

<style lang="scss" scoped>
    
</style>
    

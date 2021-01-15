<template>
    <div>
        <div ref="dropzone" class="dropzone"></div>
        <div class="has-text-centered m-t-30">
            <a :href="redirectLink" class="button is-success">حفظ الصور</a>
        </div>
        <div class="columns is-multiline m-t-30" v-if="oldValues" v-lazy-container="{ selector: 'img' }">
            <div class="column is-3"  v-for="image in oldValues" :key="image.id">
                <div class="card">
                    <div class="card-image">
                        <figure class="image is-4by3">
                        <img :data-src="`${storageLink}/${image.path}`" alt="Placeholder image">
                        </figure>
                    </div>
                    <footer class="card-footer">
                        <span class="modal-open card-footer-item has-text-danger has-text-weight-bold" @click="openModal(image.id)" >مسح</span>
                    </footer>
                </div>
            </div>
        </div>
        <div class="modal delete-modal" :class="[modalOpened === true ? 'is-active' : '' ]">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                <p class="modal-card-title is-size-5">{{deleteModalTitle}}</p>
                <button type="button" class="delete close-modal" aria-label="close" @click="closeModal()"></button>
                </header>
                <form class="delete-form" method="POST" :action="imageDeleteLink" accept-charset="UTF-8">
                   <input name="_method" type="hidden" value="DELETE">
                    <input name="_token" type="hidden" :value="token">
                <section class="modal-card-body">
                    <p class="delete-text">{{deleteModalMessage}}</p>
                </section>
                <footer class="modal-card-foot has-background-white">
                    <button type="submit" class="button is-success">تأكيد</button>
                    <button type="button" class="button close-modal" @click="closeModal()">الغاء</button>
                </footer>
                </form>
            </div>
        </div>
    </div>       

</template>

<script>
    import Dropzone from 'dropzone';
    import axios from 'axios';

    export default {
        name: 'dropzone',
        dropZone: null,
        props: {
            url: {
                type: String,
                required: true
            },
            deleteUrl: {
                type: String,
                required: true
            },
            accepted:{
                type: String,
                default:'image/*'
            },
            maxSize:{
                type: Number,
                default:null
            },
            maxFiles:{
                type: Number,
                default:null
            },
            oldValues:{
                type: Array,
                default: null
            },
            deleteModalTitle:{
                type: String,
                default: 'حذف الصورة'
            },
            deleteModalMessage:{
                type: String,
                default: 'هل تريد حذف هذه الصورة'
            },
            redirectLink:{
                type: String,
                default: '/'
            },
            storageLink:{
                type: String,
                default: '/'
            },
            id: String
        },
        data() {
            return {
                photos: [],
                modalOpened:false,
                token:null,
                selectedImage:null
            };
        },
        methods: {
            initDropzone() {
                this.dropzone = new Dropzone(this.$refs.dropzone, {
                    url: this.url,
                    paramName: 'image',
                    addRemoveLinks: true,
                    acceptedFiles: this.accepted,                    
                    maxFilesize:this.maxSize,
                    maxFiles: this.maxFiles,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    dictDefaultMessage:
                        `<div class='dropzone-message-wrapper'>
                        <i class='fa fa-upload dropzone-start-message'></i>
                        <h4>يرجى اختيار الصور</h4>
                    </div>`,
                    dictRemoveFile: 'حذف',
                    dictFallbackMessage: 'متصفحك لا يدعمالسحب و الافلات ',
                    dictFileTooBig: `مساحة الملف المرفوع كبيرة جدا . اقصى مساحة هي ${this.maxSize} MB`,
                    dictInvalidFileType: 'نوع الملف غير صالح ',
                    dictCancelUpload: 'الغاء الرفع',
                    dictCancelUploadConfirmation: null,
                    dictMaxFilesExceeded: 'لقد تخطيت عدد الملفات التي يمكنك رفعها'
                });
                this.dropzone.on('success', this.onSuccess.bind(this));
                this.dropzone.on('error', this.onError.bind(this));
                this.dropzone.on('removedfile', this.onRemoved.bind(this));
            },
            onSuccess(file, response) {
                this.photos.push({ fileName: file.name, id: response.result.id });
            },
            onError(file,response){               
                var errorDisplay = document.querySelectorAll('[data-dz-errormessage]');
                errorDisplay[errorDisplay.length - 1].innerHTML = response.errors.image[0];
                errorDisplay[errorDisplay.length - 1].parentElement.style.opacity = "1";
            },
            onRemoved(file) {
                const photo = this.photos.filter((photo) =>
                    photo.fileName === file.name
                )[0];

                this.photos = this.photos.filter((photo) =>
                    photo.fileName !== file.name
                );

                if (! photo) {
                    return;
                }

                axios.delete(`${this.deleteUrl}/${photo.id}`, {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                });
            },
            openModal(imageID){
                this.selectedImage = imageID
                this.modalOpened = true
            },
            closeModal(){
                this.selectedImage = null
                this.modalOpened = false
            }
        },
        created(){
            this.token = document.querySelector('meta[name="csrf-token"]').content
        },
        mounted() {            
            Dropzone.autoDiscover = false;
            this.initDropzone();
        },
        computed: {
            imageDeleteLink: function () {
                let finalLink = null
                if(this.selectedImage !== null){
                   finalLink =  this.deleteUrl +'/'+ this.selectedImage
                }else{
                    finalLink = null
                }
                return finalLink
            }
        }
    };
</script>

<style lang="scss" scoped>
    .card{
        box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
    }
    .modal-card-head{
        border-bottom: 1px solid #f2f5f7;
    }
    .modal-card-foot{
        border-top:0
    }
    .modal-card-body{
        min-height: 5rem;
    }
    img[lazy=loading] {
        max-height : 4rem;
        min-height : 4rem;
    }
    img[lazy=error] {
        max-height :unset;
        min-height : unset;
        object-fit: contain;
    }
    img[lazy=loaded] {
        max-height :unset;
        min-height : unset;
    }
</style>
<style lang="scss">
    .dropzone {
        border: 2px dashed #54cc96 !important;
        border-radius: 20px;
        min-height: 15rem;
        .dz-message {
            margin: 3rem 0 !important;
            .dz-button {
                background: none;
                color: inherit;
                border: none;
                padding: 0;
                font: inherit;
                cursor: pointer;
                outline: inherit;
            }
        }
        .dz-preview {
            .dz-error-message {
                top: 153px !important;
            }
            .dz-remove {
                color: #ff5560;
                font-weight: bold;
            }
        }
        .dropzone-message-wrapper {
            color: #7a7a7a !important;
        }
        .dropzone-start-message {
            font-size: 54px !important;
        }
        
    } 
</style>
    

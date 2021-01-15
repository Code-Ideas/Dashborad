/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.Vue = require('vue');

import './bulma';

import 'jquery.repeater/jquery.repeater.min.js';

import './script';


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
/*=============== Plugins ==================*/
import VueSweetalert2 from 'vue-sweetalert2'
import * as VueGoogleMaps from 'vue2-google-maps'
import VueCtkDateTimePicker from 'vue-ctk-date-time-picker';

/*===============Main Components (Most Used) ==============*/
import IconPicker from './MainComponents/IconPicker'
import Dropzone from './MainComponents/Dropzone'
import Collapse from './MainComponents/Collapse/Collapse'
import CollapseItem from './MainComponents/Collapse/Item'
import Uploader from './MainComponents/Uploader'
import TinymceEditor from './MainComponents/Tinymce/Tinymce'
import Modal from './MainComponents/Modal'
import MultipleUploader from './MainComponents/MultipleUploader'
import Alert from './MainComponents/Alert'
import CkEditor from './MainComponents/ckeditor/VueCkEditor';


/*==============Secondary Components (rarely Used)=============*/
import StarRating from 'vue-star-rating'
import SingleColorPicker from './SecondaryComponents/ColorPicker/SingleColorPicker'
import RepeaterColor from './SecondaryComponents/ColorPicker/RepeaterColor'
import GoogleMap from './SecondaryComponents/GoogleMap'
import Tags from './SecondaryComponents/Tags'
import DateTimePicker from './SecondaryComponents/DateTimePicker'
import CustomSelect from './SecondaryComponents/Select/CustomSelect'
import SingleSelect from './SecondaryComponents/Select/SingleSelect'
import SelectAll from './SecondaryComponents/Select/SelectAll';


/*==============General Use=============*/
Vue.use(VueGoogleMaps, {load: {key: "AIzaSyCphqOpGEPztIh5Mwuj-sOSyGXlyJatl1s", libraries: "places"}});
Vue.use(VueSweetalert2);
Vue.component('VueCtkDateTimePicker', VueCtkDateTimePicker);


/*==============Export=============*/
export {
    Modal,
    MultipleUploader,
    SingleColorPicker,
    RepeaterColor,
    GoogleMap,
    Tags,
    Collapse,
    CollapseItem,
    DateTimePicker,
    StarRating,
    Dropzone,
    Uploader,
    TinymceEditor,
    CustomSelect,
    SingleSelect,
    CkEditor,
    SelectAll,
    Alert,
    IconPicker
}

const app = new Vue({
    el: '#app',
    components: {
        Modal,
        MultipleUploader,
        SingleColorPicker,
        RepeaterColor,
        GoogleMap,
        Tags,
        Collapse,
        CollapseItem,
        DateTimePicker,
        StarRating,
        Dropzone,
        Uploader,
        TinymceEditor,
        CustomSelect,
        SingleSelect,
        CkEditor,
        SelectAll,
        Alert,
        IconPicker
    }
});
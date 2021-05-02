<template>
    <div class="add_edit_map" @click="OpenMap">
        <img v-if="!editable && address.latitude == '' || !editable && address.longitude == ''" src="/admin/img/illustrations/lost.svg">
        <gmap-map v-else :center="center"	:zoom="8" style="width:100%;"	:style="{'height': mapHeight}">
            <gmap-marker :key="index" v-for="(m, index) in markers"	:position="m.position"
                         :draggable="editable" @dragend="updateCoordinates" ></gmap-marker>
        </gmap-map>
        <input type="hidden" v-model="latitude" name="latitude">
        <input type="hidden" v-model="longitude" name="longitude">
    </div>
</template>
<script>
export default {
    name: "GoogleMap",
    props: {
        address: {
            type: Object,
            required: false,
            default:null
        },
        editable:{
            type: Boolean,
            default: true
        },
        mapHeight:{
            type: String,
            default: '400px'
        }
    },
    data() {
        return {
            center: this.address && this.address.latitude != null ?
                { lat: parseFloat(this.address.latitude), lng:  parseFloat(this.address.longitude) }:
                { lat: 24.774265, lng: 46.738586 },
            markers: [
                {
                    position: this.address && this.address.latitude != null ?
                        { lat: parseFloat(this.address.latitude), lng:  parseFloat(this.address.longitude) }:
                        { lat: 24.774265, lng: 46.738586 }
                },
            ],
            zoom: 8,
            currentPlace: null,
            newAddress:{
                type: String,
                default : ' '
            },
            my_address : '',
            location : Array,
            latitude : this.address && this.address.latitude != null ? parseFloat(this.address.latitude): '',
            longitude : this.address && this.address.longitude != null ? parseFloat(this.address.longitude): ''
        };
    },
    methods: {
        getGeocoder(latlng){
            let geocoder = new google.maps.Geocoder();
            geocoder.geocode({'location': latlng }, function(results, status){
                if (status === 'OK') {
                    if (results[0]) {
                        this.newAddress = results[0].formatted_address;
                        return results[0].formatted_address;
                    } else {
                        console.log(status);
                        window.alert('No results found');
                    }
                }
            });
        },
        updateCoordinates(location) {
            var latlng = {
                lat : parseFloat(location.latLng.lat()),
                lng : parseFloat(location.latLng.lng())
            }
            axios.get(
                "https://maps.googleapis.com/maps/api/geocode/json?latlng="+latlng.lat+","+latlng.lng+"&key=AIzaSyCphqOpGEPztIh5Mwuj-sOSyGXlyJatl1s",
                {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    responseType: 'json',
                    withCredentials: true,
                }
            ).then(function () {

            }).catch(function () {

            });
            this.latitude = location.latLng.lat();
            this.longitude = location.latLng.lng();
        },
        getCurrentLocation(){
            if(navigator.geolocation) {
                var self = this;
                navigator.geolocation.getCurrentPosition(function(position){
                    self.position = position.coords;
                    self.latitude = position.coords.latitude;
                    self.longitude = position.coords.longitude;
                    self.markers = [

                        { position:
                                {lat: position.coords.latitude, lng: position.coords.longitude }
                        }


                    ]
                    self.center = { lat: position.coords.latitude, lng: position.coords.longitude }
                    axios.get(
                        "https://maps.google.com/maps/api/js&key=AIzaSyCphqOpGEPztIh5Mwuj-sOSyGXlyJatl1s",
                        {
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest'
                            },
                            responseType: 'json',
                            withCredentials: true,
                        }
                    ).then(function () {

                        self.getGeocoder({ lat: position.coords.latitude, lng: position.coords.longitude })

                    }).catch(function () {
                        console.log("error in detection location")
                    });


                })
            }
        },
        OpenMap(){
            if(!this.editable){
                window.open('https://www.google.com/maps/search/?api=1&query='+ this.latitude + ','+ this.longitude, '_blank');

            }
        }
    },
    created: function() {
        if(this.editable && this.address === null ){
            this.getCurrentLocation();
        }
    },
    watch: {
        latitude :function(val){
            this.$emit('update:latitude', val)
        },
        longitude :function(val){
            this.$emit('update:longitude', val)
        },
        editable :function(val) {
            if(this.editable && this.address.latitude=='' || this.editable && this.address.longitude=='' ){
                this.getCurrentLocation();
            }
        }
    }
};
</script>
<style lang="scss" scoped>
.add_edit_map{
    img{
        height:400px;
    }
}
</style>

<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Realtime Map</div>

                    <div class="card-body" style="height: 500px">
                        <div id="realtimemap" style="height: 100%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                map:null,
                marker: null,
                center: {lat: 10, lng: 10},
                data:null,
                lineCoordinates:[]
            }
        },
        methods: {
            mapInit() {
                this.map = new google.maps.Map(document.getElementById('realtimemap'), {
                    //center: this.center,
					center: {lat: -34.397, lng: 150.644},
                    zoom: 8
                });
                this.marker = new google.maps.Marker({
                    map: this.map,
                    position: this.center,
                    animation: "bounce"
                });
            },

            updateMap() {
                let newPosition = {lat:this.data.lat, lng:this.data.long};
                this.map.setCenter(newPosition);
                this.marker.setPosition(newPosition);
                this.lineCoordinates.push(new google.maps.LatLng(newPosition.lat, newPosition.lng));

                var lineCoordinatePath = new google.maps.Polyline({
                    path: this.lineCoordinates,
                    geodesic: true,
                    map: this.map,
                    strokeColor: "#ff0000",
                    strokeOpacity: 1.0,
                    strokeWeight: 2
                });
            },

           /**
           updateLocation() {
                let position= {
                    lat:12,
                    long:12
                };
                axios.post('/map', position).then(response=>{
                    console.log(response);
                })
            }
            */
        },
        mounted() {
            console.log('Component mounted.');
            this.mapInit();
        },
        created() {
            Echo.channel('location')
            .listen('SendLocation', (e)=> {
                this.data = e.location;
                this.updateMap();
                console.log(e);
            });
        }
    }
</script>

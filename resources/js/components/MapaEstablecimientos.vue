<template>
    <div class="mapa">
        <l-map :zoom="zoom"
                :center="center"
                :options="mapOptions">
                <l-tile-layer :url="url" :attribution="attribution" />
                <l-marker v-for="establecimiento in establecimientos"
                 v-bind:key="establecimiento.id"
                 :lat-lng="obtenerCoordenadas(establecimiento)"
                 :icon="iconoEstablecimiento(establecimiento)"
                 @click="redireccionar(establecimiento.id)">
                    <l-tooltip>
                        <div>
                            {{ establecimiento.nombre }} - {{ establecimiento.categoria.nombre }}
                        </div>
                    </l-tooltip>
                </l-marker>
            </l-map>
    </div>
</template>

<script>
import { latLng } from 'leaflet'
import { LMap, LTileLayer, LMarker, LTooltip, LIcon } from 'vue2-leaflet'
export default {
    components: {
        LMap,
        LTileLayer,
        LMarker,
        LTooltip,
        LIcon
    },
    data() {
        return {
        zoom: 13,
        center: latLng(36.71729, -4.420785),
        url: "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
        attribution:
            '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
        currentZoom: 11.5,
        currentCenter: latLng(36.71729, -4.420785),
        showParagraph: false,
        mapOptions: {
            zoomSnap: 0.5
        },
        showMap: true
        };
    },
    created() {
        axios.get('/api/establecimientos')
            .then(respuesta => {
                this.$store.commit('AGREGAR_ESTABLECIMIENTOS' , respuesta.data);
            })
    },
    computed: {
        establecimientos(){
            return this.$store.getters.obtenerEstablecimientos
        }
    },
    methods: {
        obtenerCoordenadas(establecimiento){
            return {
                lat: establecimiento.lat,
                lng: establecimiento.lng,

            }
        },
        iconoEstablecimiento(establecimiento){
            const { slug } = establecimiento.categoria
           return L.icon({
               iconUrl:`images/iconos/${slug}.png`,
               iconSize: [40,50]
           })
        },
        redireccionar(id){
            this.$router.push({ name: 'establecimiento' , params: {id} })
        }
    },
    watch: {
        "$store.state.categoria" : function(){
            axios.get('/api/' + this.$store.getters.obtenerCategoria)
                .then(respuesta => {
                    this.$store.commit('AGREGAR_ESTABLECIMIENTOS' , respuesta.data)
                })
        }
    }


}
</script>
<style scoped>
  @import 'https://unpkg.com/leaflet@1.7.1/dist/leaflet.css';
  .mapa{
    height: 600px;
    width: 100%;
  }
</style>

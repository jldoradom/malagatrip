<template>
  <div>
      <h4 class="mt-4">Galeria</h4>
      <ul class="row list-unstyled mt-4">
          <li class="mb-4" v-for=" imagen in this.imagenes " v-bind:key="imagen.id">
            <a :href='`/storage/${imagen.ruta_imagen}`' data-lightbox="imagenes" data-title="Imagen establecimiento">
                <img  :src='`/storage/${imagen.ruta_imagen}`' class="img-fluid">
            </a>
          </li>
      </ul>
  </div>
</template>


<script>
import Lightbox from 'lightbox2';
export default {
    computed: {
        imagenes(){
            return this.$store.getters.obtenerImagenes
        }
    }

}
</script>

<style>
    @import 'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css';
</style>

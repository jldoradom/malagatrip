<template>
   <div class="container my-5">
       <h2 class="text-center mb-3">{{ establecimiento.nombre }}</h2>
       <div class="row align-items-start">
           <div class="col-md-8 order-2">
               <div class="infobox p-4">
                    <img class="img-fluid mb-4 mt-4" :src="`../storage/${establecimiento.imagen_principal}`" alt="imagen establecimiento">
                    <h4 class="mb-4 mt-2">Sobre nosotros</h4>
                    <p class="mt-3">{{ establecimiento.descripcion }}</p>
               </div>
                <div class="mb-4 p-4 infobox order-3">
                    <div class="d-flex justify-content-between">
                        <h4 class="mt-2">Que opinan de nosotros</h4>
                         <!-- <router-link class="enlace mt-2 btn btn-primary d-block" :to="{ name: 'comentario' , params: {id: establecimiento.id} }">Déjanos tu oponión</router-link> -->
                        <a class="mt-2 btn btn-primary d-block" :href="`/comentario/create/${establecimiento.id}`">Déjanos tu oponión</a>
                    </div>
                    <div class="infobox p-3">
                        <h5>Todo genial</h5>
                        <p>Autor: </p>
                        <p>
                            Contrary to popular belief, Lorem Ipsum is not simply random text.
                            It has roots in a piece of classical Latin literature from 45 BC,
                            making it over 2000 years old. Richard McClintock,
                            a Latin professor at Hampden-Sydney College in Virginia,
                                looked up one of the more obscure Latin words, consectetur,
                                from a Lorem Ipsum passage, and going through the cites of the word in
                                classical literature, discovered the undoubtable source. Lorem Ipsum
                                comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum"
                                (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is
                                a treatise on the theory of ethics, very popular during the Renaissance.
                                    The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..",
                                    comes from a line in section 1.10.32.
                        </p>
                    </div>
                    <div class="infobox p-3">
                        <h5>Todo genial</h5>
                        <p>Autor: </p>
                        <p>
                            Contrary to popular belief, Lorem Ipsum is not simply random text.
                            It has roots in a piece of classical Latin literature from 45 BC,
                            making it over 2000 years old. Richard McClintock,
                            a Latin professor at Hampden-Sydney College in Virginia,
                                looked up one of the more obscure Latin words, consectetur,
                                from a Lorem Ipsum passage, and going through the cites of the word in
                                classical literature, discovered the undoubtable source. Lorem Ipsum
                                comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum"
                                (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is
                                a treatise on the theory of ethics, very popular during the Renaissance.
                                    The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..",
                                    comes from a line in section 1.10.32.
                        </p>
                    </div><div class="infobox p-3">
                        <h5>Todo genial</h5>
                        <p>Autor: </p>
                        <p>
                            Contrary to popular belief, Lorem Ipsum is not simply random text.
                            It has roots in a piece of classical Latin literature from 45 BC,
                            making it over 2000 years old. Richard McClintock,
                            a Latin professor at Hampden-Sydney College in Virginia,
                                looked up one of the more obscure Latin words, consectetur,
                                from a Lorem Ipsum passage, and going through the cites of the word in
                                classical literature, discovered the undoubtable source. Lorem Ipsum
                                comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum"
                                (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is
                                a treatise on the theory of ethics, very popular during the Renaissance.
                                    The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..",
                                    comes from a line in section 1.10.32.
                        </p>
                    </div>
                </div>
           </div>
           <aside class="col-md-4 order-1">
               <div class="p-4 infobox">
                   <h4 class="mb-4 mt-2">Donde estamos</h4>
                    <div>
                        <mapa-ubicacion class="mb-4"></mapa-ubicacion>
                    </div>
                   <p class="mt-1">
                       <span class="font-weight-bold">
                           Dirección:
                       </span>
                       {{ establecimiento.direccion }}
                   </p>
                   <p class="mt-1">
                       <span class="font-weight-bold">
                           Zona:
                       </span>
                       {{ establecimiento.zona }}
                   </p>


               </div>
               <div class="p-4 infobox">
                   <h4 class="mb-4 mt-2 ">Como contactar</h4>
                   <p class="mt-1">
                       <span class="font-weight-bold">
                           Teléfono:
                       </span>
                       {{ establecimiento.telefono }}
                   </p>
                   <p class="mt-1">
                       <span class="font-weight-bold">
                           Email:
                       </span>
                       ejemplo@gmail.com
                   </p>
                   <p class="mt-1">
                       <span class="font-weight-bold">
                           Horario:
                       </span>
                       {{ establecimiento.apertura }} - {{ establecimiento.cierre }}
                   </p>
                   <p class="mt-1">
                       <span class="font-weight-bold">
                           Web:
                       </span>
                       ejemplo.com
                   </p>
               </div>
                <div class="p-4 infobox">
                    <galeria-imagenes></galeria-imagenes>
                </div>
           </aside>
       </div>
   </div>
</template>


<script>
    import MapaUbicacion from './MapaUbicacion';
    import GaleriaImagenes from './GaleriaImagenes';
    export default {
    components: {
            MapaUbicacion,
            GaleriaImagenes
    },
    mounted() {
        const { id } =  this.$route.params;
        axios.get('/api/establecimientos/' + id)
            .then(response => {
                this.$store.commit('AGREGAR_ESTABLECIMIENTO' , response.data);
            })
    },
    computed: {
        establecimiento(){
            return this.$store.getters.obtenerEstablecimiento;
        }
    }
}
</script>

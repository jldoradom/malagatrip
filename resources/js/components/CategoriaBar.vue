<template>
    <div class="container my-5">
        <h2>Bar</h2>
        <div class="row">
            <div class="col-md-4 mt-4" v-for=" bar in this.bares " v-bind:key="bar.id">
                    <div class="card">
                        <router-link class="enlace" :to="{ name: 'establecimiento' , params: {id: bar.id} }">
                            <img class="card-img-top" :src="`storage/${bar.imagen_principal}`" alt="imagen del bar">

                            <div class="card-body">
                                <h3 class="card-title text-primary font-weight-bold">{{ bar.nombre }}</h3>
                                <p class="card-text">{{ bar.direccion }}</p>
                                <p class="card-text">
                                    <span class="font-weight-bold">Zona:</span>
                                    {{ bar.zona }}
                                </p>

                            </div>
                        </router-link>
                    </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    mounted() {
        axios.get('/api/categorias/bar')
            .then(response => {
               this.$store.commit("AGREGAR_BARES", response.data);
            });
    },
    computed: {
        bares(){
            return this.$store.state.bares;
        },

    }
}
</script>

<style scope>
    .enlace{
        text-decoration: none;
        color: #000;
    }

    .enlace:hover {
        color: #000;
        text-decoration: none;
    }
</style>

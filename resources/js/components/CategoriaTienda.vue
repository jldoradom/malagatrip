<template>
    <div class="container my-5">
        <h2>Tienda</h2>
        <div class="row">
            <div class="col-md-4 mt-4" v-for=" tienda in this.tiendas " v-bind:key="tienda.id">
                <div class="card">
                    <img class="card-img-top" :src="`storage/${tienda.imagen_principal}`" alt="imagen del tienda">
                    <div class="card-body">
                        <h3 class="card-title text-primary font-weight-bold">{{ tienda.nombre }}</h3>
                        <p class="card-text">{{ tienda.direccion }}</p>
                        <p class="card-text">
                            <span class="font-weight-bold">Horario:</span>
                            {{ tienda.apertura }} {{ tienda.cierre }}
                        </p>
                        <router-link :to="{ name: 'establecimiento' , params: {id: tienda.id} }">
                            <a class="btn btn-primary d-block" href="">Ver lugar</a>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    mounted() {
        axios.get('/api/categorias/tienda')
            .then(response => {
               this.$store.commit("AGREGAR_TIENDAS", response.data);
            })
    },
    computed: {
        tiendas(){
            return this.$store.state.tiendas;
        }
    }
}
</script>

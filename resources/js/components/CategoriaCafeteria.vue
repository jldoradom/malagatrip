<template>
    <div class="container my-5">
        <h2>Cafeteria</h2>
        <div class="row">
            <div class="col-md-4 mt-4" v-for=" cafeteria in this.cafeterias " v-bind:key="cafeteria.id">
                <div class="card">
                    <img class="card-img-top" :src="`storage/${cafeteria.imagen_principal}`" alt="imagen del cafeteria">
                    <div class="card-body">
                        <h3 class="card-title text-primary font-weight-bold">{{ cafeteria.nombre }}</h3>
                        <p class="card-text">{{ cafeteria.direccion }}</p>
                        <p class="card-text">
                            <span class="font-weight-bold">Horario:</span>
                            {{ cafeteria.apertura }} {{ cafeteria.cierre }}
                        </p>
                        <router-link :to="{ name: 'establecimiento' , params: {id: cafeteria.id} }">
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
        axios.get('/api/categorias/cafeteria')
            .then(response => {
               this.$store.commit("AGREGAR_CAFETERIAS", response.data);
            })
    },
    computed: {
        cafeterias(){
            return this.$store.state.cafeterias;
        }
    }
}
</script>

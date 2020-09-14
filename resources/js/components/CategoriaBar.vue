<template>
    <div class="container my-5">
        <h2>Bar</h2>
        <div class="row">
            <div class="col-md-4 mt-4" v-for=" bar in this.bares " v-bind:key="bar.id">
                <div class="card">
                    <img class="card-img-top" :src="`storage/${bar.imagen_principal}`" alt="imagen del bar">
                    <div class="card-body">
                        <h3 class="card-title text-primary font-weight-bold">{{ bar.nombre }}</h3>
                        <p class="card-text">{{ bar.direccion }}</p>
                        <p class="card-text">
                            <span class="font-weight-bold">Horario:</span>
                            {{ bar.apertura }} {{ bar.cierre }}
                        </p>
                        <router-link :to="{ name: 'establecimiento' , params: {id: bar.id} }">
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
        axios.get('/api/categorias/bar')
            .then(response => {
               this.$store.commit("AGREGAR_BARES", response.data);
            })
    },
    computed: {
        bares(){
            return this.$store.state.bares;
        }
    }
}
</script>

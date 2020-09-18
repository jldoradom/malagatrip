<template>
    <div class="container my-5">
        <h2>Taller</h2>
        <div class="row">
            <div class="col-md-4 mt-4" v-for=" taller in this.talleres " v-bind:key="taller.id">
                <div class="card">
                    <img class="card-img-top" :src="`storage/${taller.imagen_principal}`" alt="imagen del taller">
                    <div class="card-body">
                        <h3 class="card-title text-primary font-weight-bold">{{ taller.nombre }}</h3>
                        <p class="card-text">{{ taller.direccion }}</p>
                        <p class="card-text">
                            <span class="font-weight-bold">Horario:</span>
                            {{ taller.apertura }} {{ taller.cierre }}
                        </p>
                        <router-link :to="{ name: 'establecimiento' , params: {id: taller.id} }">
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
        axios.get('/api/categorias/taller')
            .then(response => {
               this.$store.commit("AGREGAR_TALLERES", response.data);
            })
    },
    computed: {
        talleres(){
            return this.$store.state.talleres;
        }
    }
}
</script>

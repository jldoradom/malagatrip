<template>
    <div>
        <nav class="d-flex flex-column flex-md-row container justify-content-md-center my-4">
            <a @click="seleccionarTodos()"  class="d-flex m-1 custom-rounded custom-rounded-black">Todos
                <svg class="w-6 h-6 icono" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            </a>
            <a v-for="categoria in categorias"
                v-bind:key="categoria.id"
                class="d-flex align-items-center m-1 custom-rounded custom-rounded-black"
                @click="seleccionarCategoria(categoria)">
                {{ categoria.nombre }}

                <svg class="w-6 h-6 icono" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                 xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      :d="categoria.icono">

                    </path>
                </svg>
            </a>
        </nav>
   </div>
</template>

<script>
export default {
    created(){
        axios.get('/api/categorias')
            .then(respuesta => {
               this.$store.commit('AGREGAR_CATEGORIAS', respuesta.data)
            })
    },
    computed: {
        categorias() {
            return this.$store.getters.obtenerCategorias
        }
    },
    methods: {
        seleccionarCategoria(categoria){
            this.$store.commit('SELECCIONAR_CATEGORIA' , categoria.slug)

        },
        seleccionarTodos(){
            axios.get('/api/establecimientos')
                .then(respuesta => {
                this.$store.commit('AGREGAR_ESTABLECIMIENTOS' , respuesta.data);
            })
        },
        cargarIcono(categoria){
            return categoria.icono;
        }
    },
}
</script>

<style scoped>

nav a {
    color: #000000;
    font-weight: bold;
    text-transform: uppercase;
    padding: 1rem 2rem;
    text-align: center;
    flex: 1;
}
nav a:hover {
    color: white;
    cursor: pointer;
    background-color: black;
    text-decoration: none;
}

.custom-rounded-black {
    border-radius: 1rem !important;
    border-color: black;
    border: solid 1px;
}

.icono {
    width: 20px;
    margin-left: 4px;
    margin-bottom: 3px;
}


</style>

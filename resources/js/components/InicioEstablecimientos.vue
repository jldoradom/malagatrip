<template>
    <div>
        <listado-categorias></listado-categorias>
        <mapa-establecimientos></mapa-establecimientos>
        <categoria-bar></categoria-bar>
        <categoria-restaurant></categoria-restaurant>
        <categoria-hotel></categoria-hotel>
    </div>
</template>

<script>
    import CategoriaBar from './CategoriaBar'
    import CategoriaRestaurant from './CategoriaRestaurant'
    import CategoriaHotel from './CategoriaHotel'
    import MapaEstablecimientos from './MapaEstablecimientos'
    import ListadoCategorias from './ListadoCategorias'


    export default {

        components: {
            CategoriaBar,
            CategoriaRestaurant,
            CategoriaHotel,
            MapaEstablecimientos,
            ListadoCategorias
        }

    }
</script>

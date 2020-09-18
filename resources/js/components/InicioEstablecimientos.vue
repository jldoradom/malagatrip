<template>
    <div>
        <listado-categorias></listado-categorias>
        <mapa-establecimientos></mapa-establecimientos>
        <categoria-bar></categoria-bar>
        <categoria-restaurant></categoria-restaurant>
        <categoria-hotel></categoria-hotel>
        <categoria-tienda></categoria-tienda>
        <categoria-cafeteria></categoria-cafeteria>
        <categoria-taller></categoria-taller>
    </div>
</template>

<script>
    import CategoriaBar from './CategoriaBar'
    import CategoriaRestaurant from './CategoriaRestaurant'
    import CategoriaHotel from './CategoriaHotel'
    import MapaEstablecimientos from './MapaEstablecimientos'
    import ListadoCategorias from './ListadoCategorias'
    import CategoriaTienda from './CategoriaTienda'
    import CategoriaCafeteria from './CategoriaCafeteria'
    import CategoriaTaller from './CategoriaTaller'


    export default {

        components: {
            CategoriaTaller,
            CategoriaCafeteria,
            CategoriaTienda,
            CategoriaBar,
            CategoriaRestaurant,
            CategoriaHotel,
            MapaEstablecimientos,
            ListadoCategorias
        }

    }
</script>

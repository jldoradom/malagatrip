import Vue from 'vue';
import Vuex from 'vuex';


Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        bares: [],
        restaurantes: [],
        hoteles: [],
        tiendas: [],
        cafeterias: [],
        talleres: [],
        establecimiento: {},
        establecimientos: [],
        categorias: [],
        categoria: ''


    },
    mutations: {
        AGREGAR_BARES(state, bares){
            state.bares = bares;
        },
        AGREGAR_RESTAURANTES(state, restaurantes){
            state.restaurantes = restaurantes;
        },
        AGREGAR_HOTELES(state, hoteles){
            state.hoteles = hoteles;
        },
        AGREGAR_TIENDAS(state, tiendas){
            state.tiendas = tiendas;
        },
        AGREGAR_CAFETERIAS(state, cafeterias){
            state.cafeterias = cafeterias;
        },
        AGREGAR_TALLERES(state, talleres){
            state.talleres = talleres;
        },
        AGREGAR_ESTABLECIMIENTO(state, establecimiento){
            state.establecimiento = establecimiento;
        },
        AGREGAR_ESTABLECIMIENTOS(state, establecimientos){
            state.establecimientos = establecimientos;
        },
        AGREGAR_CATEGORIAS(state, categorias){
            state.categorias = categorias;
        },
        SELECCIONAR_CATEGORIA(state, categoria){
            state.categoria = categoria;
        }

    },
    getters: {
        obtenerEstablecimiento: state  => {
            return state.establecimiento;
        },
        obtenerImagenes: state => {
            return state.establecimiento.imagenes;
        },
        obtenerEstablecimientos: state => {
            return state.establecimientos;
        },
        obtenerCategorias: state => {
            return state.categorias;
        },
        obtenerCategoria: state => {
            return state.categoria;
        }
    }
});

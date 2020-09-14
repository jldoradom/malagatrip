"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;

var _vue = _interopRequireDefault(require("vue"));

var _vuex = _interopRequireDefault(require("vuex"));

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }

_vue["default"].use(_vuex["default"]);

var _default = new _vuex["default"].Store({
  state: {
    bares: [],
    restaurantes: [],
    hoteles: [],
    establecimiento: {},
    establecimientos: [],
    categorias: [],
    categoria: ''
  },
  mutations: {
    AGREGAR_BARES: function AGREGAR_BARES(state, bares) {
      state.bares = bares;
    },
    AGREGAR_RESTAURANTES: function AGREGAR_RESTAURANTES(state, restaurantes) {
      state.restaurantes = restaurantes;
    },
    AGREGAR_HOTELES: function AGREGAR_HOTELES(state, hoteles) {
      state.hoteles = hoteles;
    },
    AGREGAR_ESTABLECIMIENTO: function AGREGAR_ESTABLECIMIENTO(state, establecimiento) {
      state.establecimiento = establecimiento;
    },
    AGREGAR_ESTABLECIMIENTOS: function AGREGAR_ESTABLECIMIENTOS(state, establecimientos) {
      state.establecimientos = establecimientos;
    },
    AGREGAR_CATEGORIAS: function AGREGAR_CATEGORIAS(state, categorias) {
      state.categorias = categorias;
    },
    SELECCIONAR_CATEGORIA: function SELECCIONAR_CATEGORIA(state, categoria) {
      state.categoria = categoria;
    }
  },
  getters: {
    obtenerEstablecimiento: function obtenerEstablecimiento(state) {
      return state.establecimiento;
    },
    obtenerImagenes: function obtenerImagenes(state) {
      return state.establecimiento.imagenes;
    },
    obtenerEstablecimientos: function obtenerEstablecimientos(state) {
      return state.establecimientos;
    },
    obtenerCategorias: function obtenerCategorias(state) {
      return state.categorias;
    },
    obtenerCategoria: function obtenerCategoria(state) {
      return state.categoria;
    }
  }
});

exports["default"] = _default;
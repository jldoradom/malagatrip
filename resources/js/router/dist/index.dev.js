"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;

var _vue = _interopRequireDefault(require("vue"));

var _vueRouter = _interopRequireDefault(require("vue-router"));

var _vuePageTransition = _interopRequireDefault(require("vue-page-transition"));

var _InicioEstablecimientos = _interopRequireDefault(require("../components/InicioEstablecimientos"));

var _MostrarEstablecimiento = _interopRequireDefault(require("../components/MostrarEstablecimiento"));

var _NuevoComentario = _interopRequireDefault(require("../components/NuevoComentario"));

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }

var routes = [{
  path: '/',
  component: _InicioEstablecimientos["default"]
}, {
  path: '/establecimiento/:id',
  name: "establecimiento",
  component: _MostrarEstablecimiento["default"]
}, {
  path: '/comentario/:id',
  name: 'comentario',
  component: _NuevoComentario["default"]
}];
var router = new _vueRouter["default"]({
  mode: 'history',
  routes: routes
});

_vue["default"].use(_vueRouter["default"]);

_vue["default"].use(_vuePageTransition["default"]);

var _default = router;
exports["default"] = _default;
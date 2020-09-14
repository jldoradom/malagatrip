"use strict";

var _require = require("axios"),
    Axios = _require["default"];

document.addEventListener('DOMContentLoaded', function () {
  if (document.querySelector('#dropzone')) {
    Dropzone.autoDiscover = false;
    var dropzone = new Dropzone('div#dropzone', {
      url: '/imagenes/store',
      dictDefaultMessage: 'Sube hasta 10 imágenes',
      maxFiles: 10,
      required: true,
      acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
      addRemoveLinks: true,
      dictRemoveFile: "Eliminar imagen",
      headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
      },
      init: function init() {
        var _this = this;

        var galeria = document.querySelectorAll('.galeria');

        if (galeria.length > 0) {
          galeria.forEach(function (imagen) {
            var imagenPublicada = {};
            imagenPublicada.size = 1;
            imagenPublicada.name = imagen.value;
            imagenPublicada.nombreServidor = imagen.value;

            _this.options.addedfile.call(_this, imagenPublicada);

            _this.options.thumbnail.call(_this, imagenPublicada, "/storage/".concat(imagenPublicada.name));

            imagenPublicada.previewElement.classList.add('dz-success');
            imagenPublicada.previewElement.classList.add('dz-complete');
          });
        }
      },
      success: function success(file, response) {
        // console.log(file);
        console.log(response);
        file.nombreServidor = response.archivo;
      },
      sending: function sending(file, xhr, formData) {
        formData.append('uuid', document.querySelector('#uuid').value); // console.log("Enviando...");
      },
      removedfile: function removedfile(file, response) {
        console.log(file);
        var params = {
          imagen: file.nombreServidor,
          uuid: document.querySelector('#uuid').value
        };
        axios.post('/imagenes/destroy', params).then(function (response) {
          console.log(response); // Eliminar del DOM

          file.previewElement.parentNode.removeChild(file.previewElement);
        })["catch"](function (error) {
          console.log(error);
        });
      }
    });
  }
});
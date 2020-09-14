import { OpenStreetMapProvider } from 'leaflet-geosearch';
const provider = new OpenStreetMapProvider();

document.addEventListener('DOMContentLoaded', () => {

    if(document.querySelector('#mapa')){
        const lat = document.querySelector('#lat').value === '' ? 36.71729 : document.querySelector('#lat').value;
        const lng = document.querySelector('#lng').value === '' ? -4.420785 : document.querySelector('#lng').value;


        const mapa = L.map('mapa').setView([lat, lng], 16);

        // Eliminar pines previos
        let markers = new L.FeatureGroup().addTo(mapa);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(mapa);

        let marker;

        // agregar el pin
        marker = new L.marker([lat, lng], {
            draggable: true,
            autoPan: true,

        }).addTo(mapa);

        // Agregar el pin al markers
        markers.addLayer(marker);

        // Geocode Service
        const geocodeService = L.esri.Geocoding.geocodeService();

        // Buscador de direcciones
        const buscador = document.querySelector('#formbuscador');
        buscador.addEventListener('blur' , bucarDireccion);


        reubicarpin(marker);


        function bucarDireccion(e){
            if(e.target.value.length > 1){
                provider.search({query: e.target.value  })
                    .then(resultado => {
                        if( resultado ){
                            // Limpiar pines previos
                            markers.clearLayers();

                            geocodeService.reverse().latlng(resultado[0].bounds[0], 16).run(function(error, resultado) {
                                // Llenar los inputs
                                llenarInputs(resultado);
                                // Centrar el mapa
                                mapa.setView(resultado.latlng);
                                // Agregar el pin
                                marker = new L.marker(resultado.latlng, {
                                    draggable: true,
                                    autoPan: true,

                                }).addTo(mapa);

                                // Asignar el contenedor de markers el nuevo pin
                                markers.addLayer(marker);

                                //Mover el pin
                                reubicarpin(marker)



                            });
                        }
                    })
                    .catch(error => {
                        // console.log(error);
                    })
            }

        }

        function llenarInputs(resultado) {
            document.querySelector('#direccion').value = resultado.address.Address || '';
            document.querySelector('#zona').value = resultado.address.Neighborhood || '';
            document.querySelector('#lat').value = resultado.latlng.lat || '';
            document.querySelector('#lng').value = resultado.latlng.lng || '';
        }


        function reubicarpin(marker){
            // Detectar movimiento del marker
            marker.on('moveend' , function(e) {
                marker = e.target;

                const posicion = marker.getLatLng();

                // Centrar automaticamente
                mapa.panTo(new L.LatLng( posicion.lat, posicion.lng ));

                // Reserve Geocoding, cuando el usuario reubioca el pin
                geocodeService.reverse().latlng(posicion, 16).run(function(error, resultado) {
                    // console.log(error);



                    marker.bindPopup(resultado.address.LongLabel);
                    marker.openPopup();

                    // Llenar los campos
                    llenarInputs(resultado);
                });



            });
        }


    }

});

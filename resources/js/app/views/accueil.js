import Exploitation from '../components/Exploitation.vue'
import PopularProducts from '../components/products/PopularProducts.vue'
import { apiService } from '../_services/apiService';
import { authenticationService } from '../_services/authentication.service';
export default {

    components: {
        PopularProducts,
        Exploitation
    },
    data() {
        return {
            map: null,
            tileLayer: null,
            layers: [
                {
                    id: 0,
                    name: 'Exploitations',
                    active: false,
                    features: [],

                },
            ],
            drawer: false,
            detail: false,
            exploitations: [],
            exploiTation: null,
            responsive: 'hidden-sm-and-down',
            currentUser: null

        }
    },

    mounted() {
        this.getExploitations();
        this.initMap();
        authenticationService.currentUser.subscribe((x) => (this.currentUser = x));


    },

    computed: {
        isClient() {
            if (!_.isEmpty(this.currentUser)) {
                return this.currentUser.role.name == "Client";
            }
        },
    },

    methods: {
        getExploitations() {
            apiService.get('/api/exploitations').then(({ data }) => {
                data.data.forEach(exploitation => {
                    this.exploitations.push(exploitation)
                    let coords = [exploitation.latitude, exploitation.longitude];
                    let feature = { id: exploitation.id, name: exploitation.name, type: exploitation.type, coords: coords }
                    this.layers[0].features.push(feature);
                })
                this.initLayers();
            })
        },
        initMap() {
            const lat = -21.11;
            const long = 55.53;
            var southEast = L.latLng(-21.36, 55.86);
            var northWest = L.latLng(-20.88, 55.19);
            let bounds = L.latLngBounds(southEast, northWest);
            this.map = L.map('map', { maxBounds: bounds, minZoom: 10 }).setView([lat, long], 10);

            this.tileLayer = L.tileLayer(
                'https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png',
                {
                    maxZoom: 13,
                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>, &copy; <a href="https://carto.com/attribution">CARTO</a>',
                }
            );
            this.tileLayer.addTo(this.map);


            this.map.on('click', this.onMapClick);

        },

        onMapClick(e) {
            L.popup()
                .setLatLng(e.latlng)
                .setContent("Il n'y a pas d'exploitation ici ! ")
                .openOn(this.map);
        },

        initLayers() {
            this.layers.forEach((layer) => {

                const markerFeatures = layer.features.filter(feature => feature.type === 'marker');
                markerFeatures.forEach((feature) => {
                    feature.leafletObject = L.marker(feature.coords)
                    feature.leafletObject.addEventListener('click', function () { this.exploitation(feature.id) }, this);
                    var circle = L.circle(feature.coords, {
                        color: '#106b2f',
                        fillColor: 'green',
                        fillOpacity: 0.5,
                        radius: 500
                    }).bindPopup(feature.name).addTo(this.map);
                    feature.leafletObject.addTo(this.map);


                });
            }, true);

        },

        exploitation(id) {
            let exploitIndex = _.findIndex(this.exploitations, { id: id });
            let exploitation = this.exploitations[exploitIndex];
            this.exploiTation = exploitation;
            this.drawer = !this.drawer
        },


    }
}
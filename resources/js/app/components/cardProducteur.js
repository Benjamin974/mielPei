import { apiService } from "../_services/apiService"
import Fiche from "./producteurs/Fiche.vue"
export default {
  components: {
    Fiche
  },
  props: {
    producteur: {
      default: function () {
        return {}
      }
    }
  },

  data() {
    return {
      fiche: {},
      products: []
    }
  },

  created() {
    this.getFiche();
    this.getProduct();
  },

  methods: {
    getFiche() {
      apiService.get('/api/producteur/fiche/' + this.producteur.id).then(({data}) => {
        this.fiche = data;
      })
    },

    getProduct() {
      apiService.get('/api/producteurs/products/' + this.producteur.id).then(({data}) => {
        data.producteurs_has_products.forEach(product => {
          this.products.push(product);
        });
      })
    }
  },
}
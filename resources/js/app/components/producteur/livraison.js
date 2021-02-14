import { apiService } from "../../_services/apiService";

export default {
  props: {
    commande: {
      default: function () {
        return {}
      }
    }
  },

  data() {
    return {
      livraison: null,
      isEnCours: false,
    }
  },

  created() {
      this.getLivraison();
  },

  methods: {
    getLivraison() {
      apiService.get('/api/producteur/product/livraison/' + this.commande.product.id, {id_commande: this.commande.id}).then(({ data }) => {
        this.livraison = data.data
      })
    },
    addLivraison(commande) {
      apiService.post('/api/producteur/product/livraison', { id_product: commande.id_product, id_commande: commande.id }).then(({ data }) => {
        this.livraison = data.data;
      })
    }
  }
}
import { apiService } from '../_services/apiService'
import ProductsCommande from '../components/products/ProductsCommande.vue'
export default {
  components: {
    ProductsCommande
  },

  data() {
    return {
      commandes: []
    }
  },

  created() {
    this.getCommandes();
  },

  methods: {
    getCommandes() {
      apiService.get('/api/client/' + this.$route.params.id + '/commandes').then(({ data }) => {
        data.data.forEach(commande => {
          this.commandes.push(commande);
        })
      })
    }
  }

}
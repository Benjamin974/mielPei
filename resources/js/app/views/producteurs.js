import CardProducteur from '../components/CardProducteur.vue'
import { apiService } from '../_services/apiService';
export default {
  components: {
    CardProducteur
  },

  data() {
    return {
      producteurs: [],

    }
  },

  created() {
    this.getProducteurs();
  },

  methods: {
    getProducteurs() {
      apiService.get('/api/producteurs').then(({ data }) => {
        data.data.forEach(producteur => {
          this.producteurs.push(producteur);
        });
      })
    }
  }
}
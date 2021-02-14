import { apiService } from '../../_services/apiService'
import AddInBasket from './AddInBasket.vue'
export default {
  components: {
    AddInBasket
  },
  
  data() {
    return {
      products: []
    }
  },

  created() {
    this.getProducts();
  },

  methods: {
    getProducts() {
      apiService.get('/api/popular-products').then(({data}) => {

        data.data.forEach(product => {
          this.products.push(product);
        })
      })
    }
  }
}
import AddInBasket from "../components/products/AddInBasket.vue"
import { apiService } from "../_services/apiService";
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
      apiService.get('/api/products').then(({ data }) => {
        data.data.forEach(product => {
          if (product.quantite != 0) {
            this.products.push(product);

          }
        });
      })
    }
  }


}
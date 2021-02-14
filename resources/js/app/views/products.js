import AddInBasket from "../components/products/AddInBasket.vue"
import { apiService } from "../_services/apiService";
export default {
  components: {
    AddInBasket
  },

  data() {
    return {
      products: [],
      page: 0,
      pagination: {
        visible: 10,
        pageCount: 0,
      }
    }
  },

  created() {
    this.nextPageProducts(1);
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
    },

    nextPageProducts(page) {
      this.products = [];
      apiService.get('/api/products?page=' + page).then(({ data }) => {
        data.data.forEach(product => {
          if (product.quantite != 0) {
            this.products.push(product);

          }
        });
        this.pagination.pageCount = data.meta.last_page
      })
    }
  }


}
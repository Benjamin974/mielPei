import { apiService } from '../../_services/apiService'
export default {
  props: {
    product: {
      default: function () {
        return {}
      }
    }
  },
  data() {
    return {
      sheet: false,
    }
  }, 
  methods: {
    deleteProduct(product) {
      apiService.post('/api/producteurs/products/delete/' + product.id, {id_user: this.product.pivot.id_user}).then(
        this.$emit('deleteProduct', product)
      )

    }
  },
}
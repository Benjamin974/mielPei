import AddInBasket from '../../components/products/AddInBasket.vue'
export default {
  components: {
    AddInBasket
  },

  props: {
    fiche: {
      default: function () {
        return {}
      }
    },
    products: {
      default: function () {
        return {}
      }
    },
  },


  data() {
    return {
      perPage: 3,
      currentPage: 1,
      fields: ['name', 'image'],
    }
  },

  computed: {
    rows() {
      return this.products.length
    }
  },

}
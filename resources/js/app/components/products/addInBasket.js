import { basketServices } from '../../_services/basketServices'

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
      quantite: 0,
      snackbar: false,
      text: "",
      timeout: 3000,
    }
  },

  methods: {


    commander() {
      if (this.product.quantite < this.quantite) {
        this.snackbar = true;
        this.text = "Il n'y a pas assez de produit";
        this.quantite = 0
      } else {
        basketServices.addProducts(this.product, this.quantite)
        this.snackbar = true;
        this.text = "Vous avez commandé " + this.quantite + " produit";
        this.quantite = 0
      }
    },


  },
}
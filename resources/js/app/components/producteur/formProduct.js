import { apiService } from "../../_services/apiService";

export default {
  props: {
    isEdit: {
      default: false
    },
    product: {
      default: function () {
        return {}
      }
    }
  },
  data() {
    return {
      name: '',
      prix: '',
      id: '',
      image: '',
      quantite: ''
    }
  },

  methods: {
    edit(product) {
      this.name = product.name;
      this.prix = product.prix;
      this.quantite = product.quantite;
      this.image = product.image;
      this.id = product.id;
    },

    actions() {
      apiService.post('/api/product/add-update', { name: this.name, prix: this.prix, quantite: this.quantite, id: this.id == '' ? '' : this.id, id_user: this.$route.params.id, image: this.image }).then(data => {
        this.$emit('updateProduct', data.data);
        if (this.isEdit) {
          this.$emit('updateProduct', data.data)
          this.text = 'Le produit a été modifié'
      } else if(!this.isUpdate) {
          this.$emit('addProduct', data.data)
          this.text = 'Le produit a été ajouté'
      }
      })
    },
    onFileChange(file) {

      let reader = new FileReader;

      reader.onload = (file) => {
        this.image = file.target.result;
      };
      reader.readAsDataURL(file);
    },

    removeImg() {
      this.product.image = "";
      this.image = "";
    }
  }
}
import FormProduct from "../components/producteur/FormProduct.vue"
import Delete from '../components/producteur/Delete.vue'
import Fiche from '../components/producteur/Fiche.vue'
import Livraison from '../components/producteur/Livraison.vue'
import { apiService } from "../_services/apiService"
export default {
  components: {
    FormProduct,
    Delete,
    Fiche,
    Livraison
  },
  data() {
    return {
      isEdit: false,
      producteur: {},
      itemsPerPageArray: [4, 8, 12],
      search: '',
      filter: {},
      sortDesc: false,
      page: 1,
      itemsPerPage: 4,
      sortBy: 'name',
      keys: [
        'name',
        'image',
        'prix',
        'quantite',
      ],
      products: [],
      commandes: []

    }
  },
  computed: {
    numberOfPages() {
      return Math.ceil(this.products.length / this.itemsPerPage)
    },
    filteredKeys() {
      return this.keys.filter(key => key !== 'name')
    },
  },

  created() {
    this.getProducteur();
    this.getProducts();
    this.getProductsCommandes();
  },

  methods: {
    getProducteur() {
      apiService.get('/api/producteur/' + this.$route.params.id).then(({ data }) => {
        this.producteur = data;
      });
    },

    getProductsCommandes() {
      apiService.get('/api/producteur/' + this.$route.params.id + '/products/commande').then(({data}) => {
        data.forEach(data => {
          if(data.commandes_has_products.length != 0) {
            data.commandes_has_products.forEach(commande => {
              this.commandes.push(commande);

            })
          }
        })
      })
    },

    getProducts() {
      apiService.get('/api/producteurs/products/' + this.$route.params.id).then(({ data }) => {
        data.data.forEach(products => {
          this.products.push(products);
        })
      })
    },

 
    update(product) {
      const index = _.findIndex(this.products, { id: product.id });
      this.products.splice(index, 1, product);
    },
    add(product) {
      const index = _.findIndex(this.products, { id: product.id });
      this.products.push(product);
    },
    del(product) {
      const refreshDeleteData = this.products.filter(element => element.id != product.id);
      this.products = refreshDeleteData;
    },

    nextPage() {
      if (this.page + 1 <= this.numberOfPages) this.page += 1
    },
    formerPage() {
      if (this.page - 1 >= 1) this.page -= 1
    },
    updateItemsPerPage(number) {
      this.itemsPerPage = number
    },

  }
}
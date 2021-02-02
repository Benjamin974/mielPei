import Axios from 'axios';
import { EventBus } from '../eventBus';
import { apiService } from '../_services/apiService';
import { authenticationService } from '../_services/authentication.service';
import { basketServices } from '../_services/basketServices'
// import StepperLivraison from '../components/StepperLivraison.vue'
export default {
  components: {
    // StepperLivraison,
  },

  data() {
    return {
      panel: [0],

      // Commande

      commande: {
        commandeList: {},
        livraison: {
          name: '',
          pays: '',
          ville: '',
          address: '',
          postal_code: '',
        },
        facturation: {
          name: '',
          pays: '',
          ville: '',
          address: '',
          postal_code: '',
        },
      },

      e1: 1,
      selectable: false,
      snackbar: false,
      text: "",
      timeout: 3000,
      idCommande: '',
      currentUser: null,
      lazy: false,
      valid: true,
      rulesCP:  v  => {
        if (!v.trim()) return true;
        if (!isNaN(parseFloat(v)) && v >= 0 && v <= 99999) return true;
        return 'Code postal à 5 chiffres';
      },

    }
  },
  created() {
    authenticationService.currentUser.subscribe((x) => (this.currentUser = x));
    this.getBasket();
    
  },

  methods: {
    getBasket() {
      this.commande.commandeList = basketServices.getBasket();
    },

    cancel() {
      if (confirm('Voulez annuler la commande ?')) {
        this.$router.push('/panier')
      }

    },

    commander() {
      if (!this.selectable) {
        _.assign(this.commande.facturation, this.commande.livraison)
      }

      this.e1 = 3

      apiService.post('/api/commander', this.commande).then(({ data }) => {
        this.idCommande = data.id;
      })
      this.snackbar = true;
      this.text = "Votre commande à bien été effectué";
      basketServices.delBasket();
      let itemBasket = [];
      let quantite = 0;
      EventBus.$emit('clear', { itemBasket, quantite })
    },

    async getFacture() {
      try {
        const facture = await Axios.post(`/api/facture`, { id: this.idCommande, client: this.currentUser.id }, { responseType: 'arraybuffer' });

        const responseData = facture.data;
        this.downloadPDF(responseData);
      } catch (error) {
        console.log(error)
      }
    },

    downloadPDF(responseData) {
      var a = document.createElement('a');
      var url = window.URL.createObjectURL(new Blob([responseData], { type: 'application/pdf' }));
      a.href = url;
      a.download = 'facture';
      a.click();
      window.URL.revokeObjectURL(url);
    }

  }
}
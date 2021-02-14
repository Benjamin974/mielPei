import Basket from "../components/Basket.vue";
import { authenticationService } from "../_services/authentication.service";
import router from "../routes";
import HistoriqueCommande from '../components/client/HistoriqueCommande'
export default {
  components: {
    Basket,
    HistoriqueCommande
  },
  data() {
    return {
      currentUser: null,
    }
  },


  created() {
    authenticationService.currentUser.subscribe((x) => (this.currentUser = x));
  },

  computed: {
    isChecked() {
      return this.currentUser;
    },
    isClient() {
      if (!_.isEmpty(this.currentUser)) {
        return this.currentUser.role.name == "Client";
      }
    },

    isProducteur() {
      if (!_.isEmpty(this.currentUser)) {
        return this.currentUser.role.name == "Producteur";
      }
    },

    isAdmin() {
      if (!_.isEmpty(this.currentUser)) {
        return this.currentUser.role.name == "Admin";
      }
    }
  },

  methods: {
    logout() {
      authenticationService.logout();
      router.push("/login");
    },
    show: function () {
      this.isDisplay = true;
    },
    hide: function () {
      this.isDisplay = false;
    },
  },
}
import {apiService} from '../../_services/apiService'

export default {
  props: {
    user: {
      default: function() {
        return {}
      }
    }
  },

  data() {
    return {
      commandes: []
    }
  },

  methods: {
    getCommandes() {
      this.commandes = []
      apiService.get('/api/client/'+ this.user.id +'/commandes').then(({data}) => {
        data.data.forEach(commande => {
          this.commandes.push(commande);
        })
      })
    }
  }
}
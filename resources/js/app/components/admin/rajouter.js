import { apiService } from '../../_services/apiService'

export default {
  props: {
    user: {
      default: function() {
        return {}
      }
    }
  },

  methods: {
    rajouter() {
      apiService.post('/api/user/' + this.user.id + '/rajouter').then(({data}) => {
        this.$emit('rajouter', data.data);
      })
    }
  },
}
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
    suspendre() {
      apiService.post('/api/user/' + this.user.id + '/suspendre').then(({data}) => {
        this.$emit('suspendre', data.data);
      })
    },
  },
}
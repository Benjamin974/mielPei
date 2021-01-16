import { apiService } from "../_services/apiService";
import Suspendre from '../components/admin/Suspendre.vue'
import Rajouter from '../components/admin/Rajouter.vue'
export default {

  components: {
    Suspendre,
    Rajouter
  },

  data() {
    return {
      users: [],
      window: 0,
      roles: [],
      isEdit: false,
      role: {},
      email: '',
      isSuspendu: false,
      emailRules: [
        v => !!v || "E-mail requis",
        v => /.+@.+\..+/.test(v) || "Ce champ doit être un email"
      ],
    }
  },

  created() {
    this.getUsers();
    this.getRoles();
  },
  methods: {
    getUsers() {
      apiService.get('/api/users').then(({ data }) => {

        data.data.forEach(user => {
          this.users.push(user);
        })
      })
    },
    getRoles() {
      apiService.get('/api/roles').then(({ data }) => {
        data.forEach(role => {
          this.roles.push(role);
        })
      })
    },

    updateUser(user) {
      apiService.post('/api/user/' + user.id + '/update', { id_role: this.role, email: this.email }).then(({ data }) => {
        const index = _.findIndex(this.users, { id: data.data.id });
        this.users.splice(index, 1, data.data);
        this.isEdit = !this.isEdit
      })
    },

    changeUser(user) {
      this.isEdit = !this.isEdit
      this.role = user.role.id
      this.email = user.email
    },

    suspendre(user) {
      const index = _.findIndex(this.users, { id: user.id });
      this.users.splice(index, 1, user);
    },
    rajouter(user) {
      const index = _.findIndex(this.users, { id: user.id });
      this.users.splice(index, 1, user);
    }
  },
}
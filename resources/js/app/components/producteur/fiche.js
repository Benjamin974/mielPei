import { apiService } from "../../_services/apiService";

export default {

  data() {
    return {
      isEdit: false,
      profession: '',
      content: '',
      fiche: []
    }
  },

  created() {
    this.getFiche();

  },

  methods: {
    getFiche() {
      apiService.get('/api/producteur/fiche/' + this.$route.params.id).then(({ data }) => {
        this.fiche = data;
      });
    },

    getEdit() {
      this.profession = this.fiche.profession;
      this.content = this.fiche.content;

    },

    annuler() {
      this.profession = this.fiche.profession;
      this.content = this.fiche.content;
    },

    update() {
      apiService.post('/api/producteur/fiche/update', { profession: this.profession, content: this.content, id_user: this.$route.params.id }).then(({ data }) => {
        this.fiche = data;
      })
    }
  },
}
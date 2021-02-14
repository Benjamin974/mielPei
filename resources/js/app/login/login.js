import { authenticationService } from "../_services/authentication.service";

export default {

    data() {
        return {
            user: {
                email: '',
                password: ''
            },
            emailRules: [
                v => !!v || "E-mail requis",
                v => /.+@.+\..+/.test(v) || "Ce champ doit être un email"
            ],
            pwdRules: [v => !!v || "Mot de passe requis"],
            lazy: false,
            valid: true,
            loading: false,
            returnUrl: "",
            erreur: ''
        };
    },
    created() {
        if (authenticationService.currentUserValue) {
            return this.$router.push('/products');
        }

        this.returnUrl = this.$route.query.returnUrl || "/";
    },
    methods: {
        connection() {

            this.loading = true;
            authenticationService.login(this.user).then(
                user => {
                    if (user == 'Utilisateur suspendu') {
                        this.erreur = 'Utilisateur suspendu'
                    } else if (user == 'login invalide') {
                        this.erreur = 'mot de passe ou email oublié'
                    } else {
                        for (let i = 0; i < 4; i++) {
                            if (user == 'tentative restant: ' + i) {
                                this.erreur = 'tentative restant: ' + i;
                            }
                            else if (user == "trop de tentative, vous pourrez reessayer dans 1 heure") {
                                this.erreur = 'trop de tentative, vous pourrez reessayer dans 1 heure'
                            } else if (_.isObject(user)) {
                                this.erreur = '';
                                this.$router.push(this.returnUrl);
                                break
                            }

                        }
                    }
                },
                error => {
                    this.loading = false;
                }
            );
        }
    }
};
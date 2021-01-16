import { EventBus } from '../eventBus'
import { basketServices } from '../_services/basketServices'
export default {
    data() {
        return {
            basketContent: [],
            basket: [],
            itemBasket: [],
            id: [],
            quantite: [],
            itemProduct: {}
        }
    },

    created() {
        this.getBasket();
        EventBus.$on('basket', basket => {
            this.basket = basket
        })
    },

    methods: {
        getBasket() {
            this.basket = basketServices.getBasket();
            this.initTable(basketServices.getBasket());
            EventBus.$on('basketLength', (quantite) => {
                this.quantite = quantite
                this.initTable(basketServices.getBasket());
            })
        },

        commander() {
            this.$router.push('/confirm')
        },

        initTable(itemProduct) {
            this.itemProduct = []
            let counter = 0;
            let BreakException = {}
            try {
                for (let key in itemProduct) {
                    let item = itemProduct[key]
                    this.itemProduct.push(item)
                    counter++
                    if (counter === 3) {
                        throw BreakException
                    }
                }
            }
            catch (e) {
                if (e !== BreakException) {
                    throw e
                }
            }
        },

        updateQuantity(product) {

            if (product.quantite == 0) {
                if (confirm('êtes vous sur de vouloir supprimer ce produit ?')) {
                    basketServices.replaceQuantity(product)
                } else {
                    product.quantite = 1;

                }
            }
        },
    }


}
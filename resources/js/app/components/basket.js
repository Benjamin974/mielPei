import { EventBus } from '../eventBus'
import { basketServices } from '../_services/basketServices'
export default {
    data() {
        return {
            quantite: 0,
            itemBasket: [],
        }
    },


    created() {
        this.getBasket();
        EventBus.$on('clear', (items) => {
            this.itemBasket = [];
            this.quantite = 0;
        })

    },

    methods: {
        getBasket() {
            this.quantite = basketServices.quantiteBasketSize()
            this.initTable(basketServices.getBasket());
            EventBus.$on('basketLength', (quantite) => {
                this.quantite = quantite
                this.initTable(basketServices.getBasket());
            })

        },

        initTable(itemBasket) {
            this.itemBasket = []
            let counter = 0;
            let BreakException = {}
            try {
                for (let key in itemBasket) {
                    let item = itemBasket[key]
                    this.itemBasket.push(item)
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
                    product.quantite = 1
                }
            }
        }
    }
}
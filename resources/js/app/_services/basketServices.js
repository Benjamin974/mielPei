import { EventBus } from '../eventBus'
export const basketServices = {
    addProducts,
    quantiteBasketSize,
    getBasket,
    emitBasket,
    replaceQuantity,
    delBasket
}

function addProducts(product, quantite) {
    
        let basket = getBasket();

        if (!_.hasIn(basket, buildkey(product))) {
            basket[buildkey(product)] = {
                id: product.id,
                name: product.name,
                quantite: parseInt(quantite),
                image: product.image,
                prix: product.prix
            }
        }
        else {
            basket[buildkey(product)].quantite += parseInt(quantite)
        }
        storeBasket(basket)

}

function replaceQuantity(product) {
    let basket = getBasket()
    if (_.hasIn(basket, buildkey(product))) {
        basket[buildkey(product)] = product
        if ((basket[buildkey(product)].quantite) == 0) {
            _.unset(basket, buildkey(product))
        }
    }
    else {
        throw 'err'
    }
    storeBasket(basket)
}

function delBasket() {

    localStorage.removeItem('currentBasket');

}

function buildkey(product) {
    return 'product_' + product.id
}

function getBasket() {
    let basket = localStorage.getItem('currentBasket');
    if (!basket) {
        basket = {}
    } else {
        basket = JSON.parse(basket)
    }

    return basket
}

function storeBasket(basket) {
    localStorage.setItem('currentBasket', JSON.stringify(basket));
    EventBus.$emit('basket', basket)
    emitBasketSize(basket)

}

function emitBasketSize(basket) {
    let basketSize = _.toPairs(basket).length;
    EventBus.$emit('basketLength', basketSize);
}

function emitBasket() {
    let basket = getBasket()
    return basket
}

function quantiteBasketSize() {
    let quantite = getBasket()
    quantite = _.toPairsIn(quantite).length
    return quantite
}
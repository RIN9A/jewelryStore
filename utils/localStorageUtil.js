class LocalStorageUtil {
    constructor() {this.keyName = 'products';}
    getProducts() {
        const productsLocalStorage = localStorage.getItem(this.keyName);
        if (productsLocalStorage !== null) {return JSON.parse(productsLocalStorage);}
        return [];}
    putProducts(id) {
        let products2 = this.getProducts();
        let pushProduct = false;
        const index = products2.indexOf(id);
        if (index === -1) {
            products2.push(id);
            pushProduct = true;}
        else {products2.splice(index, 1);}
        localStorage.setItem(this.keyName, JSON.stringify(products2));
        return { pushProduct, products2 };}
    shoppingPutProducts(type, id) {
        let products2 = this.getProducts();
        if (type === 'add') {
            products2.push(id);
        } else if (type === 'delete') {
            products2.splice(products.indexOf(id), 1);}
        localStorage.setItem(this.keyName, JSON.stringify(products2))}}

const localStorageUtil = new LocalStorageUtil();

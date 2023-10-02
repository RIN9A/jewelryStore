class Shopping {
    handlerClear() {ROOT_SHOPPING.innerHTML = '';}
    addProduct(id) {
       localStorageUtil.shoppingPutProducts('add', id);
       shoppingPage.render();
       headerPage.render(localStorageUtil.getProducts().length);}
   deleteProduct(id, count) {
        if (count > 1) {
            localStorageUtil.shoppingPutProducts('delete', id);}
             else {
        localStorageUtil.putProducts(id);}
        shoppingPage.render();
        headerPage.render(localStorageUtil.getProducts().length);
        productsPage.render('', '');}
    
    async render() {
        try {
            const productsStore = localStorageUtil.getProducts();
            let htmlCatalog = '';
            let sumCatalog = 0;
            products.forEach(({ id, name, price }) => {
                let cnt = 1;
                if (productsStore.indexOf(id) !== -1) {
                    let count = 0;
                    productsStore.forEach((id1) => {
                        if (id1 === id) {
                            count++;}});
                    htmlCatalog += `
                
                    <tr class="basket__item">
                        <td class="shopping-element__name" >✨ ${name}</td>
                        <td class="shopping-element__price"">${price.toLocaleString()} RUB</td>
                        <td class="count">
                        <button class="cart-product__plus" onclick="shoppingPage.addProduct('${id.toString()}')">+</button> <a name="count">${count}</a>
                            <button class="cart-product__minus" onclick="shoppingPage.deleteProduct('${id.toString()}', '${count}')">-</button>
                        </tr>
                      `;
                    
                    sumCatalog += price * count;}});
            const html = `
          
            <div class="shopping-container">
   
                <div class="shopping__close" onclick="shoppingPage.handlerClear();"></div>
                <table>
         
                    ${htmlCatalog}
                  </table>
                    <hr>
                    <table>
                    <tr>
        
                        <td class="shopping-element__name" >💲 Сумма:</td>
                   
                        <td class="shopping-element__price" id = "total_price">${sumCatalog.toLocaleString()} RUB</td>
                    </tr>
                               

                </table>
                       <button class="btnOrder" >
                       Оформить заказ
                   </button>
                                     
            </div>

           `;
            ROOT_SHOPPING.innerHTML = html;}
    catch(error){
            console.error(error);
        }
    }
}

const shoppingPage = new Shopping();
